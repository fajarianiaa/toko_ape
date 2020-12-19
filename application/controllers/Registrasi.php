<?php
class Registrasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('session');
        $this->load->model('PelangganModel');
        
	}
	
	public function index(){
        // $this->form_validation->set_rules('nama', 'Nama', 'required', [
        //     'required' => 'Nama tidak boleh kosong!'
        // ]);
        // $this->form_validation->set_rules('username', 'Username', 'required', [
        //     'required' => 'Username tidak boleh kosong!'
        // ]);
        // $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]', [
        //     'required' => 'Password tidak boleh kosong!',
        //     'matches'  => 'Password tidak cocok!'
        // ]);
        // $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');
        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('templates_admin/header');
        //     $this->load->view('registrasi');
        //     $this->load->view('templates_admin/footer');
        // }else{
        //     $data = array(
        //         'id'        => '',
        //         'nama'      => $this->input->post('nama'),
        //         'username'  => $this->input->post('username'),
        //         'password'  => $this->input->post('password_1'),
        //         'role_id'   => 2
        //     );

        //     $this->db->insert('tb_user', $data);
        //     redirect('auth/login');
        // }

        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', array(
            'required'  => '%s harus diisi',
        ));   
        $valid->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_pelanggan.email]', array(
            'required'      => '%s harus diisi',
            'valid_email'   => '%s tidak valid',
            'is_unique'     => '%s sudah terdaftar.'
        )); 
        $valid->set_rules('password', 'Password', 'required', array(
            'required'  => '%s harus diisi',
        ));      
        
        if ($valid->run()===FALSE) {
        $data = array(
            'title'        => 'Registrasi',
            'isi'          => 'registrasi/list'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
        }else{
            $i   = $this->input;

            $data = array(
                'status_pelanggan'  => 'Pending',
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'             => $i->post('email'),
                'password'          => $i->post('password'),
                'telepon'           => $i->post('telepon'),
                'alamat'            => $i->post('alamat'),
                'tanggal_daftar'    => date('Y-m-d H:i:s')
            );
            $this->PelangganModel->tambah($data);
            //buat session login pelanggan
            $this->session->set_userdata('email', $i->post('email'));
            $this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));

            $this->session->set_flashdata('sukses', 'Registrasi berhasil.');
            redirect(base_url('registrasi/sukses'), 'refresh');
        }
    }

    public function sukses(){
        $data = array(
            'title'        => 'Registrasi berhasil',
            'isi'          => 'registrasi/sukses'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
    }

}
