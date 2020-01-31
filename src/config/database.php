<?php

class Database{
    public static function getConnection(){
        $env_path = realpath(dirname(__FILE__ ). '/../env.ini');
        $env = parse_ini_file($env_path);
        

        try{
            $connection = new PDO(
                "pgsql:host={$env['host']};
                dbname={$env['database']}",
                $env['username'], 
                $env['password']
            );
        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage() . '<br>';
            die("Lamentamos o ocorrido");
        }

        return $connection;
    }

}

?>