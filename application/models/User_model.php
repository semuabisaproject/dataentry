<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user()
    {
        $query = "SELECT a.*,b.role
                  FROM user a
                  left join user_role b on a.role_id=b.id
                  
                  order by a.id desc                  
                ";
        return $this->db->query($query)->result_array();
    }
}