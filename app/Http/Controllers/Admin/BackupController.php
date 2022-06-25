<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BackupController extends Controller
{
    
    //Index
    public function index()
    {
        $dir = storage_path('app/public/backups'); 
        $files = array_diff(scandir($dir), array('.', '..'));
        return view('admin.backup', compact('files'));
    }

    //Generate Backup
    public function generate_backup()
    {
        /// Database configuration
        $host = env('DB_HOST', 'localhost');
        $username = env('DB_USERNAME', 'root');
        $password = env('DB_PASSWORD', '');
        $database_name = env('DB_DATABASE', '2winbd');
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
                $dir = storage_path('app/public/backups/');
                $backup_file_name = $dir.$database_name . '_backup_' . date('d_m_y_h_i_A') . '.sql';
                $fileHandler = fopen($backup_file_name, 'w+');
                $number_of_lines = fwrite($fileHandler, $sqlScript);
                fclose($fileHandler);
            }

       return redirect('tib-admin/backup')
       ->with('success', 'Backup Generate Successfully!');
    }

    //Delete Backup
    public function delete_backup($file_name)
    {   
        $dir = storage_path('app/public/backups/');
        $backup_file_name = $dir.$file_name;
        if (file_exists($backup_file_name)) {
            unlink($dir.$file_name);
        }
        return redirect('tib-admin/backup')
        ->with('success', 'Backup Delete Successfully!');
    }

    //Downlod Backup
    public function download_backup($file_name)
    {   
        $dir = storage_path('app/public/backups/');
        $backup_file_name = $dir.$file_name;
        if (file_exists($backup_file_name)) {
        // Download the SQL backup file to the browser
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        exec('rm ' . $backup_file_name);
        }
    }
   
}