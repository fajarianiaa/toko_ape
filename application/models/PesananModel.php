<?php
class PesananModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    //data transaksi
    public function listing(){
        $this->db->select('tb_pesanan.*');
        $this->db->from('tb_pesanan');
        $this->db->group_by('tb_pesanan.id_pesanan');
        $this->db->order_by('id_pesanan', 'desc');
        $query = $this->db->get();
        return $query->result();
      }

    public function pelanggan($id_pelanggan){
      $this->db->select('tb_pesanan.*');
      $this->db->from('tb_pesanan');
      $this->db->where('tb_pesanan.id_pelanggan', $id_pelanggan);
      $this->db->group_by('tb_pesanan.id_pesanan');
      $this->db->order_by('id_pesanan', 'desc');
      $query = $this->db->get();
      return $query->result();
    }
    
    public function detail($id_pesanan){
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->order_by('id_pesanan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
		$this->db->insert('tb_pesanan', $data);
    }
    
  public function edit($data){
    $this->db->where('id_pesanan', $data['id_pesanan']);
    $this->db->update('tb_pesanan', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->delete('tb_pesanan', $data);
	}

}
