<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatask extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // destroy();
    }



    public function Neworder()
    {
        $data['title'] = 'Input KK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $this->db->get_where('user', ['email' => $this->session->userdata('id')])->row_array();

        //$data['kel'] = $this->load->model('Data_model', 'get_kel');
        //$data['kel'] = $this->get_kel->get_kel();
        //$data['kec'] = $this->load->model('Data_model', 'get_kec');
        //$data['kec'] = $this->get_kec->get_kec();
        $data['kot'] = $this->load->model('Data_model', 'get_kot');
        $data['kot'] = $this->get_kot->get_kot();
        $data['prov'] = $this->load->model('Data_model', 'get_prov');
        $data['prov'] = $this->get_prov->get_prov();
        $data['pend'] = $this->load->model('Data_model', 'get_pend');
        $data['pend'] = $this->get_prov->get_pend();
        $data['pekj'] = $this->load->model('Data_model', 'get_pekj');
        $data['pekj'] = $this->get_prov->get_pekj();
        $data['agma'] = $this->load->model('Data_model', 'get_agama');
        $data['agma'] = $this->get_prov->get_agama();
        $data['rdata'] = $this->load->model('Data_model', 'get_rdata');
        $data['rdata'] = $this->get_prov->get_rdata();
        $data['jkel'] = $this->load->model('Data_model', 'get_jkel');
        $data['jkel'] = $this->get_prov->get_jkel();
        $data['kawn'] = $this->load->model('Data_model', 'get_kawn');
        $data['kawn'] = $this->get_prov->get_kawn();
        $data['hubk'] = $this->load->model('Data_model', 'get_hubk');
        $data['hubk'] = $this->get_prov->get_hubk();
        $data['warg'] = $this->load->model('Data_model', 'get_warg');
        $data['warg'] = $this->get_prov->get_warg();
        $this->db->where('create_by',$data['user']['id']);
        $this->db->like('create_date',date('Y-m-d'));
        //$this->db->where('role_id','4');
        $this->db->from('master_kk');
        $data['masterkk'] =$this->db->count_all_results();
        
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/neworder', $data);
        $this->load->view('templates/footer');
    }
   
    public function Simpan()
    {   
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        // $id['id'] = $this->get_kel->get_kel();
        // echo "<pre>";print_r($id);die;
        //$this->form_validation->set_rules('no_kk', 'no_kk', 'trim|numeric|exact_length[16]');
        //$this->form_validation->set_rules('rt', 'rt', 'trim|numeric');
        //$this->form_validation->set_rules('no_kontrak', 'no_kontrak', 'trim|numeric');
        //$this->form_validation->set_rules('rw', 'rw', 'trim|numeric');
        //$this->form_validation->set_rules('kodepos', 'kodepos', 'trim|numeric');
        
        

        //if ($this->form_validation->run() == false) {
           // $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Nomor KK, Rt, Rw dan Kodepos Wajib Input Nomor !</div>');
           // redirect('datatask/neworder');
        //} else {
            $start = $this->input->post('start');
            $end = date('Y-m-d H:i:s');
            $data2 = array(
                'no_kk' => trim($this->input->post('no_kk')),
                'kepalakeluarga' => addslashes(strtoupper($this->input->post('kepalakeluarga'))),
                'alamat' => addslashes(strtoupper($this->input->post('alamat'))),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'desa' => addslashes(strtoupper($this->input->post('desa'))),
                //'kelurahan' => strtoupper($this->input->post('kelurahan')), //kelurahan disatukan ke field desa
                'kecamatan' => addslashes(strtoupper($this->input->post('kecamatan'))),
                'kota_kabupaten' => addslashes(strtoupper($this->input->post('kota_kabupaten'))),
                'kodepos' => $this->input->post('kodepos'),
                'provinsi' => addslashes(strtoupper($this->input->post('provinsi'))),
                'create_by' => $this->input->post('create_by'),
                'no_kontrak' => trim($this->input->post('no_kontrak')),
                //'remark_kk' => trim($this->input->post('remark_kk')),
                'start' => $this->input->post('start'),
                'end'=> date('Y-m-d H:i:s'),
                'durasi' => strtotime($end)-strtotime($start),
            );
            //$data3 = ['durasi' => strtotime($data['end'])-strtotime($data['start'])];
            //echo "<pre>"; print_r($data2);die;
            $sql = $this->db->query("SELECT no_kontrak FROM master_kk where no_kontrak='{$data2['no_kontrak']}'"); //perubahan cek double kk ke cek double kontrak \ 01 mei 2024 perubahan ke validasi by nomrkk \ 29 jun 24 jov req val by nokontrak//
            $cek_no_kon = $sql->num_rows();
           

            if ($cek_no_kon > 0) {
                $this->session->set_flashdata('msgnomor', '<div class="alert alert-danger" role="alert">Nomor Kontrak Sudah digunakan sebelumnya '. $data2['no_kontrak'] .''); //01 mei 2024 perubahan ke validasi by nomrkk
                redirect(site_url('datatask/neworder'));
            } else {
                // echo "<pre>"; print_r($data2);
                $this->db->insert('master_kk', $data2);
                $return = $this->db->get_where('master_kk', ['no_kontrak' => $data2['no_kontrak']])->row_array(); //perubahan parent id di table data kk menjadi id table master kk
                //var_dump($return['id']);die;
                
                //multidinamis form kk
                $jumlah = count($this->input->post('nik'));
                $data = array();
                //print_r($jumlah);die();

                for ($i = 0; $i < $jumlah; $i++) {
                    $data = array(
                        'parent_id' => $return['id'], //parent id di table da_kk mengambil id di master_kk
                        'no_kk' => $data2['no_kk'],
                        'nama_lengkap' => addslashes(strtoupper($this->input->post('nama_lengkap')[$i])),
                        'nik' => trim($this->input->post('nik')[$i]),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin')[$i],
                        'tempat_lahir' => addslashes(strtoupper($this->input->post('tempat_lahir')[$i])),
                        'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir')[$i])),
                        'agama' => $this->input->post('agama')[$i],
                        'pendidikan' => $this->input->post('pendidikan')[$i],
                        'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan')[$i],
                        'status_perkawinan' => $this->input->post('status_perkawinan')[$i],
                        'hub_keluarga' => $this->input->post('hub_keluarga')[$i],
                        'kewarganegaraan' => $this->input->post('kewarganegaraan')[$i],
                        'no_paspor' => trim($this->input->post('no_paspor')[$i]),
                        'no_kitas' => trim($this->input->post('no_kitas')[$i]),
                        'ayah' => addslashes(strtoupper($this->input->post('ayah')[$i])),
                        'ibu' => addslashes(strtoupper($this->input->post('ibu')[$i])),
                        //'remark_data' => trim($this->input->post('remark_data')[$i]),
                        'create_by' => $data2['create_by'],
                        
                    );
                    //echo "<pre>"; print_r($data);die;

                    $this->db->insert('data_kk', $data);
                }
                $this->session->set_flashdata('msgsubmit', '<div class="alert alert-success" role="alert">Data berhasil di Submit</div>');
                redirect('datatask/neworder');

            }
        }
    
    
    
}
