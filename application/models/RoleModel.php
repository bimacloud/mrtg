<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends CI_Model {

    // Mengambil semua role
    public function getAllRoles() {
        return $this->db->get('role')->result_array();
    }

    // Mengambil satu role berdasarkan ID
    public function getRoleById($id) {
        return $this->db->get_where('role', array('id' => $id))->row_array();
    }

    // Menyimpan role baru
    public function saveRole($data) {
        return $this->db->insert('role', $data);
    }

    // Memperbarui data role
    public function updateRole($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('role', $data);
    }

    // Menghapus role
    public function deleteRole($id) {
        $this->db->where('id', $id);
        return $this->db->delete('role');
    }
}
