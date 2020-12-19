<?php
class Tentang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('KonfigurasiModel');
	}
	// Hal tentang
	public function index()
	{
        $site 		= $this->KonfigurasiModel->listing();
		$data 		= array(	'title'		=> 'Tentang '.$site->namaweb,
								'isi'		=> 'tentang'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}

}
