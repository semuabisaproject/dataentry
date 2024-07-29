<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller

    {
    public function Monitoring()
    {
        $data['title'] = 'Monitoring';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/monitoring', $data);
       // $this->load->view('templates/footer');
        }
    public function daily()
    {
        $data['title'] = 'Data Daily';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/daily', $data);
       // $this->load->view('templates/footer');
        }
    }