<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    // Menampilkan halaman login
    public function login() {
        $this->load->view('login');
    }

    // Proses login
    public function loginProcess() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UserModel->login($username, $password);

        if ($user) {
            // Set sesi pengguna
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('username', $user['username']);
            $this->session->set_userdata('role', $user['role_name']);
            $this->session->set_userdata('role_id', $user['role_id']); // Simpan role_id di sesi

            // Redirect ke dashboard
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth/login');
        }
    }

    // Proses logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
