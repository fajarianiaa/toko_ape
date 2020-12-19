<?php
class Masuk extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model("PelangganModel","",TRUE);
    }
    
    //login pelanggan
    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required'  => '%s harus diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required'  => '%s harus diisi!'
        ));

        if ($this->form_validation->run()) {
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');

            $this->simple_pelanggan->login($email, $password);
        }
        $data = array( 'title'	=> 'Login',
						'isi'	=> 'masuk/list'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
    }

    public function logout(){
        $this->cart->destroy();
        $this->simple_pelanggan->logout();
    }
}
?>