<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $role = $this->session->userdata('role'); // Ambil peran pengguna dari sesi

        // Siapkan data yang sesuai dengan peran
        $data = array(
            'role' => $role,
            'username' => $this->session->userdata('username') // Ambil username dari session
        );

        // Tampilkan halaman dashboard dengan header dan footer
        $this->load->view('templates/header', $data);  // Kirimkan data ke header
        $this->load->view('dashboard', $data);  // Tampilkan dashboard
        $this->load->view('templates/footer');
    }
}
