<?php
class Rekening extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("RekeningModel","",TRUE);
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
        $rekening = $this->RekeningModel->listing();

        $data = array(
            'title'     => 'Rekening',
            'rekening'  => $rekening,
            'isi'       => 'admin/rekening/list'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}
	public function tambah(){
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama Bank', 'required', array(
            'required'  => '%s harus diisi'
        ));  
            
        $valid->set_rules('no_rekening', 'Nomor Rekening', 'required|is unique[rekening.no_rekening]', array(
            'required'  => '%s harus diisi',
            'is unique' => '%s sudah ada. Masukkan nomor rekening berbeda!'
        ));   
         $valid->set_rules('nama_pemilik', 'Nama Pemilik', 'required', array(
            'required'  => '%s harus diisi'
        ));  
        $i              = $this->input;

        $data = array(
            'nama_bank'     => $i->post('nama_bank'),
            'no_rekening'   => $i->post('no_rekening'),
            'nama_pemilik'  => $i->post('nama_pemilik')
        );
        $this->RekeningModel->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambah.');
        redirect(base_url('penjualan/rekening'), 'refresh');
    }
    
    public function edit($id_rekening){
        $rekening = $this->RekeningModel->detail($id_rekening);

        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama rekening', 'required', array(
            'required'  => '%s harus diisi',
        ));        
        
        if ($valid->run()===FALSE) {
            $data = array(
                'title'     => 'Edit Rekening',
                'rekening'  => $rekening,
                'isi'       => 'admin/rekening/edit'
            );
            $this->load->view('templates_admin/wrapper', $data, FALSE);
        }else{
            $i              = $this->input;

            $data = array(
                'id_rekening'   => $id_rekening,
                'nama_bank'     => $i->post('nama_bank'),
                'no_rekening'   => $i->post('no_rekening'),
                'nama_pemilik'  => $i->post('nama_pemilik')
            );
            $this->RekeningModel->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
            redirect(base_url('penjualan/rekening'), 'refresh');
        }
	}
    
    public function hapus($id_rekening){
		$data = array('id_rekening' => $id_rekening);
        $this->RekeningModel->hapus_data($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('penjualan/rekening'), 'refresh');
	}
}
