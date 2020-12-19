<?php
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('KonfigurasiModel');

		// if ($this->session->userdata('role_id') != '2') {
		// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		// 	Anda Belum Login!
		// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 	  <span aria-hidden="true">&times;</span>
		// 	</button>
		//   </div>');
		//   redirect('login');
		// }
	}
	// Hal utama
	public function index()
	{
		$site 		= $this->KonfigurasiModel->listing();
		$kategori 	= $this->KonfigurasiModel->nav_produk();
		$produk 	= $this->ProdukModel->home();
		$data 		= array(	'title'		=> $site->namaweb.' | '.$site->tagline,
								'keywords'	=> $site->keywords,
								'deskripsi'	=> $site->deskripsi,
								'site'		=> $site,
								'kategori'	=> $kategori,
								'produk'	=> $produk,
								'isi'		=> 'home2/list2'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}

}
