<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function get_kec()
    { {
            $query = "SELECT id,data
                      FROM mst_prov
                      
                      where kode ='kec'
                      order by data asc
                      
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    public function get_kot()
    { {
            $query = "SELECT id,data
                      FROM mst_prov
                      
                      where kode ='kota'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    public function get_kel()
    { {
            $query = "SELECT id,data
                      FROM mst_prov
                      
                      where kode ='kel'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    public function get_prov()
    { {
            $query = "SELECT id,data
                      FROM mst_prov
                      
                      where kode ='prov'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    public function get_pend()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='pend'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    public function get_agama()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='agma'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    
   public function get_pekj()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='pekj'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    
    public function get_rdata()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='rdata'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    public function get_jkel()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='jkel'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    public function get_kawn()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='kawn'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    
    public function get_hubk()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='hubk'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
    
    public function get_warg()
    { {
            $query = "SELECT id,data
                      FROM mst_data
                      
                      where kode ='warg'
                      order by data asc
                    ";
            return $this->db->query($query)->result_array();
        }
    }
   
}
