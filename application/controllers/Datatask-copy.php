<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatask extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }



    public function Neworder()
    {
        $data['title'] = 'Input KK';
        // $data['user'] = $this->db->select('id , name, email');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('name')])->row_array();
        $data['id'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('order/neworder', $data);
        
        $jumlah = count($this->input->post('nama'));
        $data = array();
        
        
        // print_r($jumlah);die();
        for($i=0;$i<$jumlah;$i++){
            $data[] = [
                    'nama'=> $this->input->post(['nama'])[$i],
                    'pekerjaan'=> $this->input->post('pekerjaan')[$i],
                    'alamat'=> $this->input->post('alamat')[$i]
            ];
                echo "<pre>";print_r($data);
                // die;
                // echo $jumlah;
                // var_dump($data);die;
            // $this->db->insert("tbl_pegawai",$data);
        }    
        // redirect('order/neworder','refres');
    }        
    
}