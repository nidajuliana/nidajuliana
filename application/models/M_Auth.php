<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model{

	function tambah($data){
		$this->db->insert('user', $data);
	}

	function CekEmail($email){
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}
}