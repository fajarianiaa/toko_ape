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
            'isi'               => 'produksi/pesanan_khusus/list'
        );
        $this->load->view('produksi/template/wrapper', $data, FALSE);
    }

    //detail pesanan
    public function detail($id_pesanan){
		$pesanan_khusus 	= $this->PesananModel->detail($id_pesanan);

		$data = array( 	'title'				=> 'Pesanan Khusus',
						'pesanan_khusus'    => $pesanan_khusus,
						'isi'				=> 'produksi/pesanan_khusus/detail'
		);
		$this->load->view('produksi/template/wrapper', $data, FALSE);
    }
    
    //konfirmasi produksi
    public function konfirm($id_pesanan){
        
        $pesanan_khusus 	= $this->PesananModel->detail($id_pesanan);
		
        $valid = $this->form_validation;
        $valid->set_rules('status_produksi', 'Status Produksi', 'required', array(
            'required'  => '%s harus diisi',
        )); 

        if ($valid->run()===FALSE) {
            $data = array( 	
                'title'             => 'Konfirmasi Produksi',
                'pesanan_khusus' 	=> $pesanan_khusus,
                'isi'				=> 'produksi/pesanan_khusus/konfirm'
            );
            $this->load->view('produksi/template/wrapper', $data, FALSE);
        }else{
            $i    = $this->input;

            $data = array(
                'id_pesanan'      => $id_pesanan,
                'status_produksi' => $i->post('status_produksi')
            );
            $this->PesananModel->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi Produksi berhasil dilakukan.');
            redirect(base_url('produksi/pesanan_khusus'), 'refresh');
        }
    }

}