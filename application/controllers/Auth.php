<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }
    public function index()
    {
        if ($this->session->userdata('level') == 'admin') {
            redirect('admin');
        } elseif ($this->session->userdata('level') == 'petugas') {
            redirect('petugas');
        }
        $this->form_validation->set_rules('auth_username', 'Username', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('auth_password', 'Password', 'required|trim|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');
        } else {
            $this->auth();
        }
    }
    public function auth()
    {
        $auth_username = htmlspecialchars($this->input->post('auth_username'));
        $auth_password = htmlspecialchars($this->input->post('auth_password'));
        $user = $this->db->get_where('user', ['auth_username' => $auth_username])->row_array();
        if ($user) {
            if (password_verify($auth_password, $user['auth_password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'auth_username' => $user['auth_username'],
                    'level' => $user['level'],
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 'admin') {
                    redirect('admin/');
                } else if ($user['level'] == 'petugas') {
                    redirect('petugas/');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username Atau Password Salaha !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar !</div>');
            redirect('auth');
        }
    }
    public function ad()
    {
        $this->load->view('403');
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('auth_username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Telah Logout !</div>');
        redirect('auth');
    }
}
