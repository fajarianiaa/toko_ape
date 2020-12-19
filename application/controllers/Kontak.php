<?php
class Kontak extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('KonfigurasiModel');
		$this->load->library('googlemaps');
	}
	// Hal tentang
	public function index()
	{
		$site 		= $this->KonfigurasiModel->listing();
		
		// $config['center'] = '-6.13952, 106.92075';//Coordinate tengah peta
		// $config['zoom'] = 'auto';
		// $this->googlemaps->initialize($config);
		 
		// $marker = array();
		// $marker['position'] = '-6.13952, 106.92075';//Posisi marker (itu tuh yang merah2 lancip itu loh :-p)
		// $this->googlemaps->add_marker($marker);

		$data 		= array(	'title'		=> 'Kontak '.$site->namaweb,
								'site'		=> $site,
								// 'map'		=> $this->googlemaps->create_map(),
								'isi'		=> 'kontak'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}
}
