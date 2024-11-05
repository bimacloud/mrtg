<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MrtgController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RoleModel');
        $this->load->model('UserModel');
        $this->load->model('SiteModel');
    }

    // Menampilkan semua pengguna
    public function listUsers() {
        $data['users'] = $this->UserModel->getAllUsers();
        $this->load->view('list_users', $data);
    }

    // Menampilkan semua site
    public function listSites() {
        $data['sites'] = $this->SiteModel->getAllSites();
        $this->load->view('list_sites', $data);
    }

    // Menyimpan pengguna baru
    public function saveUser() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => $this->input->post('role_id')
        );
        $this->UserModel->saveUser($data);
        redirect('MrtgController/listUsers');
    }

    // Menyimpan konfigurasi site baru
    public function saveSite() {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'layanan_id' => $this->input->post('layanan_id'),
            'graph' => $this->input->post('graph'),
            'ip_address' => $this->input->post('ip_address'),
            'vlan_id' => $this->input->post('vlan_id')
        );
        $this->SiteModel->saveSite($data);
        redirect('MrtgController/listSites');
    }
}
