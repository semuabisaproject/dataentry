<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function get_order()
    {
        $query = "SELECT a.id,a.reference_number,a.namapengirim,a.namapenerima,a.alamatpenerima,a.jenisbarang,a.price,b.data as status
                  FROM parcels a
                  left join mst_data b on a.status=b.id
                  order by a.id desc
                ";
        return $this->db->query($query)->result_array();
    }
    public function get_kec()
    {
        $query = "SELECT *
                  FROM mst_area
                  
                  group by kecamatan
                  limit 100
                ";
        return $this->db->query($query)->result_array();
    }
    public function get_kota()
    {
        $query = "SELECT *
                  FROM mst_area 
                  
                  group by id_kota
                  limit 100
                ";
        return $this->db->query($query)->result_array();
    }

    function getkel($q)
    {
        $this->db->select('id_area,kota, CONCAT(kelurahan, '.', "-", '.', kecamatan, "-", '.', kota) AS text');
        $this->db->like('kota', $q);
        $query = $this->db->get('mst_area');
        return $query->result();
    }
    public function  get_orderid()
    {
        $query = "SELECT max(id)+1 as id
                  FROM parcels 
                  
                  
                  
                ";
        return $this->db->query($query)->result();
    }

    
    // public function view($ref_number)
    // {
    //     $this->db->select('*');
    //     $this->db->where('reference_number', $ref_number);
    //     $query = $this->db->get('parcel');
    //     return $query->row_array();
    // }
    public function editdata($where, $table)
    {
        $this->db->where('reference_number', $where);
        $this->db->update($table, $where);
    }

    function getalldata()
    {
        $query = "select count(`master_kk`.`id`) AS `jumlah` from `master_kk`
                    ";
                    
        return $this->db->query($query)->result_array();
    }


    function getpickup($id, $ref)
    {
        $this->db->select('id', 'reference_number');
        $this->db->where('id', $id);
        $this->db->where('reference_number', $ref);
        $query = $this->db->get('parcels');
        return $query->row_array();
    }

    function orderkurir()
    {
        $query = "SELECT g.alamatktp as alamatsatelite,g.branch_code as kode_satelite,a.order_by,f.alamatktp,a.order_id,a.id,a.reference_number,a.namapengirim,a.alamatpengirim,c.kecamatan as kec_asal,a.namapenerima,a.alamatpenerima,d.kecamatan as kec_tujuan,e.data as status
                    
                    from parcels a 
                    -- left join parcels b on a.parcel_id=b.id
                    left join mst_area c on a.kec_asal=c.id_kec
                    left join mst_area d on a.kec_tujuan=d.id_kec
                    left join mst_data e on a.status=e.id
                    left join branches f on a.order_by=f.branch_code
                    left join satelite g on f.kecamatan=g.kecamatan
                    where a.status=2
                    group by a.reference_number
                    ";
        return $this->db->query($query)->result_array();
    }

    function hubpick()
    {
        $query = "SELECT a.id,a.reference_number,a.namapengirim,a.alamatpengirim,c.kecamatan as kec_asal,a.namapenerima,a.alamatpenerima,d.kecamatan as kec_tujuan,e.data as status
                    
                    from parcels a 
                    -- left join parcels b on a.parcel_id=b.id
                    left join mst_area c on a.kec_asal=c.id_kec
                    left join mst_area d on a.kec_tujuan=d.id_kec
                    left join mst_data e on a.status=e.id
                    where a.status=5
                    group by a.reference_number
                    ";
        return $this->db->query($query)->result_array();
    }

    function tasksatelit()
    {
        $query = "SELECT a.id,a.reference_number,c.kecamatan as kec_asal,d.kecamatan as kec_tujuan,a.namapengirim,a.namapenerima,a.jenisbarang,a.alamatpenerima,a.alamatpengirim,a.status as status_awal,
                    case when a.status is null then 'new order'
                    else b.data end as status_update 
                    from parcels a 
        -- left join parcel_tracks b on a.id=b.parcel_id
        left join mst_data b on a.status=b.id
        left join mst_area c on a.kec_asal=c.id_kec
        left join mst_area d on a.kec_tujuan=d.id_kec
        where a.status=3  
        group by a.reference_number
        ";
        return $this->db->query($query)->result_array();
    }

    function taskhub()
    {
        $query = "SELECT a.status,a.id,a.reference_number,c.kecamatan as kec_asal,d.kecamatan as kec_tujuan,a.namapengirim,a.namapenerima,a.jenisbarang,a.alamatpenerima,a.alamatpengirim,a.status as status_awal,
                    case when a.status is null then 'new order'
                    else b.data end as status_update 
                    from parcels a 
        -- left join parcel_tracks b on a.id=b.parcel_id
        left join mst_data b on a.status=b.id
        left join mst_area c on a.kec_asal=c.id_kec
        left join mst_area d on a.kec_tujuan=d.id_kec
        where a.status=4  or a.status =5 or a.status=6 or a.status=7 or a.status=9 or a.status=10 or a.status=11 or a.status=12
        group by a.reference_number
        ";
        return $this->db->query($query)->result_array();
    }

    function selfdelivery()
    {
        $query = "SELECT a.status,a.id,a.reference_number,c.kecamatan as kec_asal,d.kecamatan as kec_tujuan,a.namapengirim,a.namapenerima,a.jenisbarang,a.alamatpenerima,a.alamatpengirim,a.status as status_awal,
                    case when a.status is null then 'new order'
                    else b.data end as status_update 
                    from parcels a 
        -- left join parcel_tracks b on a.id=b.parcel_id
        left join mst_data b on a.status=b.id
        left join mst_area c on a.kec_asal=c.id_kec
        left join mst_area d on a.kec_tujuan=d.id_kec
        where a.status=10 or a.status=11 or a.status=12
        group by a.reference_number
        ";
        return $this->db->query($query)->result_array();
    }

    function trackorder()
    {

        $query = "SELECT a.id as id_track,a.reference_number,a.date_created,b.data as position
        from parcel_tracks a 

        left join mst_data b on a.status=b.id
        
        order by a.date_created asc
        
        ";

        return $this->db->query($query)->result_array();
    }

    function completeorder()
    {

        $query = "SELECT a.id,a.reference_number,a.date_created,b.data as position
        from parcel_tracks a 

        left join mst_data b on a.status=b.id
        
        order by a.date_created asc
        
        ";

        return $this->db->query($query)->result_array();
    }
    function upload($ref)
    {

        $query = "SELECT id,reference_number
        from parcels

        where reference_number = $ref
        
        order by a.date_created asc
        
        ";

        return $this->db->query($query)->result_array();
    }
    
    public function countall()
     {   
       $query = "SELECT count(id) FROM master_kk group by no_kk";
       return $this->db->query($query)->num_rows();
     }
}
