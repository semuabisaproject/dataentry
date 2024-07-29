<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resultdata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('result_model');
    }
    public function Result()
    {
        $data['title'] = 'Result';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        //$this->db->order_by('create_date', 'DESC');
        $this->db->like('no_kontrak', $data['keyword']);        
        $this->db->from('master_kk');
        $config['total_rows'] = $this->db->count_all_results(); //total row nya 
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        // setting config per page

        $data['data'] = $this->result_model->get_limit($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/result', $data);
        $this->load->view('templates/footer', $data);
    }
    public function cekdata($par)
    {
        $data['title'] = 'Data Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['view'] = $this->db->get_where('data_kk', ['parent_id' => $par])->row_array();
        $this->db->select('*,b.name as create,a.id as id_master,c.name as update');
        $this->db->from('master_kk a');
        $this->db->join('user b','b.id=a.create_by','left');
        $this->db->join('user c','c.id=a.update_by','left');
        $this->db->where(['a.id' => $par]);
        $data['cekdata'] = $this->db->get()->result_array();
        // var_dump($data);die;
        $this->db->select('*,b.name as create,a.id as id_data,date_format(a.update_date,"%Y-%m-%d %H:%i:%s") as tgl_update');
        $this->db->from('data_kk a');
        $this->db->join('user b','b.id=a.create_by','left');
        //$this->db->join('user c','c.id=a.update_by','left');
        $this->db->where(['a.parent_id' => $par]);
        $this->db->group_by(['a.id']);
        $data['cekdetail'] = $this->db->get()->result_array();
        
        $this->db->select('a.id as id_data,c.name as update,date_format(a.update_date,"%Y-%m-%d %H:%i:%s") as tgl_update');
        $this->db->from('data_kk a');        
        $this->db->join('user c','c.id=a.update_by','left');
        $this->db->where(['a.parent_id' => $par]);
        $this->db->where(['a.update_by' >0]);
        $this->db->group_by(['a.parent_id']);
        $data['cekupdate'] = $this->db->get()->result_array();
        //$this->result_model->get_info();
        //$data['info'] = $this->get_info->get_info(['no_kk' =>$par]);
        //var_dump($data['cekupdate']);die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/complete', $data);
        $this->load->view('templates/footer');
    }

    public function Verifikasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('id')])->row_array();
        $id = $this->input->get('id');
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $time = date('Y-m-d H:i:s');
        $data2 =
            [
                // 'id'=>$id,
              
                'nama_lengkap' => addslashes(strtoupper($this->input->post('nama_lengkap'))),
                'nik' => addslashes(strtoupper($this->input->post('nik'))),
                'jenis_kelamin' => addslashes(strtoupper($this->input->post('jenis_kelamin'))),
                'tempat_lahir' => addslashes(strtoupper($this->input->post('tempat_lahir'))),
                'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
                'agama' => addslashes(strtoupper($this->input->post('agama'))),
                'pendidikan' => addslashes(strtoupper($this->input->post('pendidikan'))),
                'jenis_pekerjaan' => addslashes(strtoupper($this->input->post('jenis_pekerjaan'))),
                'status_perkawinan' => addslashes(strtoupper($this->input->post('status_perkawinan'))),
                'hub_keluarga' => addslashes(strtoupper($this->input->post('hub_keluarga'))),
                'kewarganegaraan' => addslashes(strtoupper($this->input->post('kewarganegaraan'))),
                'no_paspor' => addslashes(strtoupper($this->input->post('no_paspor'))),
                'no_kitas' => addslashes(strtoupper($this->input->post('no_kitas'))),
                'ayah' => addslashes(strtoupper($this->input->post('ayah'))),
                'ibu' => addslashes(strtoupper($this->input->post('ibu'))),
                'update_date' => $time,
                'update_by' => $this->input->post('update_by'),

            ];
        $result = $this->db->get_where('data_kk', ['id' => $id])->row_array();
        
    
        //var_dump($cek_no_kon); die;
        
        //echo "<pre>";print_r($result);echo "<pre>";print_r($id);die;
          
        if ($result['id'] == $id) {

            $this->db->update('data_kk', $data2, ['id' => $id]);
            $this->session->set_flashdata('messagedata', '<div class="alert alert-success" role="alert">Update data anggota keluarga sukses</div>');
            redirect('resultdata/cekdata/' . $result['parent_id']);
        } else {
            $this->session->set_flashdata('messagedata', '<div class="alert alert-danger" role="alert">Anggota Keluarga Tidak Ditemukan</div>');
            redirect('resultdata/cekdata/' . $result['parent_id']);
        }
    }

    public function Editdatakk()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('id')])->row_array();
        $id = $this->input->get('id');
        $kk = $this->input->get('no_kk');
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $time = date('Y-m-d H:i:s');
        // var_dump($time);
        // die;
        $data2 =
            [
                // 'id'=>$id,
                'no_kontrak' => addslashes(strtoupper($this->input->post('no_kontrak'))),
                'no_kk' => trim($this->input->post('no_kk')), //req update no kk
                'alamat' => addslashes(strtoupper($this->input->post('alamat'))),
                'kepalakeluarga' => addslashes(strtoupper($this->input->post('kepalakeluarga'))),
                'rt' => addslashes(strtoupper($this->input->post('rt'))),
                'rw' => addslashes(strtoupper($this->input->post('rw'))),
                'desa' => addslashes(strtoupper($this->input->post('desa'))),
                //'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => addslashes(strtoupper($this->input->post('kecamatan'))),
                'kota_kabupaten' => addslashes(strtoupper($this->input->post('kota_kabupaten'))),
                'kodepos' => addslashes(strtoupper($this->input->post('kodepos'))),
                'provinsi' => addslashes(strtoupper($this->input->post('provinsi'))),
                'update_date' => $time,
                'update_by' => $this->input->post('update_by'),


            ];
        //$result = $this->db->get_where('master_kk', ['id' => $id], ['no_kk' => $kk])->row_array();
            $sql = $this->db->query("SELECT no_kk FROM master_kk where no_kontrak='{$data2['no_kontrak']}'"); //perubahan cek double kk ke cek double kontrak
            $cek_no_kon = $sql->num_rows();
        $result = $this->db->get_where('master_kk', ['id' => $id])->row_array();
        //var_dump($result,$data2);die;
        // var_dump($data2['create_by']);die;
        //echo "<pre>";print_r($result);echo "<pre>";print_r($id);die;
       if ($result['id'] == $id and $result['no_kontrak']==$data2['no_kontrak'] and $cek_no_kon == 1) {

            $this->db->update('master_kk', $data2, ['id' => $id]);
            $this->db->set('no_kk', $data2['no_kk']); //req update no kk
            $this->db->where('parent_id', $id); //req update no kk
            $this->db->update('data_kk'); //req update no kk
            $this->session->set_flashdata('messagekk', '<div class="alert alert-success" role="alert">Update Master KK Sukses</div>');
            redirect('resultdata/cekdata/' . $result['id']);
        } else if ($result['id'] == $id and $result['no_kontrak']!=$data2['no_kontrak'] and $cek_no_kon == 0) {

            $this->db->update('master_kk', $data2, ['id' => $id]);
            $this->db->set('no_kk', $data2['no_kk']); //req update no kk
            $this->db->where('parent_id', $id); //req update no kk
            $this->db->update('data_kk'); //req update no kk
            $this->session->set_flashdata('messagekk', '<div class="alert alert-success" role="alert">Update Master KK Sukses</div>');
            redirect('resultdata/cekdata/' . $result['id']);
        } else {
            $this->session->set_flashdata('messagekk', '<div class="alert alert-danger" role="alert">No Kontrak Double</div>');
            redirect('resultdata/cekdata/' . $result['id']);
        }
    }
    
    public function Dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       // $data['countall'] = $this->load->model('order_model');
        //$this->load->model('order_model');
        //$this->order_model->getalldata();
        //$data['countall'] = $this->getalldata->getalldata();
        $this->db->from('master_kk');
       //$data['countall'] =$this->db->count_all_results();
      $this->db->like('create_date',date('Y-m-d'));
       //$this->db->from('master_kk');
       // $this->db->group_by('no_kk');
       
        $data['countall'] = $this->load->model("Order_model");
        $data['countall'] = $this->Order_model->countall();
        // var_dump($query);die;
       
       
       
        $data['counttoday'] =$this->db->count_all_results();
        $this->db->where('is_login','1');
        $this->db->where('role_id','4');
        $this->db->from('user');
        $data['userlogin'] =$this->db->count_all_results();
        $this->db->where('is_active','1');
        $this->db->where('role_id','4');
        $this->db->from('user');
        $data['agentaktif'] =$this->db->count_all_results();
        $data['daily'] = $this->result_model->get_daily();
        $data['byagent'] = $this->result_model->get_by_agent();
        
        
        
        
        //print_r($data['daily']);die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/dashboard', $data);
        $this->load->view('templates/footer');

    }
    
    public function tambahdata($par)
    {
        $data['title'] = 'Tambah Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $this->db->get_where('user', ['email' => $this->session->userdata('id')])->row_array();
        
        //$data['kel'] = $this->load->model('Data_model', 'get_kel');
        //$data['kel'] = $this->get_kel->get_kel();
        //$data['kec'] = $this->load->model('Data_model', 'get_kec');
        $this->db->select('*,b.name as create,a.id as id_master,c.name as update');
        $this->db->from('master_kk a');
        $this->db->join('user b','b.id=a.create_by','left');
        $this->db->join('user c','c.id=a.update_by','left');
        $this->db->where(['a.id' => $par]);
        $data['cekdata'] = $this->db->get()->result_array();
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
        
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('order/tambahdata', $data);
        $this->load->view('templates/footer');
    }
        
        
     public function simpantambah()
    {
     
       $jumlah = count($this->input->post('nik'));
                $data = array();
                //print_r($jumlah);die();

                for ($i = 0; $i < $jumlah; $i++) {
                    $data = array(
                        'no_kk' => trim($this->input->post('no_kk')), //parent id di table da_kk mengambil id di master_kk
                        'parent_id' => trim($this->input->post('parent_id')),
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
                        'create_by' => trim($this->input->post('create_by')),
                        
                    );
                    //echo "<pre>"; print_r($data);die;

                    $this->db->insert('data_kk', $data);
                }
                $this->session->set_flashdata('msgtambah', '<div class="alert alert-warning" role="alert">Data berhasil di tambahkan</div>');
                redirect('resultdata/cekdata/' . $data['parent_id']);
    }
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
