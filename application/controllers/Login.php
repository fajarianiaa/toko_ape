<?php
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('session');
    }
    
    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required'  => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required'  => '%s harus diisi!'
        ));

        if ($this->form_validation->run()) {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');

            $this->simple_login->login($username, $password);
        }
        $data = array(
            'title' => 'Login',
        );
        $this->load->view('templates_admin/header', $data, FALSE);
        $this->load->view('login/list', $data, FALSE);
        $this->load->view('templates_admin/footer');
        
    }
    public function logout(){
        $this->simple_login->logout();
    }

}
