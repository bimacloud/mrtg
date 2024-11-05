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
}
