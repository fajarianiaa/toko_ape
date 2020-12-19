<?php
class PelangganModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //login pelanggan
    public function login($email, $password){
      $this->db->select('*');
      $this->db->from('tb_pelanggan');
      $this->db->where(array( 'email'   => $email,
                              'password'=> $password
                            ));
      $this->db->order_by('id_pelanggan', 'desc');
      $query = $this->db->get();
      return $query->row();
    }
    
    public function detail($id_pelanggan){
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function cek_login($email, $nama_pelanggan){
      $this->db->select('*');
      $this->db->from('tb_pelanggan');
      $this->db->where('email', $email);
      $this->db->where('nama_pelanggan', $nama_pelanggan);
      $this->db->order_by('id_pelanggan', 'desc');
      $query = $this->db->get();
      return $query->row();
    }

    public function tambah($data){
		$this->db->insert('tb_pelanggan', $data);
    }
    
  public function edit($data){
    $this->db->where('id_pelanggan', $data['id_pelanggan']);
    $this->db->update('tb_pelanggan', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('tb_pelanggan', $data);
	}

}
