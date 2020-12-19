<?php
class Kategori extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("KategoriModel","",TRUE);
		$this->load->library('session');

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
        $kategori = $this->KategoriModel->listing();

        $data = array(
            'title'     => 'Kategori',
            'kategori'  => $kategori,
            'isi'       => 'admin/kategori/list'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}
	public function tambah(){
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori', 'Nama kategori', 'required|is unique[kategori.nama_kategori]', array(
            'required'  => '%s harus diisi',
            'is unique' => '%s sudah ada. Buat kategori baru!'
        ));        
        
        $i              = $this->input;
        $slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

        $data = array(
            'slug_kategori' => $slug_kategori,
            'nama_kategori' => $i->post('nama_kategori'),
            'deskripsi'     => $i->post('deskripsi')
        );
        $this->KategoriModel->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambah.');
        redirect(base_url('penjualan/kategori'), 'refresh');
    }
    
    public function edit($id_kategori){
        $kategori = $this->KategoriModel->detail($id_kategori);

        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori', 'Nama kategori', 'required', array(
            'required'  => '%s harus diisi',
        ));        
        
        if ($valid->run()===FALSE) {
            $data = array(
                'title'     => 'Edit Kategori',
                'kategori'  => $kategori,
                'isi'       => 'admin/kategori/edit'
            );
            $this->load->view('templates_admin/wrapper', $data, FALSE);
        }else{
            $i              = $this->input;
            $slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
    
            $data = array(
                'id_kategori'   => $id_kategori,
                'slug_kategori' => $slug_kategori,
                'nama_kategori' => $i->post('nama_kategori'),
                'deskripsi'     => $i->post('deskripsi')
            );
            $this->KategoriModel->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
            redirect(base_url('penjualan/kategori'), 'refresh');
        }
	}
    
    public function hapus($id_kategori){
		$data = array('id_kategori' => $id_kategori);
        $this->KategoriModel->hapus_data($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('penjualan/kategori'), 'refresh');
	}
}
