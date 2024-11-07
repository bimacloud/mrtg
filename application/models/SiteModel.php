<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database telah di-load
    }

    public function getAllSites() {
        $this->db->select('site.*, user.username'); // Ganti 'users' menjadi 'user'
        $this->db->from('site');
        $this->db->join('user', 'site.user_id = user.id', 'left'); // Ganti 'users' menjadi 'user'
        return $this->db->get()->result_array();
    }

    public function getSiteById($id) {
        $this->db->select('site.*, user.role_id, user.username'); // Ganti 'users' menjadi 'user'
        $this->db->from('site');
        $this->db->join('user', 'site.user_id = user.id', 'left'); // Ganti 'users' menjadi 'user'
        $this->db->where('site.id', $id);
        return $this->db->get()->row_array();
    }

    public function saveSite($data) {
        return $this->db->insert('site', $data);
    }

    public function updateSite($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('site', $data);
    }

    public function deleteSite($id) {
        $this->db->where('id', $id);
        return $this->db->delete('site');
    }

    public function getSitesByUserId($user_id) {
        $this->db->select('site.*, user.username'); // Ganti 'users' menjadi 'user'
        $this->db->from('site');
        $this->db->join('user', 'site.user_id = user.id', 'left'); // Ganti 'users' menjadi 'user'
        $this->db->where('site.user_id', $user_id);
        return $this->db->get()->result_array();
    }
}
