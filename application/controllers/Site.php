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


    // Fungsi untuk menyimpan konfigurasi ke file .cfg
    public function save_config($id) {
        // Ambil data site dan role pengguna dari model
        $site = $this->SiteModel->get_site_by_id($id);
        $username = $site['username'];
        $role = $site['role_name']; // Asumsikan 'role_name' disimpan di site data

        // Ambil input dari form
        $oid = $this->input->post('oid');
        $snmp_community = $this->input->post('snmp_community');
        $ip_address = $this->input->post('ip_address');

        // Tentukan direktori penyimpanan berdasarkan role
        if ($role == 'reseller') {
            $directory = '/etc/site/reseller';
        } elseif ($role == 'pop') {
            $directory = '/etc/site/pop';
        } else {
            $this->session->set_flashdata('error', 'Invalid role for configuration.');
            redirect('site');
            return;
        }

        // Pastikan direktori ada atau buat jika belum ada
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        // Buat konten file konfigurasi
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

        // Tentukan path file berdasarkan role dan username
        $file_path = "{$directory}/{$username}.cfg";

        // Tulis ke file konfigurasi
        if (file_put_contents($file_path, $config_content)) {
            $this->session->set_flashdata('success', 'Configuration file created successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to create configuration file.');
        }

        // Redirect kembali ke halaman site
        redirect('site');
    }
}
