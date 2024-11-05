<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function getAllUsers() {
        $this->db->select('user.*, role.role_name');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.id');
        return $this->db->get()->result_array();
    }

    public function getUserById($id) {
        return $this->db->get_where('user', array('id' => $id))->row_array();
    }

    public function saveUser($data) {
        return $this->db->insert('user', $data);
    }

    public function updateUser($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    // Fungsi login
    public function login($username, $password) {
        $this->db->select('user.*, role.role_name');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.id');
        $this->db->where('username', $username);
        $user = $this->db->get()->row_array();

        // Cek apakah pengguna ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
