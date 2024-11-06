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
        $data['users'] = $this->UserModel->getAllUsers();
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
            'vlan_id' => $this->input->post('vlan_id'),
            'oid' => $this->input->post('oid'),              
            'snmp_community' => $this->input->post('snmp_community')
        );
        
        $this->SiteModel->saveSite($data);
        redirect('site');
    }

    // Menampilkan form edit site
    public function edit($id) {
        $data['site'] = $this->SiteModel->getSiteById($id);
        $data['users'] = $this->UserModel->getAllUsers();
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

    // Menampilkan halaman konfigurasi
    public function config_mrtg($id) {
        $site = $this->SiteModel->get_site_by_id($id);

        if (!$site) {
            $this->session->set_flashdata('error', 'Site not found.');
            redirect('site');
            return;
        }

        $data['site'] = $site;
        $this->load->view('templates/header');
        $this->load->view('site/config_mrtg', $data);
        $this->load->view('templates/footer');
    }

    // Generate atau save konfigurasi MRTG
    public function generate_config($id) {
        // Ambil data site berdasarkan ID
        $site = $this->SiteModel->get_site_by_id($id);

        if (!$site) {
            $this->session->set_flashdata('error', 'Site not found.');
            redirect('site');
            return;
        }

        // Ambil detail konfigurasi
        $username = $site['username'];
        $role_id = $site['role_id'];
        $oid = $site['oid'];
        $snmp_community = $site['snmp_community'];
        $ip_address = $site['ip_address'];
        $graph = $site['graph'];

        // Validasi data yang diperlukan
        if (empty($oid) || empty($snmp_community) || empty($ip_address)) {
            $this->session->set_flashdata('error', 'OID, SNMP Community, and IP Address are required.');
            redirect('site/config_mrtg/' . $id);
            return;
        }

        // Tentukan direktori penyimpanan file konfigurasi berdasarkan role
        $directory = '';
        if ($role_id == 3) { // Reseller
            $directory = '/etc/site/reseller';
        } elseif ($role_id == 2) { // POP
            $directory = '/etc/site/pop';
        } else {
            $this->session->set_flashdata('error', 'Invalid role for configuration.');
            redirect('site');
            return;
        }

        // Konten file konfigurasi MRTG
        $config_content = "EnableIPv6: no\n";
        $config_content .= "WorkDir: /var/www/html{$graph}\n";
        $config_content .= "Options[_]: growright,bits,transparent,nobanner,nolegend\n";
        $config_content .= "Refresh: 300\n";
        $config_content .= "Interval: 5\n";
        $config_content .= "###############\n";
        $config_content .= "Target[{$username}]: {$oid}:{$snmp_community}@{$ip_address}\n";
        $config_content .= "MaxBytes[{$username}]: 100000000000\n";
        $config_content .= "Title[{$username}]: {$username}\n";
        $config_content .= "PageTop[{$username}]: <H1>{$username}</H1>\n";
        $config_content .= "######\n";

        // Tentukan path file konfigurasi
        $file_path = "{$directory}/{$username}.cfg";
        $command = "echo " . escapeshellarg($config_content) . " | sudo tee {$file_path} > /dev/null";
        $output = shell_exec($command);

        // Cek apakah file berhasil dibuat
        if (file_exists($file_path)) {
            $this->session->set_flashdata('success', 'Configuration file created successfully.');
        } else {
            error_log("Failed to create configuration file: " . $output);
            $this->session->set_flashdata('error', 'Failed to create configuration file.');
        }

        // Kembali ke halaman konfigurasi dengan pesan flashdata
        redirect('site/config_mrtg/' . $id);
    }
    public function create_folder($id) {
        // Ambil data site berdasarkan ID
        $site = $this->SiteModel->get_site_by_id($id);

        if (!$site) {
            $this->session->set_flashdata('error', 'Site not found.');
            redirect('site/config_mrtg/' . $id);
            return;
        }

        // Tentukan direktori berdasarkan role
        $role_id = $site['role_id'];
        $username = $site['username'];
        $folder_path = "";

        if ($role_id == 3) { // Reseller
            $folder_path = "/var/www/html/reseller/{$username}";
        } elseif ($role_id == 2) { // POP
            $folder_path = "/var/www/html/pop/{$username}";
        } else {
            $this->session->set_flashdata('error', 'Invalid role for creating folder.');
            redirect('site/config_mrtg/' . $id);
            return;
        }

        // Buat folder dengan `mkdir` dan `sudo` tanpa meminta password
        $command = "echo '' | sudo -S mkdir -p " . escapeshellarg($folder_path);
        $output = shell_exec($command);

        // Cek apakah folder berhasil dibuat
        if (is_dir($folder_path)) {
            $this->session->set_flashdata('success', 'Folder created successfully.');
        } else {
            error_log("Failed to create folder: " . $output);
            $this->session->set_flashdata('error', 'Failed to create folder.');
        }

        // Kembali ke halaman konfigurasi dengan pesan flashdata
        redirect('site/config_mrtg/' . $id);
    }
    public function generate_index($id) {
        // Ambil data site berdasarkan ID
        $site = $this->SiteModel->get_site_by_id($id);

        if (!$site) {
            $this->session->set_flashdata('error', 'Site not found.');
            redirect('site/config_mrtg/' . $id);
            return;
        }

        // Tentukan direktori output dan path file konfigurasi
        $username = $site['username'];
        $role_id = $site['role_id'];
        $config_path = "";
        $output_directory = "";

        // Sesuaikan config_path dan output_directory berdasarkan role
        if ($role_id == 3) { // Reseller
            $config_path = "/etc/site/reseller/{$username}.cfg";
            $output_directory = "/var/www/html/reseller/{$username}";
        } elseif ($role_id == 2) { // POP
            $config_path = "/etc/site/pop/{$username}.cfg";
            $output_directory = "/var/www/html/pop/{$username}";
        } else {
            $this->session->set_flashdata('error', 'Invalid role for index generation.');
            redirect('site/config_mrtg/' . $id);
            return;
        }

        // Pastikan direktori output sudah ada
        if (!is_dir($output_directory)) {
            mkdir($output_directory, 0755, true);
        }

        // Perintah untuk menjalankan indexmaker dan menyimpan output ke index.html
        $command = "sudo /usr/bin/indexmaker " . escapeshellarg($config_path) . " > " . escapeshellarg("{$output_directory}/index.html") . " 2>&1";
        $output = shell_exec($command);

        // Debugging output
        error_log("IndexMaker command output: " . $output);

        // Cek apakah file index.html berhasil dibuat
        if (file_exists("{$output_directory}/index.html")) {
            $this->session->set_flashdata('success', 'Index file created successfully.');
        } else {
            error_log("Failed to create index file: " . $output);
            $this->session->set_flashdata('error', 'Failed to create index file.');
        }

        // Kembali ke halaman konfigurasi dengan pesan flashdata
        redirect('site/config_mrtg/' . $id);
    }
public function run_mrtg($id) {
    // Ambil data site berdasarkan ID
    $site = $this->SiteModel->get_site_by_id($id);

    if (!$site) {
        $this->session->set_flashdata('error', 'Site not found.');
        redirect('site/config_mrtg/' . $id);
        return;
    }

    $username = $site['username'];
    $role_id = $site['role_id'];
    $config_path = "";
    $log_path = "";

    // Tentukan path file konfigurasi dan log berdasarkan role
    if ($role_id == 3) { // Reseller
        $config_path = "/etc/site/reseller/{$username}.cfg";
        $log_path = "/var/log/reseller/{$username}.log";
    } elseif ($role_id == 2) { // POP
        $config_path = "/etc/site/pop/{$username}.cfg";
        $log_path = "/var/log/pop/{$username}.log";
    } else {
        $this->session->set_flashdata('error', 'Invalid role for running MRTG.');
        redirect('site/config_mrtg/' . $id);
        return;
    }

    // Pastikan direktori log ada
    $log_directory = dirname($log_path);
    if (!is_dir($log_directory)) {
        mkdir($log_directory, 0755, true);
    }

    // Perintah untuk menjalankan MRTG sebagai root
    $command = "sudo -u root env LANG=C mrtg " . escapeshellarg($config_path) . " --logging " . escapeshellarg($log_path) . " 2>&1";
    $output = shell_exec($command);

    // Cek apakah MRTG berhasil dijalankan dan tampilkan pesan
    if (strpos($output, "ERROR") === false) {
        $this->session->set_flashdata('success', 'MRTG ran successfully.');
    } else {
        error_log("Failed to run MRTG: " . $output);
        $this->session->set_flashdata('error', 'Failed to run MRTG. Check server logs for details.');
    }

    // Kembali ke halaman konfigurasi dengan pesan flashdata
    redirect('site/config_mrtg/' . $id);
}


}
