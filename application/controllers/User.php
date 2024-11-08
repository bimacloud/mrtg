<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('RoleModel');

           // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect ke halaman login jika belum login
        }
    }

    // Menampilkan semua pengguna
    public function index() {
        $data['users'] = $this->UserModel->getAllUsers();
        $this->load->view('templates/header');
        $this->load->view('list_users', $data);
        $this->load->view('templates/footer');
    }

    // Menampilkan form create user
    public function create() {
        $data['roles'] = $this->RoleModel->getAllRoles();
        $this->load->view('templates/header');
        $this->load->view('create_user', $data);
        $this->load->view('templates/footer');
    }

    // Menyimpan pengguna baru
    public function save() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => $this->input->post('role_id')
        );
        $this->UserModel->saveUser($data);
        redirect('User/index');
    }

    // Menampilkan form edit user
    public function edit($id) {
        $data['user'] = $this->UserModel->getUserById($id);
        $data['roles'] = $this->RoleModel->getAllRoles();
        $this->load->view('templates/header');
        $this->load->view('edit_user', $data);
        $this->load->view('templates/footer');
    }

    // Memperbarui data pengguna
    public function update($id) {
        $data = array(
            'username' => $this->input->post('username'),
            'role_id' => $this->input->post('role_id')
        );
        if ($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }
        $this->UserModel->updateUser($id, $data);
        redirect('User/index');
    }

    // Menghapus data pengguna
    public function delete($id) {
        $this->UserModel->deleteUser($id);
        redirect('User/index');
    }
}
