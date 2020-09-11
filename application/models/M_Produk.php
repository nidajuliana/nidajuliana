<?php 


class M_Produk extends CI_Model {

	public function tambah($data) {
		$this->db->insert('produk',$data);
	}

	public function getProduk() {
		return $this->db->get('produk')->result_array();
	} 

	public function getByRowProduk($id) {
		return $this->db->get_where('produk', ['id' => $id])->row_array();
	}

	public function updateProduk($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('produk', $data);
	}

	public function deleteProduk($id) {
		$this->db->delete('produk', ['id' => $id]);
	}

	public function countProduk() {
		return count($this->db->get('produk')->result_array());
	}

}