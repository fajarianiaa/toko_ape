<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model("PelangganModel","",TRUE);
		$this->load->model("HeaderModel","",TRUE);
		$this->load->model("TransaksiModel","",TRUE);
		$this->load->model("RekeningModel","",TRUE);
		$this->load->model("PesananModel","",TRUE);
		//proteksi cek login
		$this->simple_pelanggan->cek_login();
	}
	//hal utama
	public function index(){
		//ambil data lgoin planggan
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->HeaderModel->pelanggan($id_pelanggan);

		$data = array( 	'title'				=> 'Profil - '. $this->session->userdata('nama_pelanggan'),
						'header_transaksi' 	=> $header_transaksi,
						'isi'				=> 'profil/list'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
    }

    //Riwayat pesanan
    public function pesanan(){
		//ambil data lgoin planggan
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi	= $this->HeaderModel->pelanggan($id_pelanggan);


		$data = array( 	'title'				=> 'Riwayat Pesanan',
						'header_transaksi' 	=> $header_transaksi,
						'isi'				=> 'profil/pesanan'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}
	//Riwayat pesanan
    public function pesanan_khusus(){
		//ambil data lgoin planggan
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pesanan_khusus	= $this->PesananModel->pelanggan($id_pelanggan);


		$data = array( 	'title'				=> 'Riwayat Pesanan Khusus',
						'pesanan_khusus' 	=> $pesanan_khusus,
						'isi'				=> 'profil/pesanan_khusus'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}

	//detail pesanan
    public function detail($kode_transaksi){
		//ambil data lgoin planggan
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);
		$transaksi			= $this->TransaksiModel->kode_transaksi($kode_transaksi);

		//akses data transaksinya
		if ($header_transaksi->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Tidak dapat diakses. Bukan data transaksi Anda.');
			redirect(base_url('masuk'));
		}

		$data = array( 	'title'				=> 'Riwayat Pesanan',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi' 		=> $transaksi,
						'isi'				=> 'profil/detail'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}

    //profil saya
    public function profil_saya(){
		//ambil data lgoin planggan
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->PelangganModel->detail($id_pelanggan);

		$valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', array(
            'required'  => '%s harus diisi',
        ));   
		$valid->set_rules('alamat', 'Alamat Lengkap', 'required', array(
            'required'  => '%s harus diisi',
		));   
		$valid->set_rules('telepon', 'No. Telepon/HP', 'required', array(
            'required'  => '%s harus diisi',
        ));    
        
        if ($valid->run()===FALSE) {
		$data = array( 	'title'		=> 'Profil Saya',
						'pelanggan'	=> $pelanggan,
						'isi'		=> 'profil/profil_saya'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
		}else{
			$i   = $this->input;
			//cek pass minimal 6 char
			if(strlen($i->post('password')) >= 6){
				$data = array(
					'id_pelanggan'  	=> $id_pelanggan,
					'nama_pelanggan'    => $i->post('nama_pelanggan'),
					'password'          => $i->post('password'),
					'telepon'           => $i->post('telepon'),
					'alamat'            => $i->post('alamat')
				);
			}else{
				//pass kurang dari 6
				$data = array(
					'id_pelanggan'  	=> $id_pelanggan,
					'nama_pelanggan'    => $i->post('nama_pelanggan'),
					'telepon'           => $i->post('telepon'),
					'alamat'            => $i->post('alamat')
				);
			}
		$this->PelangganModel->edit($data);

		$this->session->set_flashdata('sukses', 'Profil berhasil diupdate.');
		redirect(base_url('profil/profil_saya'), 'refresh');
		}
	}

	//konfirm byar
	public function konfirmasi($kode_transaksi){
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);
		$rekening			= $this->RekeningModel->listing();

		$valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama Bank', 'required', array(
            'required'  => '%s harus diisi'
        ));   
        $valid->set_rules('rek_pembayaran', 'No. Rekening', 'required', array(
            'required'  => '%s harus diisi'
		));         
		$valid->set_rules('rek_pelanggan', 'Nama Pemilik Rekening', 'required', array(
            'required'  => '%s harus diisi'
		)); 
		$valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required', array(
            'required'  => '%s harus diisi'
        )); 
		$valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'required', array(
            'required'  => '%s harus diisi'
        )); 
		
        if ($valid->run()) {
            //cek gambar diganti
            if (!empty($_FILES['bukti_bayar']['name'])) {
                $config['upload_path']      = './assets/upload/image/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';
                $config['max_width']        = '2024';
                $config['max_hegiht']       = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti_bayar')) {

				$data = array( 	'title'				=> 'Konfirmasi Pembayaran',
								'header_transaksi'	=> $header_transaksi,
								'rekening'			=> $rekening,
								'error'     		=> $this->upload->display_errors(),
								'isi'				=> 'profil/konfirmasi'
				);
				$this->load->view('templates2/wrapper', $data, FALSE);
				//masuk db
				}else{
					$upload_gambar = array('upload_data'=>$this->upload->data());
					//buat thumbnail
					$config['image_library']    = 'gd2';
					$config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
					$config['new_image']        = './assets/upload/image/thumbs/'; //lokasi folder thumb
					$config['create_thumb']     = TRUE;
					$config['maintain_ratio']   = TRUE;
					$config['width']            = 250;
					$config['height']           = 250;
					$config['thumb_marker']     = '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					//end buat thumbnail

					$i    = $this->input;
					
					$data = array(
						'id_header'     	=> $header_transaksi->id_header,
						'status_bayar'  	=> 'Menunggu Verifikasi',
						'jumlah_bayar'  	=> $i->post('jumlah_bayar'),
						'rek_pembayaran'  	=> $i->post('rek_pembayaran'),
						'rek_pelanggan' 	=> $i->post('rek_pelanggan'),
						'bukti_bayar'   	=> $upload_gambar['upload_data']['file_name'],
						'id_rekening'		=> $i->post('id_rekening'),
						'tanggal_bayar'		=> $i->post('tanggal_bayar'),
						'nama_bank'			=> $i->post('nama_bank')
					);
					$this->HeaderModel->edit($data);
					$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran berhasil dilakukan.');
					redirect(base_url('profil'), 'refresh');
				}
			}else{
				//edit tanpa ganti gambar
				$i    = $this->input;
				
				$data = array(
					'id_header'     	=> $header_transaksi->id_header,
					'status_bayar'  	=> 'Menunggu Verifikasi',
					'jumlah_bayar'  	=> $i->post('jumlah_bayar'),
					'rek_pembayaran'  	=> $i->post('rek_pembayaran'),
					'rek_pelanggan' 	=> $i->post('rek_pelanggan'),
					// 'bukti_bayar'   	=> $upload_gambar['upload_data']['file_name'],
					'id_rekening'		=> $i->post('id_rekening'),
					'tanggal_bayar'		=> $i->post('tanggal_bayar'),
					'nama_bank'			=> $i->post('nama_bank')
				);
				$this->HeaderModel->edit($data);
				$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran berhasil dilakukan.');
				redirect(base_url('profil'), 'refresh');
			}
		}
		//end masuk db
		$data = array( 	'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening'			=> $rekening,
						'isi'				=> 'profil/konfirmasi'
		);
		$this->load->view('templates2/wrapper', $data, FALSE);
	}

	//pesanan diterima
	public function terima($kode_transaksi){
		$header_transaksi 	= $this->HeaderModel->kode_transaksi($kode_transaksi);

		$i    = $this->input;

		$data = array(
			'id_header'     	=> $header_transaksi->id_header,
			'status_pengiriman' => 'Diterima'
		);
		$this->HeaderModel->edit($data);
		$this->session->set_flashdata('sukses', 'Pesanan Diterima.');
		redirect(base_url('profil'), 'refresh');
	}

	//pesanan khusus diterima
	public function terima_khusus($id_pesanan){
		$pesanan_khusus 	= $this->PesananModel->detail($id_pesanan);

		$i    = $this->input;

		$data = array(
			'id_pesanan'     	=> $pesanan_khusus->id_pesanan,
			'status_pengiriman' => 'Diterima'
		);
		$this->PesananModel->edit($data);
		$this->session->set_flashdata('sukses', 'Pesanan Diterima.');
		redirect(base_url('profil/pesanan_khusus'), 'refresh');
	}
}
