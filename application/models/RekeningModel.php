<?php
class RekeningModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->from('tb_rekening');
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function detail($id_rekening){
        $this->db->select('*');
        $this->db->from('tb_rekening');
        $this->db->where('id_rekening', $id_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function read($slug_rekening){
        $this->db->select('*');
        $this->db->from('tb_rekening');
        $this->db->where('slug_rekening', $slug_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
		$this->db->insert('tb_rekening', $data);
    }
    
  public function edit($data){
    $this->db->where('id_rekening', $data['id_rekening']);
    $this->db->update('tb_rekening', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_rekening', $data['id_rekening']);
		$this->db->delete('tb_rekening', $data);
	}

}
