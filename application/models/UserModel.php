<?php
class UserModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function detail($id_user){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function login($username, $password){
      $this->db->select('*');
      $this->db->from('tb_user');
      $this->db->where(array('username' => $username,
                              'password'=> $password 
      ));
      $this->db->order_by('id_user', 'desc');
      $query = $this->db->get();
      return $query->row();
    }

    public function tambah($data){
		$this->db->insert('tb_user', $data);
    }
    
  public function edit($data){
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('tb_user', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tb_user', $data);
  }

}
