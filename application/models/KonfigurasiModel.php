<?php
class KonfigurasiModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    //listing
    public function listing(){
        $query = $this->db->get('tb_konfigurasi');
        return $query->row();
    }

    //edit
    public function edit($data){
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('tb_konfigurasi', $data);
    }
    //load menu kategori
    public function nav_produk(){
        $this->db->select('tb_produk.*, 
                         tb_kategori.nama_kategori, 
                         tb_kategori.slug_kategori');
      $this->db->from('tb_produk');
      //join
      $this->db->join('tb_kategori', 'tb_kategori.id_kategori =  tb_produk.id_kategori', 'left');
      //en join
      $this->db->group_by('tb_produk.id_kategori');
      $this->db->order_by('tb_kategori.urutan', 'ASC');
      $query = $this->db->get();
      return $query->result();
    }
}
