<?php
class Pesanan_khusus extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model("HeaderModel","",TRUE);
        $this->load->model("TransaksiModel","",TRUE);
        $this->load->model("RekeningModel","",TRUE);
        $this->load->model("KonfigurasiModel","",TRUE);
        $this->load->model("PesananModel","",TRUE);
    }
    
    //load data transksi
    public function index(){
        $pesanan_khusus = $this->PesananModel->listing();

        $data = array(
            'title'             => 'Pesanan Khusus',
            'pesanan_khusus'    => $pesanan_khusus,
            'isi'               => 'pengiriman/pesanan_khusus/list'
        );
        $this->load->view('pengiriman/template/wrapper', $data, FALSE);
    }

    //detail pesanan
    public function detail($id_pesanan){
		$pesanan_khusus 	= $this->PesananModel->detail($id_pesanan);

		$data = array( 	'title'				=> 'Pesanan Khusus',
						'pesanan_khusus'    => $pesanan_khusus,
						'isi'				=> 'pengiriman/pesanan_khusus/detail'
		);
		$this->load->view('pengiriman/template/wrapper', $data, FALSE);
    }
    
    //konfirmasi pengiriman
    public function konfirm($id_pesanan){
        
        $pesanan_khusus 	= $this->PesananModel->detail($id_pesanan);
		
        $valid = $this->form_validation;
        $valid->set_rules('status_pengiriman', 'Status Pengiriman', 'required', array(
            'required'  => '%s harus diisi',
        )); 

        if ($valid->run()===FALSE) {
            $data = array( 	
                'title'             => 'Konfirmasi Pengiriman',
                'pesanan_khusus' 	=> $pesanan_khusus,
                'isi'				=> 'pengiriman/pesanan_khusus/konfirm'
            );
            $this->load->view('pengiriman/template/wrapper', $data, FALSE);
        }else{
            $i    = $this->input;

            $data = array(
                'id_pesanan'     	=> $id_pesanan,
                'status_pengiriman' => $i->post('status_pengiriman')
            );
            $this->PesananModel->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi Pengiriman berhasil dilakukan.');
            redirect(base_url('pengiriman/pesanan_khusus'), 'refresh');
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