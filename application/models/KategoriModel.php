<?php
class KategoriModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function detail($id_kategori){
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function read($slug_kategori){
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
		$this->db->insert('tb_kategori', $data);
    }
    
  public function edit($data){
    $this->db->where('id_kategori', $data['id_kategori']);
    $this->db->update('tb_kategori', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('tb_kategori', $data);
	}

}
