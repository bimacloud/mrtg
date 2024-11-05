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
        $this->db->select('site.*, user.role_id, user.username'); // Ambil kolom role_id dan username dari tabel user
        $this->db->from('site');
        $this->db->join('user', 'site.user_id = user.id', 'left'); // Join dengan tabel user
        $this->db->where('site.id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }


}
