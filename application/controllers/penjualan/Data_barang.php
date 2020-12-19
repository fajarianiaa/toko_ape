<?php
class Data_barang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("BarangModel","",TRUE);
		$this->load->library('session');

		// if ($this->session->userdata('role_id') != '1') {
		// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		// 	Anda Belum Login!
		// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 	  <span aria-hidden="true">&times;</span>
		// 	</button>
		//   </div>');
		//   redirect('auth/login');
		// }
	}
	public function index(){
		$barang = $this->BarangModel->getBarang();
		$data = array(
			'title' => 'Hal admin',
			'barang'	=> $barang,
            'isi'   => 'admin/data_barang'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}
	public function prosesTambah(){
		$nama_brg = $this->input->post('nama_brg');
		$keterangan = $this->input->post('keterangan');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar='') {
			# code...
		}else{
			$config ['upload_path'] = './uploads/';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar gagal diupload!";
			}else{
				$gambar = $this->upload->data('file_name');
			}
		}
	
		$data = array(
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'		=> $gambar
		);

		$this->BarangModel->tambah_barang($data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function editproduk($id){
		$where = array('id_brg' => $id);
		$data['barang'] = $this->BarangModel->edit_barang($where, 'tb_barang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}
	public function prosesUpdate($id){
		$id			= $this->input->post('id_brg');
		$nama_brg	= $this->input->post('nama_brg');
		$keterangan	= $this->input->post('keterangan');
		$harga		= $this->input->post('harga');
		$stok		= $this->input->post('stok');
		$gambar 	= $_FILES['gambar']['name'];
		if ($gambar='') {
			# code...
		}else{
			$config ['upload_path'] = './uploads/';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				$id = $this->input->post('id_brg');
				// redirect('admin/data_barang/editproduk/'.$id);
				echo "Gambar gagal diupload!";
			}else{
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'id_brg'		=> $id,
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'		=> $gambar
		);

		$where = array(
			'id_brg' => $id
		);
		$this->BarangModel->update_data($where, $data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	// function editproduk($id)
	// {
	// 	$data['barang'] = $this->BarangModel->getById($id);
	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/edit_barang', $data);
	// 	$this->load->view('templates_admin/footer');
	// }
	
	// function prosesUpdate()
	// {
	// 	$config['upload_path']          = './uploads/';
	// 	$config['allowed_types']        = 'jpg|png|jpeg';
	// 	$config['max_size']             = 10000;
	// 	$config['max_width']            = 5000;
	// 	$config['max_height']           = 5000;

	// 	$this->load->library('upload', $config);
		
	// 	if (!$this->upload->do_upload())
	// 	{
	// 		$id = $this->input->post('id_brg');
	// 		redirect('admin/data_barang/editproduk/'.$id);
	// 	}
	// 	else
	// 	{
	// 		$gambar = $this->upload->data();
			
	// 		$data['nama_brg'] = $this->input->post('nama_brg',true);
	// 		$data['keterangan'] = $this->input->post('keterangan',true);
	// 		$data['harga'] = $this->input->post('harga',true);
	// 		$data['stok'] = $this->input->post('stok',true);
	// 		$data['gambar'] = $gambar['file_name'];
			
	// 		$id=$this->input->post('id_brg');
		
	// 		$this->BarangModel->edit_barang($id,$data);
	// 		redirect('admin/data_barang/index');
	// 	}
	// }

	public function hapus($id){
		$where = array('id_brg' => $id);
		$this->BarangModel->hapus_data($where, 'tb_barang');
		redirect('admin/data_barang/index');
	}
}
