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
        $this->form_validation->set_rules('no_kk', 'no_kk', 'required|trim');
        $this->form_validation->set_rules('kepalakeluarga', 'KepalaKeluarga', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kota_kabupaten', 'Kota_kabupaten', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'required|trim');
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('jenis_pekerjaan', 'Jenis_pekerjaan', 'required|trim');
        $this->form_validation->set_rules('status_perkawinan', 'Status_perkawinan', 'required|trim');
        $this->form_validation->set_rules('hub_keluarga', 'Hub_keluarga', 'required|trim');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
        $this->form_validation->set_rules('no_paspor', 'No_paspor', 'required|trim');
        $this->form_validation->set_rules('no_kitas', 'No_kitas', 'required|trim');
        $this->form_validation->set_rules('ayah', 'Ayah', 'required|trim');
        $this->form_validation->set_rules('ibu', 'Ibu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Input KK';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/neworder', $data);
            $this->load->view('templates/footer');
        } else {


        $data3 = [
            'no_kk' => $this->input->post('no_kk', true),
            'kepalakeluarga' => $this->input->post('kepalakeluarga', true),
            'alamat' => $this->input->post('alamat', true),
            'rt' => $this->input->post('rt', true),
            'rw' => $this->input->post('rw', true),
            'desa' => $this->input->post('desa', true),
            'kelurahan' => $this->input->post('kelurahan', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kota_kabupaten' => $this->input->post('kota_kabupaten', true),
            'kodepos' => $this->input->post('kodepos', true),
            'provinsi' => $this->input->post('provinsi', true),
        ];
        $this->db->insert('master_kk', $data3);
        // $data2 = array();
        $jumlah = count($this->input->post('nik'));print_r($jumlah);die();
         
        for ($i = 0; $i < $jumlah; $i++) {
            $data2 = 
            array(
                'nama_lengkap'=> $this->input->post('nama_lengkap')[$i],
                'nik'=> $this->input->post('nik')[$i],
                'jenis_kelamin'=> $this->input->post('jenis_kelamin')[$i],
                'tempat_lahir'=> $this->input->post('tempat_lahir')[$i],
                'tanggal_lahir'=> $this->input->post('tanggal_lahir')[$i],
                'agama'=> $this->input->post('agama')[$i],
                'pendidikan'=> $this->input->post('pendidikan')[$i],
                'jenis_pekerjaan'=> $this->input->post('jenis_pekerjaan')[$i],
                'status_perkawinan'=> $this->input->post('status_perkawinan')[$i],
                'hub_keluarga'=> $this->input->post('hub_keluarga')[$i],
                'kewarganegaraan'=> $this->input->post('kewarganegaraan')[$i],
                'no_paspor'=> $this->input->post('no_paspor')[$i],
                'no_kitas'=> $this->input->post('no_kitas')[$i],
                'ayah'=> $this->input->post('ayah')[$i],
                'ibu'=> $this->input->post('ibu')[$i],

            );
       
            $this->db->insert('data_kk', $data2);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order Success!</div>');
        redirect('user');
    }
}
}