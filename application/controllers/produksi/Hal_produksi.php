<?php
class Hal_produksi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$data = array(
            'title'     => 'Halaman Bagian Produksi',
            'isi'       => 'produksi/hal_produksi'
        );
        $this->load->view('produksi/template/wrapper', $data, FALSE);
	}

}
