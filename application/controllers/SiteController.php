<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MrtgModel'); // Memuat model jika diperlukan
    }

    // Fungsi untuk menjalankan MRTG
    public function generateMrtg($configName = null) {
        if ($configName === null) {
            show_error('Config name is required');
        }

        $configPath = "/etc/site/{$configName}.cfg";
        $outputPath = "/var/www/html/site/{$configName}/index.html";
        $logPath = "/var/log/{$configName}.log";

        if (file_exists($configPath)) {
            shell_exec("indexmaker $configPath > $outputPath");
            shell_exec("env LANG=C mrtg $configPath --logging $logPath");

            $this->MrtgModel->addCronJob($configName);

            echo "MRTG untuk {$configName} berhasil di-generate.";
        } else {
            show_error("File konfigurasi tidak ditemukan!");
        }
    }

    // Fungsi untuk melihat hasil MRTG
    public function viewMrtg($configName = null) {
        if ($configName === null) {
            show_error('Config name is required');
        }

        $data['configName'] = $configName;
        $data['outputPath'] = base_url("site/{$configName}/index.html");
        $this->load->view('mrtg_view', $data);
    }
}
