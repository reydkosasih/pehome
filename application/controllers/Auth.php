<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_controller
{
    public function __construct()
    {
        #untuk validasi form aktif
        parent::__construct();
        if ($this->session->userdata('username') === false) {
            redirect('auth');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        #biar ga asal logout
        if ($this->session->userdata('username')) {
            redirect('user/idlepage');
        }

        #halaman login utama
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login - Document Control FSI';

            $this->load->view('auth/auth-header', $data);
            $this->load->view('auth/login-page', $data);
            $this->load->view('auth/auth-footer', $data);
        } else {
            $this->_saveLogin();
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
        // $user = $this->db->get_where('tbl_user', ['password' => $password])->row_array();

        if ($user) {
            # user ada
            if ($user['is_active'] == 1) {
                # akun sudah aktif cek password
                if (password_verify($password, $user['password'])) {
                    # pass benar
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        # Admin Super login
                        $_SESSION['success_login'] = "Login Berhasil. Selamat Datang!";
                        redirect('admin/dashboard');
                    } elseif ($user['role_id'] == 2) {
                        # Admin Login
                        redirect('home/home_page');
                    } elseif ($user['role_id'] == 3) {
                        # Signage Login
                        redirect('admin/dashboard');
                    } elseif ($user['role_id'] == 4) {
                        # User Login
                        redirect('forms/choose_create_icr');
                    } else {
                        # Access Blocked
                        echo "Access Blocked!";
                    }
                } else {
                    # salah password
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login failed! Wrong password! </div>');
                    redirect('auth');
                }
            } else {
                # akun belum aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login failed! Account is not activated. Please confirm administrator to activate. </div>');
                redirect('auth');
            }
        } else {
            # user ga terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login failed! Account not available. Please check again your information. </div>');
            redirect('auth');
        }
    }

    private function _saveLogin()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db->trans_begin();
        $simpan = [
            'username' => $this->input->post('username', true),
            'waktu_login' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('user_history', $simpan);
        $this->db->trans_complete();
    }

    public function register()
    {
        $this->load->model('auth_model');
        #biar ga asal logout
        if ($this->session->userdata('username')) {
            redirect('user/idlepage');
        }

        #registrasi user
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', [
            'required' => 'Lengkapi data Nama Depan terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim', [
            'required' => 'Lengkapi data Nama Belakang terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Lengkapi data Email terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]', [
            'required' => 'Lengkapi data Username terlebih dahulu!',
            'is_unique' => 'Username ini sudah pernah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama! Ulangi kembali.',
            'min_length' => 'Minimal password 6 karakter.'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');
        $data['listdept'] = $this->auth_model->list_dept();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration - Document Control FSI';
            $this->load->view('auth/auth-header', $data);
            $this->load->view('auth/register-page', $data);
            $this->load->view('auth/auth-footer', $data);
        } else {
            $data = [
                'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
                'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_dept' => htmlspecialchars($this->input->post('id_dept', true)),
                'nama_dept' => htmlspecialchars($this->input->post('nama_dept', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => 4,
                'is_active' => 0,
                'date_created' => date('Y-m-d')
            ];

            $this->db->insert('tbl_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Account has successfully created! Please confirm administrator to activate. </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        #logout sesi user
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Access Blocked';
        $this->load->view('auth/blocked', $data);
    }

    function komentarApp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db->trans_start();

        $komen = [
            'tgl_komen' => $this->input->post('tgl_komen', true),
            'nama_pic' => $this->input->post('nama_pic', true),
            'catatanapp' => $this->input->post('catatanapp', true),
            'waktu_komen' => date('H:i:s')
        ];
        $this->db->insert('tbl_komentar', $komen);

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->session->set_flashdata('error_komentar', 'Gagal menyimpan komentar.');
            redirect('auth');
        } else {
            $this->session->set_flashdata('success_komentar', 'Terimakasih! Komentar berhasil disimpan.');
            redirect('auth');
        }
    }

    public function forgotPass()
    {
        $this->load->model('chats_model');

        $data['title'] = 'Forgot Password - Mold Control';
        $data['userlist'] = $this->chats_model->listUsername();
        $this->load->view('auth/auth-header', $data);
        $this->load->view('auth/forgot_pass', $data);
        $this->load->view('auth/auth-footer', $data);
    }

    function proses_forgotPass()
    {
        $this->db->trans_start();

        $update = [
            'id' => $this->input->post('id', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'is_active' => 0
        ];
        $this->db->update('tbl_user', $update, array('id' => $update['id']));
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->session->set_flashdata('error_change', 'Gagal melakukan update.');
            redirect('auth/forgotPass');
        } else {
            $this->session->set_flashdata('success_change', 'Password berhasil diubah! Silahkan konfirmasi pada Administrator untuk aktivasi akun kembali.');
            redirect('auth');
        }
    }

    function get_dept()
    {
        $this->load->model('auth_model');

        $id_dept = $this->input->post('id_dept');
        $data = $this->auth_model->fetch_dept($id_dept);
        echo json_encode($data);
    }
}
