<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    

    public function get_all()
    {

        return $this->db->get('mst_data')->result_array();
    }

    public function get_limit($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('kode', $keyword);
            $this->db->or_like('data',$keyword);
           
        }
        return $this->db->get('mst_data', $limit, $start)->result_array();
    }
    
    
    
    
    public function get_limit_prov($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('kode', $keyword);
            $this->db->or_like('data',$keyword);
           
        }
        return $this->db->get('mst_prov', $limit, $start)->result_array();
    }
}


