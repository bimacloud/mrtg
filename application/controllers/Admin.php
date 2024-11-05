<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_access('Admin'); // Membatasi akses hanya untuk Admin
    }

    public function dashboard() {
        $this->load->view('admin_dashboard');
    }
}
