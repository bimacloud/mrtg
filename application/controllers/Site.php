<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SiteModel');
        $this->load->model('UserModel'); // Untuk mengambil data user
    }

    // Menampilkan semua site
    public function index() {
        $data['sites'] = $this->SiteModel->getAllSites();
        $this->load->view('templates/header', $data);
        $this->load->view('list_sites', $data);
        $this->load->view('templates/footer');
    }

    // Menampilkan form create site
    public function create() {
        $data['users'] = $this->UserModel->getAllUsers(); // Mendapatkan daftar user
        $this->load->view('templates/header');
        $this->load->view('create_site', $data);
        $this->load->view('templates/footer');
    }

    // Menyimpan site baru
    public function save() {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'layanan_id' => $this->input->post('layanan_id'),
            'graph' => $this->input->post('graph'),
            'ip_address' => $this->input->post('ip_address'),
            'vlan_id' => $this->input->post('vlan_id')
        );
        $this->SiteModel->saveSite($data);
        redirect('site');
    }

    // Menampilkan form edit site
    public function edit($id) {
        $data['site'] = $this->SiteModel->getSiteById($id);
        $data['users'] = $this->UserModel->getAllUsers(); // Mendapatkan daftar user
        $this->load->view('templates/header');
        $this->load->view('edit_site', $data);
        $this->load->view('templates/footer');
    }

    // Memperbarui data site
    public function update($id) {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'layanan_id' => $this->input->post('layanan_id'),
            'graph' => $this->input->post('graph'),
            'ip_address' => $this->input->post('ip_address'),
            'vlan_id' => $this->input->post('vlan_id')
        );
        $this->SiteModel->updateSite($id, $data);
        redirect('site');
    }

    // Menghapus site
    public function delete($id) {
        $this->SiteModel->deleteSite($id);
        redirect('site');
    }

    public function config($id) {
    // Ambil data site berdasarkan ID dari model
    $data['site'] = $this->SiteModel->get_site_by_id($id);

    // Tampilkan halaman konfigurasi
    $this->load->view('templates/header');
    $this->load->view('site/config_mrtg', $data);
    $this->load->view('templates/footer');
}


      public function save_config($id) {
        $site = $this->SiteModel->get_site_by_id($id);
        $username = $site['username'];
        $role_id = $site['role_id']; // Dapatkan role_id dari tabel user

        // Tentukan direktori berdasarkan role_id
        if ($role_id == 3) { // Reseller
            $directory = '/etc/site/reseller';
        } elseif ($role_id == 2) { // User (POP)
            $directory = '/etc/site/pop';
        } else {
            $this->session->set_flashdata('error', 'Invalid role for configuration.');
            redirect('site');
            return;
        }

        // Pastikan direktori ada atau buat jika belum ada
        if (!is_dir($directory)) {
            if (!mkdir($directory, 0755, true)) {
                $this->session->set_flashdata('error', 'Failed to create directory.');
                redirect('site');
                return;
            }
        }

        $config_content = "EnableIPv6: no\n";
        $config_content .= "WorkDir: /var/www/html/{$role}/{$username}\n";
        $config_content .= "Options[_]: growright,bits,transparent,nobanner,nolegend\n";
        $config_content .= "Refresh: 300\n";
        $config_content .= "Interval: 5\n";
        $config_content .= "###############\n";
        $config_content .= "Target[{$username}]: {$oid}:{$snmp_community}@{$ip_address}\n";
        $config_content .= "MaxBytes[{$username}]: 100000000000\n";
        $config_content .= "Title[{$username}]: {$username}\n";
        $config_content .= "PageTop[{$username}]: <H1>{$username}</H1>\n";
        $config_content .= "######\n";

        $file_path = "{$directory}/{$username}.cfg";

        // Tulis ke file konfigurasi
        if (file_put_contents($file_path, $config_content) === false) {
            $this->session->set_flashdata('error', 'Failed to create configuration file.');
        } else {
            $this->session->set_flashdata('success', 'Configuration file created successfully.');
        }

        redirect('site');
    }

}
