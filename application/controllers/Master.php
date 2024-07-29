<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('master_model');
    }
    
    
    public function Index()
    {
        $data['title'] = 'Master data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('templates/footer', $data);
        
    }
    
    
    
    public function Datamaster()
    {
        $data['title'] = 'Data Master';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        //$this->db->order_by('create_date', 'DESC');
        $this->db->like('kode', $data['keyword']);        
        $this->db->from('mst_data');
        $config2['total_rows'] = $this->db->count_all_results(); //total row nya 
        $data['total_rows'] = $config2['total_rows'];
        $config2['per_page'] = 500;
        $this->db->select('*');
        $this->db->from('mst_data');
        $this->db->group_by(['mst_data.kode']);
        $data['kode'] = $this->db->get()->result_array();

        $this->pagination->initialize($config2);
        $data['start'] = $this->uri->segment(3);

        // setting config per page

        $data['data'] = $this->master_model->get_limit($config2['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('master/datamaster', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function Masterprov()
    {
        $data['title'] = 'Master Area';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        //$this->db->order_by('create_date', 'DESC');
        $this->db->like('kode', $data['keyword']);        
        $this->db->from('mst_prov');
        $config2['total_rows'] = $this->db->count_all_results(); //total row nya 
        $data['total_rows'] = $config2['total_rows'];
        $config2['per_page'] = 500;
        $this->db->select('*');
        $this->db->from('mst_prov');
        $this->db->group_by(['mst_prov.kode']);
        $data['prov'] = $this->db->get()->result_array();

        $this->pagination->initialize($config2);
        $data['start'] = $this->uri->segment(3);

        // setting config per page

        $data['data'] = $this->master_model->get_limit_prov($config2['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('master/masterprov', $data);
        $this->load->view('templates/footer', $data);
    }
    
    
    public function Tambahdata()
    {
        $data['title'] = 'Add Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
                'kode' => $this->input->post('kode'),
                'data' => $this->input->post('data')
                
            ];
            $this->db->insert('mst_data', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Added!</div>');
            redirect('master/datamaster');
        }
        
        
    public function Tambahprov()
    {
        $data['title'] = 'Add Area';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
                'kode' => $this->input->post('kode'),
                'data' => $this->input->post('data')
                
            ];
            $this->db->insert('mst_prov', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Area Added!</div>');
            redirect('master/masterprov');
        }
    
}