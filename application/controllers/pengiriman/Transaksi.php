<?php
class Transaksi extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model("HeaderModel","",TRUE);
        $this->load->model("TransaksiModel","",TRUE);
        $this->load->model("RekeningModel","",TRUE);
        $this->load->model("KonfigurasiModel","",TRUE);
    }
    
    //load data transksi
    public function index(){
        $header_transaksi = $this->HeaderModel->listing();

        $data = array(
            'title'             => 'Pesanan',
            'header_transaksi'  => $header_transaksi,
            'isi'               => 'pengiriman/transaksi/list'
        );
        $this->load->view('pengiriman/template/wrapper', $data, FALSE);
    }

    //detail pesanan
    public function detail($kode_transaksi){
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);
		$transaksi			= $this->TransaksiModel->kode_transaksi($kode_transaksi);

		$data = array( 	'title'				=> 'Pesanan',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi' 		=> $transaksi,
						'isi'				=> 'pengiriman/transaksi/detail'
		);
		$this->load->view('pengiriman/template/wrapper', $data, FALSE);
    }
    
    //konfirmasi pengiriman
    public function konfirm($id_header){
        // $header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);
        $header_transaksi 	= $this->HeaderModel->detail($id_header);
		// $transaksi			= $this->TransaksiModel->kode_transaksi($kode_transaksi);
        $valid = $this->form_validation;
        $valid->set_rules('status_pengiriman', 'Status Pengiriman', 'required', array(
            'required'  => '%s harus diisi',
        )); 

        if ($valid->run()===FALSE) {
            $data = array( 	
                'title'             => 'Konfirmasi Pengiriman',
                'header_transaksi' 	=> $header_transaksi,
                'isi'				=> 'pengiriman/transaksi/konfirm'
            );
            $this->load->view('pengiriman/template/wrapper', $data, FALSE);
        }else{
            $i    = $this->input;

            $data = array(
                'id_header'     	=> $id_header,
                'status_pengiriman' => $i->post('status_pengiriman')
            );
            $this->HeaderModel->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi Pengiriman berhasil dilakukan.');
            redirect(base_url('pengiriman/transaksi'), 'refresh');
        }
    }

    // public function konfirm($id_header){
    //     $header_transaksi = $this->HeaderModel->detail($id_header);

    //     $valid = $this->form_validation;
        
        
    //     if ($valid->run()===FALSE) {
    //         $data = array(
    //             'title'     => 'Konfirmasi Pengiriman',
    //             'header_transaksi'      => $header_transaksi,
    //             'isi'       => 'pengiriman/transaksi/konfirm'
    //         );
    //         $this->load->view('pengiriman/template/wrapper', $data, FALSE);
    //     }else{
    //         $i              = $this->input;
    
    //         $data = array(
    //             'id_header'       => $id_header,
    //             'status_pengiriman'       => $i->post('status_pengiriman')
    //         );
    //         $this->HeaderModel->edit($data);
    //         $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
    //         redirect(base_url('pengiriman/transaksi'), 'refresh');
    //     }
	// }
}