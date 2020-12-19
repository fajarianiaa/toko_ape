<?php
class Produk extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model("ProdukModel","",TRUE);
        $this->load->model("KategoriModel","",TRUE);
		

		// if ($this->session->userdata('role_id') != '1') {
		// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		// 	Anda Belum Login!
		// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 	  <span aria-hidden="true">&times;</span>
		// 	</button>
		//   </div>');
		//   redirect('auth/login');
		// }
	}
	public function index(){        
        $produk = $this->ProdukModel->listing();

        $data = array(
            'title'     => 'Produk',
            'produk'    => $produk,
            'isi'       => 'admin/produk/list'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
    }
    //gambar
    public function gambar($id_produk){
        $produk = $this->ProdukModel->detail($id_produk);
        $gambar = $this->ProdukModel->gambar($id_produk);

        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar', 'Judul Gambar', 'required', array(
            'required'  => '%s harus diisi'
        ));      
        
        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';
            $config['max_width']        = '2024';
            $config['max_hegiht']       = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     => 'Tambah Gambar Produk : '.$produk->nama_produk,
                    'produk'    => $produk,
                    'gambar'    => $gambar,
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/produk/gambar'
                );
                $this->load->view('templates_admin/wrapper', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data'=>$this->upload->data());
                //buat thumbnail
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                $config['new_image']        = './assets/upload/image/thumbs/'; //lokasi folder thumb
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;
                $config['height']           = 250;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                //end buat thumbnail

                $i    = $this->input;
                $data = array(
                    'id_produk'     => $id_produk,
                    'judul_gambar'  => $i->post('judul_gambar'),
                    'gambar'        => $upload_gambar['upload_data']['file_name']
                );
                $this->ProdukModel->tambah_gambar($data);
                $this->session->set_flashdata('sukses', 'Gambar berhasil ditambah.');
                redirect(base_url('penjualan/produk/gambar/'.$id_produk), 'refresh');
            }
        }
        $data = array(
            'title'     => 'Tambah Gambar Produk : '.$produk->nama_produk,
            'produk'    => $produk,
            'gambar'    => $gambar,
            'isi'       => 'admin/produk/gambar'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
    }

	public function tambah(){
        //ambil data kategori
        $kategori = $this->KategoriModel->listing();
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required'  => '%s harus diisi'
        ));   
        $valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tb_produk.kode_produk]', array(
            'required'  => '%s harus diisi',
            'is_unique' => '%s sudah ada. Buat kode produk baru!'
        ));         
        
        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';
            $config['max_width']        = '2024';
            $config['max_hegiht']       = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     => 'Tambah Produk',
                    'kategori'  => $kategori,
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/produk/tambah'
                );
                $this->load->view('templates_admin/wrapper', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data'=>$this->upload->data());
                //buat thumbnail
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                $config['new_image']        = './assets/upload/image/thumbs/'; //lokasi folder thumb
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;
                $config['height']           = 250;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                //end buat thumbnail

                $i    = $this->input;
                $slug_produk  = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_user'       => $this->session->userdata('id_user'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'    => $i->post('nama_produk'),
                    'slug_produk'   => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'keywords'      => $i->post('keywords'),
                    'harga'         => $i->post('harga'),
                    'stok'          => $i->post('stok'),
                    'gambar'        => $upload_gambar['upload_data']['file_name'],
                    'berat'         => $i->post('berat'),
                    'ukuran'        => $i->post('ukuran'),
                    'status_produk' => $i->post('status_produk'),
                    'tanggal_post'  => date('Y-m-d H:i:s')
                );
                $this->ProdukModel->tambah($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambah.');
                redirect(base_url('penjualan/produk'), 'refresh');
            }
        }
        $data = array(
            'title'     => 'Tambah Produk',
            'kategori'  => $kategori,
            'isi'       => 'admin/produk/tambah'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
    }
    
    public function edit($id_produk){
        $produk = $this->ProdukModel->detail($id_produk);
        $kategori = $this->KategoriModel->listing();

        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required'  => '%s harus diisi'
        ));   
        $valid->set_rules('kode_produk', 'Kode Produk', 'required', array(
            'required'  => '%s harus diisi'
        ));         
        
        if ($valid->run()) {
            //cek gambar diganti
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']      = './assets/upload/image/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';
                $config['max_width']        = '2024';
                $config['max_hegiht']       = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                        'title'     => 'Edit Produk: '.$produk->nama_produk,
                        'kategori'  => $kategori,
                        'produk'    => $produk,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/produk/edit'
                    );
                    $this->load->view('templates_admin/wrapper', $data, FALSE);
                //masuk db
                }else{
                    $upload_gambar = array('upload_data'=>$this->upload->data());
                    //buat thumbnail
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                    $config['new_image']        = './assets/upload/image/thumbs/'; //lokasi folder thumb
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    //end buat thumbnail

                    $i    = $this->input;
                    $slug_produk  = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
                    $data = array(
                        'id_produk'     => $id_produk,
                        'id_user'       => $this->session->userdata('id_user'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'kode_produk'   => $i->post('kode_produk'),
                        'nama_produk'    => $i->post('nama_produk'),
                        'slug_produk'   => $slug_produk,
                        'keterangan'    => $i->post('keterangan'),
                        'keywords'      => $i->post('keywords'),
                        'harga'         => $i->post('harga'),
                        'stok'          => $i->post('stok'),
                        'gambar'        => $upload_gambar['upload_data']['file_name'],
                        'berat'         => $i->post('berat'),
                        'ukuran'        => $i->post('ukuran'),
                        'status_produk' => $i->post('status_produk')
                    );
                    $this->ProdukModel->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('penjualan/produk'), 'refresh');
                }
            }else{
                //edit tanpa ganti gambar
                $i    = $this->input;
                $slug_produk  = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_user'       => $this->session->userdata('id_user'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'    => $i->post('nama_produk'),
                    'slug_produk'   => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'keywords'      => $i->post('keywords'),
                    'harga'         => $i->post('harga'),
                    'stok'          => $i->post('stok'),
                    // 'gambar'        => $upload_gambar['upload_data']['file_name'],
                    'berat'         => $i->post('berat'),
                    'ukuran'        => $i->post('ukuran'),
                    'status_produk' => $i->post('status_produk')
                );
                $this->ProdukModel->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
                redirect(base_url('penjualan/produk'), 'refresh');
            }
        }
        //end masuk db
        $data = array(
            'title'     => 'Edit Produk: '.$produk->nama_produk,
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'admin/produk/edit'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}
    
    public function hapus($id_produk){
        //hapus gambar
        $produk = $this->ProdukModel->detail($id_produk);
        unlink('./assets/upload/image/'.$produk->gambar);
        unlink('./assets/upload/image/thumbs/'.$produk->gambar);

		$data = array('id_produk' => $id_produk);
        $this->ProdukModel->hapus_data($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('penjualan/produk'), 'refresh');
    }
    
    public function hapus_gambar($id_produk, $id_gambar){
        //hapus gambar
        $gambar = $this->ProdukModel->detail_gambar($id_gambar);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

		$data = array('id_gambar' => $id_gambar);
        $this->ProdukModel->hapus_gambar($data);
        $this->session->set_flashdata('sukses', 'Gambar berhasil dihapus.');
		redirect(base_url('penjualan/produk/gambar/'.$id_produk), 'refresh');
	}
}
