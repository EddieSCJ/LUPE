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

    public static function getResultFromQuery($sql){
        $connection = self::getConnection();

        $result = $connection->query($sql);

        $connection = null;

        return $result;
    }

    public static function executeSQL($sql, $table_name){
        $conn = self::getConnection();
        
        if($conn->query($sql) === null){
            throw new Exception(pg_errormessage($conn));
        }
        echo $sql ."<br>";
        $id = $conn->lastInsertId($table_name);
        $conn = null;
        return $id;
    }

}

?>