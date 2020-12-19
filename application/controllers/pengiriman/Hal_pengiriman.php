<?php
class Hal_pengiriman extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$data = array(
            'title'     => 'Halaman Bagian Pengiriman',
            'isi'       => 'pengiriman/hal_pengiriman'
        );
        $this->load->view('pengiriman/template/wrapper', $data, FALSE);
	}

}
