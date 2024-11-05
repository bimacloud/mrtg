<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteModel extends CI_Model {

     public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database telah di-load
    }

    public function getAllSites() {
        $this->db->select('site.*, user.username');
        $this->db->from('site');
        $this->db->join('user', 'site.user_id = user.id'); // Bergabung dengan tabel user
        return $this->db->get()->result_array();
    }

    public function getSiteById($id) {
        return $this->db->get_where('site', array('id' => $id))->row_array();
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
    public function get_site_by_id($id) {
    // Ambil semua data dari tabel site berdasarkan ID
        $query = $this->db->get_where('site', array('id' => $id));
        return $query->row_array();
    }

}
