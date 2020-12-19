<?php
class Pesanan_khusus extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model("PelangganModel","",TRUE);
        $this->load->model("PesananModel","",TRUE);
        //load helper random-string
        $this->load->helper('url');
	}
	
	public function index(){
         $data = array(
            'title'     => 'Pesanan Khusus',                
            'isi'       => 'pesanan_khusus/list'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
        // if($this->session->userdata('email')){
        //     $email          = $this->session->userdata('email');
        //     $nama_pelanggan = $this->session->userdata('nama_pelanggan');
        //     $pelanggan      = $this->PelangganModel->cek_login($email, $nama_pelanggan);

        //     $data = array(
        //         'title'     => 'Pesanan Khusus',                
        //         'pelanggan' => $pelanggan,
        //         'isi'       => 'pesanan_khusus/tambah'
        //     );
        //     $this->load->view('templates2/wrapper', $data, FALSE);
        // }else{
        //     //kl blm, regis
        //     $this->session->set_flashdata('sukses', 'Silakan login atau registrasi terlebih dahulu.');
        //     redirect(base_url('registrasi'));
        // }
    }

    //pesanan khusus
    public function tambah(){
        //cek login
        if($this->session->userdata('email')){
            $email          = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan      = $this->PelangganModel->cek_login($email, $nama_pelanggan);

            //validasi input
            $valid = $this->form_validation;

            $valid = $this->form_validation;

            $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', array(
                'required'  => '%s harus diisi'
            ));  
            $valid->set_rules('telepon', 'No. Telepon', 'required', array(
                'required'  => '%s harus diisi'
            ));   
            $valid->set_rules('deskripsi', 'Deskripsi produk', 'required', array(
                'required'  => '%s harus diisi'
            ));  
            $valid->set_rules('email', 'Email', 'required|valid_email', array(
                'required'      => '%s harus diisi',
                'valid_email'   => '%s tidak valid'
            ));  
            
            if ($valid->run()){
                $i              = $this->input;
    
            $data = array(
                'id_pelanggan'      => $pelanggan->id_pelanggan,
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'             => $i->post('email'),
                'telepon'           => $i->post('telepon'),
                'deskripsi'         => $i->post('deskripsi'),
                'status_produksi'   => 'Belum Diproduksi',
                'status_pengiriman' => 'Belum Dikirim'
            );
            $this->PesananModel->tambah($data);
            $this->session->set_flashdata('sukses', 'Pesanan telah ditambahkan, pihak kami akan segera menghubungi Anda.');
            redirect(base_url('pesanan_khusus'), 'refresh');
            }
                $data = array(
                    'title'     => 'Pesanan Khusus',                
                    'pelanggan' => $pelanggan,
                    'isi'       => 'pesanan_khusus/tambah'
                );
                $this->load->view('templates2/wrapper', $data, FALSE);            
            
        }else{
            //kl blm, regis
            $this->session->set_flashdata('sukses', 'Silakan login atau registrasi terlebih dahulu.');
            redirect(base_url('registrasi'));
        }
    }

}

?>


