<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Searchpage_model extends CI_Model {

  public function __construct() {
    parent::__construct(); 
  }

  // Fetch records
  public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('master_kk');

    if($search != ''){
      $this->db->like('title', $search);
      $this->db->or_like('kepalakeluarga', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('master_kk');
 
    if($search != ''){
      $this->db->like('no_kk', $search);
      $this->db->or_like('kepalakeluarga', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

}