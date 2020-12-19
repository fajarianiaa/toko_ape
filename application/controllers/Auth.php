<?php
class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('session');
        $this->load->model("AuthModel","",TRUE);
	}
	
	public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header');
            $this->load->view('form_login');
            $this->load->view('templates_admin/footer');
        //     $data = array(  'title'	=> 'Login',
		// 			        'isi'	=> 'form_login'
		// );
		// $this->load->view('templates2/wrapper', $data, FALSE);
        }else{
            $auth = $this->AuthModel->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password yang Anda Masukkan Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('auth/login');
            }else{
                $this->session->set_userdata('id_user', $auth->id_user);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch ($auth->role_id) {
                    case 1 :
                        redirect('admin/hal_admin');
                        break;
                    case 2 :
                        redirect('welcome');
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome');
    }

}
