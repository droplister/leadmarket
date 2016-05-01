<?php

namespace App\Console\Commands;

use Curl\Curl;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class AuditMySQL extends Command
{
    public function __construct()
    {
        parent::__construct();

        $this->curl = new Curl();
        $this->curl->setHeader('X-Username', 'dan@droplister.com');
        $this->curl->setHeader('X-Api-Key', 'Hh8egXtMjWJAHcQsxSSI7n0VTLS8YDGaIxOM5TCuQeg=');
        $this->curl->setHeader('Content-Type', 'application/json');
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'audit:mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and Backup MySQL Log File';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $handle = popen('/usr/bin/mysqlbinlog /var/log/mysql/mysql-bin.000001', 'r');

        if ($handle) {

            while (($data = fgets($handle, 4096)) !== false) {

                if ($this->guardAgainstComments($data)) continue;

                if ($this->guardAgainstSettingStuff($data)) continue;

                if ($this->guardAgainstRollback($data)) continue;

                if ($this->guardAgainstUse($data)) continue;

                if ($this->guardAgainstBegin($data)) continue;

                if ($this->guardAgainstCommit($data)) continue;

                $sql = array(
                    'datastoreId' => '592',
                    'sql' => $data,
                );

                $request = json_encode($sql);

                $this->curl->post('https://api.tierion.com/v1/records', $request);
            }

            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }

            fclose($handle);
        }

        $this->comment('END');
    }

    private function guardAgainstComments($data)
    {
        $first = substr($data, 0, 1);
        if ( $first == '#' || $first == '/' ) return true;
        return false;
    }

    private function guardAgainstSettingStuff($data)
    {
        $first = substr($data, 0, 3);
        if ( $first == 'SET' ) return true;
        return false;
    }

    private function guardAgainstRollback($data)
    {
        $first = substr($data, 0, 8);
        if ( $first == 'ROLLBACK' ) return true;
        return false;
    }

    private function guardAgainstUse($data)
    {
        $first = substr($data, 0, 3);
        if ( $first == 'USE' ) return true;
        return false;
    }

    private function guardAgainstBegin($data)
    {
        $first = substr($data, 0, 5);
        if ( $first == 'BEGIN' ) return true;
        return false;
    }

    private function guardAgainstCommit($data)
    {
        $first = substr($data, 0, 6);
        if ( $first == 'COMMIT' ) return true;
        return false;
    }

    private function isBeginning($data)
    {
        if ( trim($data) == 'BEGIN' ) return true;
        return false;
    }
}
