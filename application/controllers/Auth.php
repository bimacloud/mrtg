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

            if ($user['role_id'] == 1) { // Jika admin
                // Redirect ke dashboard tanpa verifikasi
                redirect('dashboard');
            } else {
                // Jika tidak ada chat_id, redirect ke halaman pengaturan Telegram
                if (empty($user['chat_id'])) {
                    redirect('auth/setupTelegram');
                } else {
                    // Generate a verification code
                    $verification_code = rand(100000, 999999); // Kode 6 digit
                    $this->session->set_userdata('verification_code', $verification_code); // Simpan kode verifikasi di sesi

                    // Kirim kode verifikasi ke Telegram
                    $chat_id = $user['chat_id'];
                    $this->UserModel->sendVerificationCode($chat_id, $verification_code);

                    // Redirect ke halaman verifikasi
                    redirect('auth/verify');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth/login');
        }
    }

    // Halaman pengaturan Telegram
    public function setupTelegram() {
        $this->load->view('setup_telegram'); // Buat file 'setup_telegram.php' di views
    }

    // Proses pengaturan Telegram
    public function saveTelegram() {
        $chat_id = $this->input->post('chat_id'); // Nomor Telegram yang dimasukkan
        $user_id = $this->session->userdata('user_id');

        // Update chat_id di database
        $this->UserModel->updateTelegram($user_id, $chat_id);

        // Generate a verification code
        $verification_code = rand(100000, 999999); // Kode 6 digit
        $this->session->set_userdata('verification_code', $verification_code); // Simpan kode verifikasi di sesi

        // Kirim kode verifikasi ke Telegram
        $this->UserModel->sendVerificationCode($chat_id, $verification_code);

        // Redirect ke halaman verifikasi
        redirect('auth/verify');
    }

    // Tampilkan halaman verifikasi
    public function verify() {
        $this->load->view('verify'); // Buat file 'verify.php' di views
    }

    // Proses verifikasi kode
    public function verifyCode() {
        $input_code = $this->input->post('verification_code');

        if ($input_code == $this->session->userdata('verification_code')) {
            // Kode verifikasi berhasil
            $this->session->unset_userdata('verification_code'); // Hapus kode verifikasi dari sesi
            redirect('dashboard'); // Redirect ke dashboard
        } else {
            $this->session->set_flashdata('error', 'Invalid verification code');
            redirect('auth/verify');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
