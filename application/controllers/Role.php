<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RoleModel');
    }

    // Menampilkan semua role
    public function index() {
        $data['roles'] = $this->RoleModel->getAllRoles();
        $this->load->view('list_roles', $data);
    }

    // Menampilkan form create role
    public function create() {
        $this->load->view('create_role');
    }

    // Menyimpan role baru
    public function save() {
        $data = array(
            'role_name' => $this->input->post('role_name')
        );
        $this->RoleModel->saveRole($data);
        redirect('Role/index');
    }

    // Menampilkan form edit role
    public function edit($id) {
        $data['role'] = $this->RoleModel->getRoleById($id);
        $this->load->view('edit_role', $data);
    }

    // Memperbarui data role
    public function update($id) {
        $data = array(
            'role_name' => $this->input->post('role_name')
        );
        $this->RoleModel->updateRole($id, $data);
        redirect('Role/index');
    }

    // Menghapus data role
    public function delete($id) {
        $this->RoleModel->deleteRole($id);
        redirect('Role/index');
    }
}
