<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RoleModel'); // Muat RoleModel

        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect ke halaman login jika belum login
        }
    }

    public function index() {
        $role = $this->session->userdata('role'); // Ambil peran pengguna dari sesi
        $role_id = $this->session->userdata('role_id'); // Ambil role_id dari sesi

        // Siapkan data yang sesuai dengan peran
        $data = array(
            'role' => $role,
            'username' => $this->session->userdata('username'), // Ambil username dari session
            'allowed_menus' => $this->RoleModel->getRoleAccess($role_id) // Ambil akses menu
        );

        // Tampilkan halaman dashboard dengan header dan footer
        $this->load->view('templates/header', $data);  // Kirimkan data ke header
        $this->load->view('dashboard', $data);  // Tampilkan dashboard
        $this->load->view('templates/footer');
    }
}
