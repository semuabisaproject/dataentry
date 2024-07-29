<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_model extends CI_Model
{
    public function get_kurir()
    {
        $query = "SELECT `id`,`driver_code`,`kecamatan`,`nohp`,`status`,`role_id`
                  FROM `kurir`
                  order by `date_created` desc
                ";
    }
    public function get_user($id)
    {
        $this->db->where('id', $id);
        $query = "SELECT `id`,`name`,`role_id`,`email`,`role_id`
                  FROM `user`
                  where `id` = $id
                ";
                
    }
    public function get_agent()
    {
        $query = "SELECT a.id_user,a.branch_code,a.kecamatan,a.nohp,a.alamatusaha,b.name as nama,a.status
                  FROM branches a
                  left join user b on a.id_user=b.id
                  
                ";
    return $this->db->query($query)->result_array();
    }

    public function editdata($where, $table)
    {
        $this->db->where('reference_number', $where);
        $this->db->update($table);
    }
}
