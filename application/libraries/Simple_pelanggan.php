<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan{
    protected $CI;

    public function __construct(){
        $this->CI =& get_instance();
        //load model user
        $this->CI->load->model('PelangganModel');      
    }

    //login
    public function login($email, $password){
        $check = $this->CI->PelangganModel->login($email, $password);
        if ($check) {
            $id_pelanggan    = $check->id_pelanggan;
            $nama_pelanggan  = $check->nama_pelanggan;
            $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->CI->session->set_userdata('email', $email);

            redirect(base_url('profil'), 'refresh');
        }else{
            $this->CI->session->set_flashdata('warning', 'Email atau password salah!');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //cek logi
    public function cek_login(){
        if ($this->CI->session->userdata('email') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda Belum Login!');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //logout
    public function logout(){
        $this->CI->session->unset_userdata('id_pelanggan');
        $this->CI->session->unset_userdata('nama_pelanggan');
        $this->CI->session->unset_userdata('email');

        $this->CI->session->set_flashdata('sukses', 'Anda Sudah Logout!');
        redirect(base_url('masuk'), 'refresh');
    }
}