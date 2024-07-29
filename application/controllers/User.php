<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My profile';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data2['alldata'] = $this->load->model('Order_model', 'getalldata');
        //$data2['alldata'] = $this->getalldata->getalldata();
        
       //var_dump($data['alldata']);die;
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();

        // $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('user/edit', $data);
        //     $this->load->view('templates/footer');
        // } else {
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
        redirect('user');
    }


    public function listuser()
    {
        $data['title'] = 'User List';
        // $data['user'] = $this->db->select('id , name, email');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('name')])->row_array();
        $data['id'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['userlist'] = $this->load->model('User_model', 'get_user');
        $data['userlist'] = $this->get_user->get_user();
        // $data['result'] = $this->db->get('master_kk')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Add User';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['userlist'] = $this->load->model('User_model', 'get_user');
        $data['userlist'] = $this->get_user->get_user();
        // $data['result'] = $this->db->get('master_kk')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        // $this->form_validation->set_rules('ktp', 'ktp', 'required|trim');
        // $this->form_validation->set_rules('npwp', 'npwp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nohp', 'nohp', 'required|trim');
        $this->form_validation->set_rules('role_id', 'role_id', 'required|trim');
        // $this->form_validation->set_rules('alamatktp', 'alamatktp', 'required|trim');
        // $this->form_validation->set_rules('alamatkantor', 'alamatkantor', 'required|trim');
        // $this->form_validation->set_rules('alamatusaha', 'alamatusaha', 'required|trim');
        // $this->form_validation->set_rules('notelpusaha', 'notelpusaha', 'required|trim');
        // $this->form_validation->set_rules('norek', 'norek', 'required|trim');
        // $this->form_validation->set_rules('badanhukum', 'badanhukum', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'New User';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('user/add');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => $this->input->post('name', true),
                'email' => htmlspecialchars($email),
                'center' => $this->input->post('center', true),
                // 'ktp' => $this->input->post('ktp',true),
                // 'npwp' => $this->input->post('npwp',true),
                // 'nohp' => $this->input->post('nohp',true),
                // 'alamatktp' => $this->input->post('alamatktp',true),
                // 'alamatusaha' => $this->input->post('alamatusaha',true),
                // 'alamatkantor' => $this->input->post('alamatkantor',true),
                // 'badanhukum' => $this->input->post('badanhukum',true),
                // 'norek' => $this->input->post('norek',true),
                // 'notelpusaha' => $this->input->post('notelpu saha',true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => '1',
                'verifikasi' => '1',
                // 'role_id' => 2,
                // 'is_active' => 0,
                'date_created' => time()
            ];



            // // siapkan token
            // $token = $data['email'];
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,



            $this->db->insert('user', $data);
            // $this->db->insert('user_token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('addsukses', '<div class="alert alert-success" role="alert">Congratulation! account has been created</div>');
            redirect('user/listuser');
        }
    }

    public function view($par)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['view'] = $this->db->get_where('user', ['id' => $par])->row_array();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(['user.id' => $par]);
        $data['userlist'] = $this->db->get()->row_array();
        // var_dump($data2);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer');
    }
    
    
    public function alreadylogin()
    {
       $data = [
                'is_login' => $this->input->post('is_login'),
               ];
               
       $sql = $this->db->query("SELECT email FROM user where email='{$data['is_login']}'"); //cek user email ada atau tidak
       $cek_user = $sql->num_rows();
       //var_dump($cek_user);die;
       if ($cek_user > 0) {
           $this->db->set('is_login', 0);
           $this->db->where('email',$data['is_login']);
           $this->db->update('user');
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">User status login update');
            redirect(site_url('user/listuser'));      
            } else {
       
       $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">user email salah');
       redirect(site_url('user/listuser'));
       }
               
    }
}
