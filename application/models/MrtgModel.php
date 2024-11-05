<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MrtgModel extends CI_Model {

    public function addCronJob($configName) {
        $cronCommand = "*/1 * * * * env LANG=C mrtg /etc/site/{$configName}.cfg --logging /var/log/{$configName}.log";
        $cronFile = "/etc/cron.d/{$configName}_mrtg";

        // Menulis perintah cron ke file
        file_put_contents($cronFile, $cronCommand.PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}
