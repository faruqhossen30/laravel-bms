<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class AutoBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Backup Generated!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /// Database configuration
        $host = env('DB_HOST', 'localhost');
        $username = env('DB_USERNAME', 'root');
        $password = env('DB_PASSWORD', '');
        $database_name = env('DB_DATABASE', 'bet');
        // Get connection object and set the charset
        $conn = mysqli_connect($host, $username, $password, $database_name);
        $conn->set_charset("utf8");
        // Get All Table Names From the Database
        $tables = array();
        $sql = "SHOW TABLES";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        $sqlScript = "";

        foreach ($tables as $table) {
            // Prepare SQLscript for creating table structure
            $query = "SHOW CREATE TABLE $table";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);
            $sqlScript .= "\n\n" . $row[1] . ";\n\n";
            $query = "SELECT * FROM $table";
            $result = mysqli_query($conn, $query);
            $columnCount = mysqli_num_fields($result);

            // Prepare SQLscript for dumping data for each table
            for ($i = 0; $i < $columnCount; $i ++) {
                while ($row = mysqli_fetch_row($result)) {
                    $sqlScript .= "INSERT INTO $table VALUES(";
                    for ($j = 0; $j < $columnCount; $j ++) {
                        $row[$j] = $row[$j];
                        if (isset($row[$j])) {
                            $sqlScript .= '"' . $row[$j] . '"';
                        } else {
                            $sqlScript .= '""';
                        }
                        if ($j < ($columnCount - 1)) {
                            $sqlScript .= ',';
                         }
                        }
                        $sqlScript .= ");\n";
                    }
                }
                $sqlScript .= "\n";
            }

            if(!empty($sqlScript)){
                // Save the SQL script to a backup file
                $backup_file_name = storage_path('app/public/backups/').$database_name . '_backup_' . date('d_m_y_h_i_A') . '.sql';
                $fileHandler = fopen($backup_file_name, 'w+');
                $number_of_lines = fwrite($fileHandler, $sqlScript);
                fclose($fileHandler);

                // echo $backup_file_name;
            }
        $this->info('Auto Backup Generated!');
    }
}
