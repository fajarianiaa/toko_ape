<?php
class Hal_penjualan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model("HeaderModel","",TRUE);
		$this->load->model("TransaksiModel","",TRUE);

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
	
	public function index()
	{
		// $pesanan = $this->HeaderModel->listing();
		$pesanan = $this->TransaksiModel->listing();
		$data = array(
			'title'     => 'Halaman Bagian Penjualan',
			'pesanan' 	=> $pesanan,
            'isi'       => 'admin/hal_admin'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}

}
