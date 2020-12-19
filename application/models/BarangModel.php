<?php
class BarangModel extends CI_Model {
	public function getBarang(){
		return $this->db->get('tb_barang');
	}
	public function tambah_barang($data, $table){
		return $this->db->insert($table, $data);
	}

	function getById($id){
        $this->db->where("id_brg",$id);
        return $this->db->get('tb_barang')->row();
	}
	// function edit_barang($id,$data)
	// {
	// 	$this->db->where('id_brg',$id);
	// 	$this->db->update('tb_barang',$data);
	// }
	function select_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('produk')->row();
	}
	public function edit_barang($where, $table){
		return $this->db->get_where($table, $where);
	}
	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}
