<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }



    public function index()
    {
        $data['title'] = 'Mitra Verifikasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['user'] = $this->db->get('user')->row_array();



        // $this->form_validation->set_rules('ktp', 'ktp', 'required|trim');
        // $this->form_validation->set_rules('npwp', 'npwp', 'required|trim');
        // $this->form_validation->set_rules('alamatktp', 'alamatktp', 'required|trim');
        // $this->form_validation->set_rules('alamatkantor', 'alamatkantor', 'required|trim');
        // $this->form_validation->set_rules('alamatusaha', 'alamatusaha', 'required|trim');
        // $this->form_validation->set_rules('notelpusaha', 'notelpusaha', 'required|trim');
        // $this->form_validation->set_rules('norek', 'norek', 'required|trim');
        // $this->form_validation->set_rules('badanhukum', 'badanhukum', 'required|trim');



        // if ($this->form_validation->run() == false) {
        $data['title'] = 'Mitra Verifikasi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mitra/verifikasi', $data);
        $this->load->view('templates/footer');
        // } else {
        //     $role['role'] = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();
        //     $data = [

        //         'verifikasi' => 1,
        //         'date_updated' => time()
        //     ];

        //     $data2 = [
        //         'id' => $this->input->post('id_user', true),
        //         'ktp' => $this->input->post('ktp', true),
        //         'npwp' => $this->input->post('npwp', true),
        // 'nohp' => $this->input->post('nohp', true),
        // 'alamatktp' => $this->input->post('alamatktp', true),
        // 'alamatusaha' => $this->input->post('alamatusaha', true),
        // 'alamatkantor' => $this->input->post('alamatkantor', true),
        // 'badanhukum' => $this->input->post('badanhukum', true),
        // 'norek' => $this->input->post('norek', true),
        // 'notelpusaha' => $this->input->post('notelpusaha', true),
        // 'image' => 'default.jpg',

        //     ];


        //     if ($role == 3) {
        //         $this->db->insert('branches', $data2);
        //         $this->db->update('user', $data);
        //     } else { //($role == 4) {
        //         $this->db->insert('kurir', $data2);
        //         $this->db->update('user', $data);
        //         // }var_dump($data);exit;
        //     }
        // }
    }
    public function dataverifikasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role = $this->input->get('register_as');
        $id = $this->input->get('id');
        // $nohp = $this->get($data,'nohp')->row_array();
        $result = $this->db->get_where('user', ['id' => $id])->row_array();
        $cekagent = $this->db->get_where('branches',['id_user' =>$id]);
        $cekkurir = $this->db->get_where('kurir',['id_user' =>$id]);
        $ceksatelite = $this->db->get_where('satelite',['id_user' =>$id]);
        $cekhub = $this->db->get_where('hub',['id_user' =>$id]);
        // $this->form_validation->set_rules('ktp', 'ktp', 'required|trim');
        // $this->form_validation->set_rules('npwp', 'npwp', 'required|trim');
        // $this->form_validation->set_rules('alamatktp', 'alamatktp', 'required|trim');
        // $this->form_validation->set_rules('alamatkantor', 'alamatkantor', 'required|trim');
        // $this->form_validation->set_rules('alamatusaha', 'alamatusaha', 'required|trim');
        // $this->form_validation->set_rules('notelpusaha', 'notelpusaha', 'required|trim');
        // $this->form_validation->set_rules('norek', 'norek', 'required|trim');
        // $this->form_validation->set_rules('badanhukum', 'badanhukum', 'required|trim');

        if ($result['id'] == $id) {
            //     $data['title'] = 'Mitra Verifikasi';
            //     $this->load->view('templates/header', $data);
            //     $this->load->view('templates/sidebar', $data);
            //     $this->load->view('templates/topbar', $data);
            //     $this->load->view('mitra/verifikasi', $data);
            //     $this->load->view('templates/footer'); 
            // } else {
            // $role['role'] = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();
            $data = [

                'verifikasi' => 1,
                'date_updated' => time(),
                //     'role_id' => $role
            ];

            $data3 = [
                'id_user' => $id,
                'ktp' => $this->input->post('ktp', true),
                'npwp' => $this->input->post('npwp', true),
                'nohp' => $this->input->post('nohp', true),
                'alamatktp' => $this->input->post('alamatktp', true),
                // 'alamatusaha' => $this->input->post('alamatusaha', true),
                // 'alamatkantor' => $this->input->post('alamatkantor', true),
                // 'badanhukum' => $this->input->post('badanhukum', true),
                'norek' => $this->input->post('norek', true),
                // 'notelpusaha' => $this->input->post('notelpusaha', true),
                'image' => 'default.jpg',

            ];

            $data4 = [
                'id_user' => $id,
                'ktp' => $this->input->post('ktp', true),
                'npwp' => $this->input->post('npwp', true),
                'nohp' => $this->input->post('nohp', true),
                'alamatktp' => $this->input->post('alamatktp', true),
                'alamatusaha' => $this->input->post('alamatusaha', true),
                // 'alamatkantor' => $this->input->post('alamatkantor', true),
                'badanhukum' => $this->input->post('badanhukum', true),
                'norek' => $this->input->post('norek', true),
                // 'notelpusaha' => $this->input->post('notelpusaha', true),
                'image' => 'default.jpg',

            ];
        }
        if ($role == 3 and $cekkurir->num_rows() < 1) {
            $this->db->insert('kurir', $data3);
            $this->db->set('verifikasi', $data['verifikasi']);
            $this->db->set('date_updated', $data['date_updated']);
            $this->db->set('role_id', $role);
            $this->db->where('id', $id);
            $this->db->update('user');
            redirect('auth/logout');
        } elseif ($role == 4 and $cekagent->num_rows() < 1) {
            $this->db->insert('branches', $data4);
            $this->db->set('verifikasi', $data['verifikasi']);
            $this->db->set('date_updated', $data['date_updated']);
            $this->db->set('role_id', $role);
            $this->db->where('id', $id);
            $this->db->update('user');
            redirect('auth/logout');
            // }var_dump($data);exit;
        } elseif ($role == 6 and $ceksatelite->num_rows() < 1) {
            $this->db->insert('satelite', $data4);
            $this->db->set('verifikasi', $data['verifikasi']);
            $this->db->set('date_updated', $data['date_updated']);
            $this->db->set('role_id', $role);
            $this->db->where('id', $id);
            $this->db->update('user');
            redirect('auth/logout');
        } elseif ($role == 6 and $cekhub->num_rows() < 1) {
            $this->db->insert('hub', $data4);
            $this->db->set('verifikasi', $data['verifikasi']);
            $this->db->set('date_updated', $data['date_updated']);
            $this->db->set('role_id', $role);
            $this->db->where('id', $id);
            $this->db->update('user');
            redirect('auth/logout');
        } else {
            $this->session->set_flashdata('message_error', '<div class="alert alert-danger" role="alert">Data Already submit</div>');
            redirect('verifikasi/?id=' . $id['id'] . '&register_as=' . $role['register_as']);
        }
    }
}
