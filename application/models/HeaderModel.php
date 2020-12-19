<?php
class HeaderModel extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function listing(){
      $this->db->select('tb_header_transaksi.*,
            tb_pelanggan.nama_pelanggan,
            SUM(tb_transaksi.jumlah) AS total_item');
      $this->db->from('tb_header_transaksi');
      //join
      $this->db->join('tb_transaksi', 
          'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 
          'left');
      $this->db->join('tb_pelanggan', 
          'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 
          'left');
      $this->db->group_by('tb_header_transaksi.id_header');
      $this->db->order_by('id_header', 'desc');
      $query = $this->db->get();
      return $query->result();
    }

    function laporan($where){
      $this->db->select('tb_header_transaksi.*,
            tb_pelanggan.nama_pelanggan,
            SUM(tb_transaksi.jumlah) AS total_item');
      $this->db->from('tb_header_transaksi');
      //join
      $this->db->join('tb_transaksi', 
          'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 
          'left');
      $this->db->join('tb_pelanggan', 
          'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 
          'left');
      $this->db->where($where);
      $this->db->group_by('tb_header_transaksi.id_header');
      $this->db->order_by('id_header', 'desc');
      $query = $this->db->get();
      return $query->result();
    }

    public function pelanggan($id_pelanggan){
      $this->db->select('tb_header_transaksi.*,
                        SUM(tb_transaksi.jumlah) AS total_item');
      $this->db->from('tb_header_transaksi');
      $this->db->where('tb_header_transaksi.id_pelanggan', $id_pelanggan);
      //join
      $this->db->join('tb_transaksi', 
                      'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 
                      'left');
      $this->db->group_by('tb_header_transaksi.id_header');
      $this->db->order_by('id_header', 'desc');
      $query = $this->db->get();
      return $query->result();
    }

    //detail pesanan
    public function kode_transaksi($kode_transaksi){
      $this->db->select('tb_header_transaksi.*,
            tb_pelanggan.nama_pelanggan,
            tb_rekening.nama_bank AS bank,
            tb_rekening.no_rekening,
            tb_rekening.nama_pemilik,
            SUM(tb_transaksi.jumlah) AS total_item');
      $this->db->from('tb_header_transaksi');
      //join
      $this->db->join('tb_transaksi', 
          'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 
          'left');
      $this->db->join('tb_pelanggan', 
          'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 
          'left');
      $this->db->join('tb_rekening', 
          'tb_rekening.id_rekening = tb_header_transaksi.id_rekening', 
          'left');
      $this->db->group_by('tb_header_transaksi.id_header');
      $this->db->where('tb_transaksi.kode_transaksi', $kode_transaksi);
      $this->db->order_by('id_header', 'desc');
      $query = $this->db->get();
      return $query->row();
    }
    
    //detail header transaksi / get id
    public function detail($id_header){
        $this->db->select('*');
        $this->db->from('tb_header_transaksi');
        $this->db->where('id_header', $id_header);
        $this->db->order_by('id_header', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //grafik
    function get_grafik(){
      $query = $this->db->query("SELECT tanggal_transaksi,SUM(jumlah_bayar) AS jumlah_bayar FROM tb_header_transaksi GROUP BY tanggal_transaksi");
        
      if($query->num_rows() > 0){
          foreach($query->result() as $data){
              $hasil[] = $data;
          }
          return $hasil;
      }
  }

    public function tambah($data){
		$this->db->insert('tb_header_transaksi', $data);
    }
    
  public function edit($data){
    $this->db->where('id_header', $data['id_header']);
    $this->db->update('tb_header_transaksi', $data);
  }

  public function hapus_data($data){
		$this->db->where('id_header', $data['id_header']);
		$this->db->delete('tb_header_transaksi', $data);
	}

}
