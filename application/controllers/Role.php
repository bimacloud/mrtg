<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RoleModel');
        
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect ke halaman login jika belum login
        }
    }

    // Menampilkan semua role
    public function index() {
        $data['roles'] = $this->RoleModel->getAllRoles();
        $this->load->view('templates/header');
        $this->load->view('list_roles', $data);
        $this->load->view('templates/footer');
    }

    // Menampilkan form create role
    public function create() {
        $this->load->view('templates/header');
        $this->load->view('create_role');
        $this->load->view('templates/footer');
    }

    // Menyimpan role baru
    public function save() {
        $data = array(
            'role_name' => $this->input->post('role_name')
        );
        $this->RoleModel->saveRole($data);
        $this->session->set_flashdata('success', 'Role created successfully.');
        redirect('role/index');
    }

    // Menampilkan form edit role
    public function edit($id) {
        $data['role'] = $this->RoleModel->getRoleById($id);
        $this->load->view('templates/header');
        $this->load->view('edit_role', $data);
        $this->load->view('templates/footer');
    }

    // Memperbarui data role
    public function update($id) {
        $data = array(
            'role_name' => $this->input->post('role_name')
        );
        $this->RoleModel->updateRole($id, $data);
        $this->session->set_flashdata('success', 'Role updated successfully.');
        redirect('role/index');
    }

    // Menghapus data role
    public function delete($id) {
        $this->RoleModel->deleteRole($id);
        $this->session->set_flashdata('success', 'Role deleted successfully.');
        redirect('role/index');
    }

    // Menampilkan akses menu untuk role
    public function access($role_id) {
        $data['role'] = $this->RoleModel->getRoleById($role_id);
        $data['menus'] = ['Dashboard', 'Site', 'Graph', 'User', 'Role']; // Daftar menu yang ada
        $data['access'] = $this->RoleModel->getRoleAccess($role_id); // Ambil akses menu untuk role ini

        $this->load->view('templates/header');
        $this->load->view('role/access', $data); // Buat view baru untuk mengelola akses
        $this->load->view('templates/footer');
    }

    // Menyimpan akses menu untuk role
    public function save_access($role_id) {
        $this->db->delete('role_access_menus', ['role_id' => $role_id]); // Hapus akses lama

        $access = $this->input->post('access'); // Ambil akses dari form

        if ($access) {
            foreach ($access as $menu => $value) {
                $this->RoleModel->addRoleAccess($role_id, $menu);
            }
            $this->session->set_flashdata('success', 'Access saved successfully!');
        } else {
            $this->session->set_flashdata('error', 'No access selected.');
        }

        redirect('role/index'); // Redirect kembali ke daftar role
    }
}
