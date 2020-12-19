<?php
class TransaksiModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    //data transaksi
    public function listing(){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //data transaksi berdasarkan pelanggan
    public function kode_transaksi($kode_transaksi){
      $this->db->select('tb_transaksi.*,
                        tb_produk.nama_produk,
                        tb_produk.kode_produk');
      $this->db->from('tb_transaksi');
      //join produk
      $this->db->join('tb_produk', 
                      'tb_produk.id_produk = tb_transaksi.id_produk', 
                      'left');
      $this->db->where('kode_transaksi', $kode_transaksi);
      $this->db->order_by('id_transaksi', 'desc');
      $query = $this->db->get();
      return $query->result();
    }
    
    public function detail($id_transaksi){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function read($slug_transaksi){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('slug_transaksi', $slug_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
		$this->db->insert('tb_transaksi', $data);
    }
    
  public function edit($data){
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->update('tb_transaksi', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('tb_transaksi', $data);
	}

}
