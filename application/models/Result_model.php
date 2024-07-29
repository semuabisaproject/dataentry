<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_model extends CI_Model
{
    

    public function get_all()
    {

        return $this->db->get('master_kk')->result_array();
    }

    public function get_limit($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('no_kk', $keyword);
            $this->db->or_like('kepalakeluarga',$keyword);
            $this->db->or_like('no_kontrak',$keyword);
        }
        return $this->db->get('master_kk', $limit, $start)->result_array();
    }

    public function get_row()
    {

        return $this->db->get('master_kk')->num_rows();
    }
    
    public function get_daily()
    {
    $query = "SELECT count(id) as `jumlah`,date_format(create_date,'%y-%m-%d') as `tanggal`
                  FROM master_kk
                  where month(create_date) = month(current_date)
                  group by date_format(create_date,'%y-%m-%d')
                  
                  
                ";
        return $this->db->query($query)->result_array();
    
    }
    
     public function get_by_agent()
     {
     $query = "SELECT count(a.id) as `jumlah`,c.durasi as`durasi`,
                  date_format(a.create_date,'%y-%m-%d') as `tanggal`,b.name as`nama`,date_format(b.date_created,'%Y-%m-%d') as `join`,
                  c.jumlah as `total`,concat(round(( (c.jumlah/ 130 )* 100 ), 2 ), '%' ) AS `productivity`,
                  concat(round(( (d.jumlah/ 130 )* 100 ), 2 ), '%' ) AS `skip`,
                  case when b.is_active =1 then 'aktif' else 'tidak aktif' end as `status`
                  FROM master_kk a
                  left join user b on a.create_by=b.id
                  left join v_total_byagent c on a.create_by=c.create_by
                  left join v_total_skip d on a.create_by=d.create_by
                  where month(a.create_date) = month(current_date) 
                  group by (a.create_by)
                  order by c.jumlah desc
                  
                  
                ";
        return $this->db->query($query)->result_array();
     
     
     
     }
     public function get_info()
     {
     $query = "select
               a.no_kk as `no_kk`,
               a.kepalakeluarga as `kepala`,  
               b.name as`create`,
               c.name as `update`
                  
                  FROM master_kk a
                  left join user b on a.create_by=b.id
                  left join user c on a.update_by=c.id
                ";
        return $this->db->query($query)->result_array();
     
     
     
     }
     
     public function get_agent_active()
     {
     $query = "SELECT count(id) as `jumlah`
               from user
                  
                  where is_active=1 and role_id=4
                  
                 
                  
                  
                ";
        return $this->db->query($query)->result_array();
     
     
     
     }
     
      
     
   
}
