<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {

            // jika usernya aktif
            if ($user['is_active'] == 1) {


                // jika user sudah login
                if ($user['is_login'] == 0) {

                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                        ];
                        $this->session->set_userdata($data);
                        $session = $this->session->userdata('email');
                        $data2 = [
                            'is_login' => 1,
                            'session' => $session,
                            'time_login' => date('Y-m-d H:i:s'),
                        ];


                        $this->db->where('id', $user['id']);
                        $this->db->update('user', $data2);
                        if ($user['role_id'] == 0) {
                            redirect('verifikasi/?id=' . $user['id'] . '&register_as=' . $user['register_as']);
                        } else {
                            redirect('information/information');
                        }
                    } else {

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                        redirect('auth');
                    }
                } else {
                    if (!($this->session->userdata("email")) and $user['is_login'] == 1) {
                        //$query = "UPDATE tbl_name SET isLogout = 'Yes' WHERE email = '$email'";
                        $this->db->set('is_login', 0);
                        $this->db->where('email', $email);
                        $this->db->update('user');
                        //$this->session->sess_destroy();
                        //$data33=$this->session->userdata('email');
                        //var_dump($data33);die;
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Last Session Destroyed - Relogin</div>');
                        redirect('auth');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">has been logged in</div>');
                        redirect('auth');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

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
        $this->form_validation->set_rules('register_as', 'register_as', 'required|trim');
        // $this->form_validation->set_rules('alamatktp', 'alamatktp', 'required|trim');
        // $this->form_validation->set_rules('alamatkantor', 'alamatkantor', 'required|trim');
        // $this->form_validation->set_rules('alamatusaha', 'alamatusaha', 'required|trim');
        // $this->form_validation->set_rules('notelpusaha', 'notelpusaha', 'required|trim');
        // $this->form_validation->set_rules('norek', 'norek', 'required|trim');
        // $this->form_validation->set_rules('badanhukum', 'badanhukum', 'required|trim');
       

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Mitra';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => $this->input->post('name', true),
                'email' => htmlspecialchars($email),
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
                'register_as' => $this->input->post('register_as', true),
                'role_id' => '0',
                // 'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            
            

            // siapkan token
            $token = $data['email'];
            $user_token = [
                'email' => $email,
                'token' => $token,
                
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('auth');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.hostinger.com',
            'smtp_user' => 'damas.firmansyah@sobatexpress.co.id',
            'smtp_pass' => '12Januari',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('damas.firmansyah@sobatexpress.co.id', 'Verification akun sobat');
        $this->email->to($this->input->post('email'));
        $this->load->library('email');
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . $token . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (61000000000)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function logout()
    {   
        $data1 = [
        'email' => $this->session->userdata('email'),
        ];
        $data2 = [ 
        'is_login'=>0,
        
        
        ];
        $this->db->where('email',$data1['email']);
        $this->db->update('user', $data2);
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
