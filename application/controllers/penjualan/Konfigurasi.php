<?php
class Konfigurasi extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model("KonfigurasiModel","",TRUE);
		
    }
    //konfigurasi umum
	public function index(){        
        $konfigurasi = $this->KonfigurasiModel->listing();
        
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required', array(
            'required'  => '%s harus diisi'
        ));        
        
        if ($valid->run()===FALSE) {
            $data = array(
                'title'         => 'Konfigurasi Website',
                'konfigurasi'   => $konfigurasi,
                'isi'           => 'admin/konfigurasi/list'
            );
            $this->load->view('templates_admin/wrapper', $data, FALSE);
        }else{
            $i              = $this->input;
    
            $data = array(
                'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                'namaweb'       => $i->post('namaweb'),
                'tagline'       => $i->post('tagline'),
                'email'         => $i->post('email'),
                'website'       => $i->post('website'),
                'keywords'      => $i->post('keywords'),
                'metatext'      => $i->post('metatext'),
                'telepon'       => $i->post('telepon'),
                'alamat'        => $i->post('alamat'),
                'facebook'      => $i->post('facebook'),
                'whatsapp'     => $i->post('whatsapp'),
                'deskripsi'     => $i->post('deskripsi'),
                'rek_pembayaran'=> $i->post('rek_pembayaran')
            );
            $this->KonfigurasiModel->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
            redirect(base_url('penjualan/konfigurasi'), 'refresh');
        }
    }
    
    //konfigurasi logo
	public function logo(){        
        $konfigurasi = $this->KonfigurasiModel->listing();
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required', array(
            'required'  => '%s harus diisi'
        ));       
        
        if ($valid->run()) {
            //cek gambar diganti
            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']      = './assets/upload/image/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';
                $config['max_width']        = '2024';
                $config['max_hegiht']       = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {
                    $data = array(
                        'title'        => 'Konfigurasi Logo Website',
                        'konfigurasi'  => $konfigurasi,                        
                        'error'        => $this->upload->display_errors(),
                        'isi'          => 'admin/konfigurasi/logo'
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
                        'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                        'namaweb'       => $i->post('namaweb'),
                        'logo'          => $upload_gambar['upload_data']['file_name']
                    );
                    $this->KonfigurasiModel->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
                    redirect(base_url('penjualan/konfigurasi/logo'), 'refresh');
                }
            }else{
                //edit tanpa ganti gambar
                $i    = $this->input;

                $data = array(
                    'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                    'namaweb'       => $i->post('namaweb'),
                    // 'logo'          => $upload_gambar['upload_data']['file_name']
                );
                $this->KonfigurasiModel->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
                redirect(base_url('penjualan/konfigurasi/logo'), 'refresh');
            }
        }
        $data = array(
            'title'        => 'Konfigurasi Logo Website',
            'konfigurasi'  => $konfigurasi,                        
            'isi'          => 'admin/konfigurasi/logo'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
    }
    
    //konfigurasi icon
	public function icon(){        
        $konfigurasi = $this->KonfigurasiModel->listing();
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required', array(
            'required'  => '%s harus diisi'
        ));       
        
        if ($valid->run()) {
            //cek gambar diganti
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']      = './assets/upload/image/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';
                $config['max_width']        = '2024';
                $config['max_hegiht']       = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('icon')) {
                    $data = array(
                        'title'        => 'Konfigurasi Icon Website',
                        'konfigurasi'  => $konfigurasi,                        
                        'error'        => $this->upload->display_errors(),
                        'isi'          => 'admin/konfigurasi/icon'
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
                        'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                        'namaweb'       => $i->post('namaweb'),
                        'icon'          => $upload_gambar['upload_data']['file_name']
                    );
                    $this->KonfigurasiModel->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
                    redirect(base_url('penjualan/konfigurasi/icon'), 'refresh');
                }
            }else{
                //edit tanpa ganti gambar
                $i    = $this->input;

                $data = array(
                    'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                    'namaweb'       => $i->post('namaweb'),
                    // 'icon'          => $upload_gambar['upload_data']['file_name']
                );
                $this->KonfigurasiModel->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
                redirect(base_url('penjualan/konfigurasi/icon'), 'refresh');
            }
        }
        $data = array(
            'title'        => 'Konfigurasi Icon Website',
            'konfigurasi'  => $konfigurasi,                        
            'isi'          => 'admin/konfigurasi/icon'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}
	
}
