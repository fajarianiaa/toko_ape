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
            'isi'               => 'admin/transaksi/list'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
    }

    //detail pesanan
    public function detail($kode_transaksi){
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);
		$transaksi			= $this->TransaksiModel->kode_transaksi($kode_transaksi);

		$data = array( 	'title'				=> 'Detail Pesanan',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi' 		=> $transaksi,
						'isi'				=> 'admin/transaksi/detail'
		);
		$this->load->view('templates_admin/wrapper', $data, FALSE);
    }
    
    //cetak pesanan
    public function cetak($kode_transaksi){
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);
        $transaksi			= $this->TransaksiModel->kode_transaksi($kode_transaksi);
        $site               = $this->KonfigurasiModel->listing();

		$data = array( 	'title'				=> 'Cetak Pesanan',
						'header_transaksi' 	=> $header_transaksi,
                        'transaksi' 		=> $transaksi,
                        'site' 		        => $site
		);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
    }

    //load laporan
    public function laporan(){
        $this->load->library('form_validation');
        $header_transaksi = $this->HeaderModel->listing();

        if($this->input->post('submit', TRUE) == 'Submit'){
            $this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
            $this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');

            if($this->form_validation->run() == TRUE){
                $bln = $this->input->post('bln', TRUE);
                $thn = $this->input->post('thn', TRUE);
            }
        }else{
            $bln = date('m');
            $thn = date('Y');
        }

        $awal = $thn.'-'.$bln.'-01';
        $akhir = $thn.'-'.$bln.'-31';
        $where = ['tb_header_transaksi.tanggal_transaksi >=' => $awal, 'tb_header_transaksi.tanggal_transaksi <=' => $akhir, 'tb_header_transaksi.status_bayar' => 'Sudah Bayar'];
        $data = array(
            'title'             => 'Laporan',
            'data'              => $this->HeaderModel->laporan($where),
            'bln'               => $bln,
            'thn'               => $thn,
            'isi'               => 'admin/laporan/list'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
    }
    //cetak laporan
    public function cetaklaporan(){
        if (!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(3)) ) {
            redirect('transaksi');
        } 
        $site               = $this->KonfigurasiModel->listing();
        $bln = $this->uri->segment(3);
        $thn = $this->uri->segment(4);
        $awal = $thn.'-'.$bln.'-01';
        $akhir = $thn.'-'.$bln.'-31';
        $where = ['tb_header_transaksi.tanggal_transaksi >=' => $awal, 'tb_header_transaksi.tanggal_transaksi <=' => $akhir, 'tb_header_transaksi.status_bayar' => 'Sudah Bayar'];
        $data = array(
            'title'             => 'Cetak Laporan',
            'data'              => $this->HeaderModel->laporan($where),
            'bln'               => $bln,
            'thn'               => $thn,
            'site' 		        => $site       
        );
        $this->load->view('admin/laporan/cetak', $data, FALSE);
    }
    //verif bayar
    public function verifikasi($kode_transaksi){
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);

		$i    = $this->input;

		$data = array(
			'id_header'    => $header_transaksi->id_header,
			'status_bayar' => 'Sudah Bayar'
		);
		$this->HeaderModel->edit($data);
		$this->session->set_flashdata('sukses', 'Pembayaran sudah diverifikasi.');
		redirect(base_url('penjualan/transaksi/detail/'.$header_transaksi->kode_transaksi), 'refresh');
	}
}
