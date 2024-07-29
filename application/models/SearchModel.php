<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model {

	public function ambil_data($keyword=null)
    {
		$this->db->select('*');
		$this->db->from('master_kk');
		if(!empty($keyword)){
			$this->db->like('no_kontrak',$keyword);
		}
		return $this->db->get()->result_array();
	}

}