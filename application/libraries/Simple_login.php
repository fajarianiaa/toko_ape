<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login{
    protected $CI;

    public function __construct(){
        $this->CI =& get_instance();
        //load model user
        $this->CI->load->model('UserModel');      
    }

    //login
    public function login($username, $password){
        $check = $this->CI->UserModel->login($username, $password);
        if ($check) {
            $id_user    = $check->id_user;
            $nama       = $check->nama;
            $role_id    = $check->role_id;
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('role_id', $role_id);

            switch ($role_id) {
                case Admin :
                    redirect(base_url('admin/hal_admin'));
                    break;
                case Penjualan :
                    redirect(base_url('penjualan/hal_penjualan'));
                    break;
                case Produksi : 
                    redirect(base_url('produksi/hal_produksi'));
                    break;
                case Pengiriman :
                    redirect(base_url('pengiriman/hal_pengiriman'));
                    break;
                default:
                    # code...
                    break;
            }

            
        }else{
            $this->CI->session->set_flashdata('warning', 'Username atau password salah!');
            redirect(base_url('login'), 'refresh');
        }
    }

    //cek logi
    public function cek_login(){
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda Belum Login!');
            redirect(base_url('login'), 'refresh');
        }
    }

    //logout
    public function logout(){
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('role_id');

        $this->CI->session->set_flashdata('sukses', 'Anda Sudah Logout!');
        redirect(base_url('login'), 'refresh');
    }
}