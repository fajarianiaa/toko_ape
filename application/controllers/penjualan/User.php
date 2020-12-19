<?php
class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("UserModel","",TRUE);
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
        $user = $this->UserModel->listing();

        $data = array(
            'title'     => 'User',
            'user'      => $user,
            'isi'       => 'admin/user/list'
        );
        $this->load->view('templates_admin/wrapper', $data, FALSE);
	}
	public function tambah(){
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Lengkap', 'required', array(
            'required'  => '%s harus diisi',
        ));   
        $valid->set_rules('email', 'Email', 'required|valid_email', array(
            'required'      => '%s harus diisi',
            'valid_email'   => '%s tidak valid'
        )); 
        $valid->set_rules('username', 'Username', 'required|min_length[5]|max_length[32]|is_unique[tb_user.username]', array(
            'required'   => '%s harus diisi',
            'min_length' => '%s minimal 5 karakter',
            'max_length' => '%s maksima 32 karakter',
            'is_unique' => '%s sudah ada. Buat username yang lain.'
        )); 
        $valid->set_rules('password', 'Password', 'required', array(
            'required'  => '%s harus diisi',
        ));      
        
        if ($valid->run()===FALSE) {
            $data = array(
                'title'     => 'Tambah User',
                'isi'       => 'admin/user/tambah'
            );
            $this->load->view('templates_admin/wrapper', $data, FALSE);
        }else{
            $i              = $this->input;
    
            $data = array(
                'nama'          => $i->post('nama'),
                'email'         => $i->post('email'),
                'username'      => $i->post('username'),
                'password'      => $i->post('password'),
                'role_id'       => $i->post('role_id')
            );
            $this->UserModel->tambah($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambah.');
            redirect(base_url('penjualan/user'), 'refresh');
        }
	}
    
    public function edit($id_user){
        $user = $this->UserModel->detail($id_user);

        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Lengkap', 'required', array(
            'required'  => '%s harus diisi',
        ));   
        $valid->set_rules('email', 'Email', 'required|valid_email', array(
            'required'      => '%s harus diisi',
            'valid_email'   => '%s tidak valid'
        )); 
        $valid->set_rules('password', 'Password', 'required', array(
            'required'  => '%s harus diisi',
        ));           
        
        if ($valid->run()===FALSE) {
            $data = array(
                'title'     => 'Edit User',
                'user'      => $user,
                'isi'       => 'admin/user/edit'
            );
            $this->load->view('templates_admin/wrapper', $data, FALSE);
        }else{
            $i              = $this->input;
            $slug_user  = url_title($this->input->post('nama_user'), 'dash', TRUE);
    
            $data = array(
                'id_user'       => $id_user,
                'nama'          => $i->post('nama'),
                'email'         => $i->post('email'),
                'username'      => $i->post('username'),
                'password'      => $i->post('password'),
                'role_id'       => $i->post('role_id')
            );
            $this->UserModel->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diubah.');
            redirect(base_url('penjualan/user'), 'refresh');
        }
	}
    
    public function hapus($id_user){
		$data = array('id_user' => $id_user);
        $this->UserModel->hapus_data($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('penjualan/user'), 'refresh');
	}
}
