<?php
class Belanja extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
        $this->load->model('KonfigurasiModel');
        $this->load->model('PelangganModel');
        $this->load->model('HeaderModel');
        $this->load->model('TransaksiModel');
        $this->load->model('PesananModel');
        //load helper random-string
        $this->load->helper('string');
	}
	
	public function index(){
        $keranjang = $this->cart->contents();

        $data = array(
            'title'     => 'Keranjang Belanja',
            'keranjang' => $keranjang,
            'isi'       => 'belanja/list'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
    }
    //pemesanan
    public function sukses(){
        $keranjang = $this->cart->contents();

        $data = array(
            'title'     => 'Pemesanan',
            'isi'       => 'belanja/sukses'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
    }

    //co
    public function checkout(){
        //cek login
        if($this->session->userdata('email')){
            $email          = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan      = $this->PelangganModel->cek_login($email, $nama_pelanggan);

            $keranjang = $this->cart->contents();

            //validasi input
            $valid = $this->form_validation;

            $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', array(
                'required'  => '%s harus diisi',
            ));  
            $valid->set_rules('telepon', 'No. Telepon', 'required', array(
                'required'  => '%s harus diisi',
            ));   
            $valid->set_rules('alamat', 'Alamat', 'required', array(
                'required'  => '%s harus diisi',
            ));  
            $valid->set_rules('email', 'Email', 'required|valid_email', array(
                'required'      => '%s harus diisi',
                'valid_email'   => '%s tidak valid',

            ));     
            
            if ($valid->run()===FALSE) {
            $data = array(
                'title'     => 'Checkout',
                'keranjang' => $keranjang,
                'pelanggan' => $pelanggan,
                'isi'       => 'belanja/checkout'
            );
            $this->load->view('templates2/wrapper', $data, FALSE);
            //masuk database
            }else{
            $i   = $this->input;
            $data = array(
                'id_pelanggan'      => $pelanggan->id_pelanggan,
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'             => $i->post('email'),
                'telepon'           => $i->post('telepon'),
                'alamat'            => $i->post('alamat'),
                'kode_transaksi'    => $i->post('kode_transaksi'),
                'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                'jumlah_transaksi'  => $i->post('jumlah_transaksi'),
                'status_bayar'      => 'Belum Bayar',
                'status_pengiriman' => 'Belum Dikirim',
                'tanggal_post'      => date('Y-m-d H:i:s')
            );
            //proses tambah ke tb header
            $this->HeaderModel->tambah($data);
            //proses tambah ke tb transaksi
            foreach($keranjang as $keranjang) {
                $subtotal = $keranjang['price'] * $keranjang['qty'];

                $data = array(
                    'id_pelanggan'     => $pelanggan->id_pelanggan,
                    'kode_transaksi'   => $i->post('kode_transaksi'),
                    'id_produk'        => $keranjang['id'],
                    'harga'            => $keranjang['price'],
                    'jumlah'           => $keranjang['qty'],
                    'total_harga'      => $subtotal,
                    'tanggal_transaksi'=> $i->post('tanggal_transaksi')
                );
                $this->TransaksiModel->tambah($data);

            }//end proses
            //keranjang kosong setelah transaksi
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Pesanan telah ditambahkan.');
            redirect(base_url('belanja/sukses'), 'refresh');
            }
            //end db
        }else{
            //kl blm, regis
            $this->session->set_flashdata('sukses', 'Silakan login atau registrasi terlebih dahulu.');
            redirect(base_url('registrasi'));
        }
    }

	//tambah keranjang
	public function add(){
        //ambil data dr home
		$id		        = $this->input->post('id');
		$qty	        = $this->input->post('qty');
		$price	        = $this->input->post('price');
		$name	        = $this->input->post('name');
        $redirect_page	= $this->input->post('redirect_page');
        //proses masuk ke keranjang
        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name
        );
        $this->cart->insert($data);
        //redirect
        redirect($redirect_page, 'refresh');
    }
    
    //update keranjang
    public function update_cart($rowid){
        if($rowid){
            $data = array(  'rowid' => $rowid,
                            'qty'   => $this->input->post('qty')                    
                        );
            $this->cart->update($data);
            $this->session->set_flashdata('sukses', 'Item berhasil diupdate.');
            redirect(base_url('belanja'), 'refresh');
        }else{
            redirect(base_url('belanja'), 'refresh');
        }
    }

    //hapus keranjang
    public function hapus($rowid=''){
        if($rowid){
            //hapus per item
            $this->cart->remove($rowid);
            $this->session->set_flashdata('sukses', 'Item berhasil dihapus.');
            redirect(base_url('belanja'), 'refresh');
        }else{
            //kosongkan semua
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Keranjang belanja berhasil dikosongkan.');
            redirect(base_url('belanja'), 'refresh');
        }
    }

}

