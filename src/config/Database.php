<?php

class Database{
    public static function getConnection(){
        $sEnvPath = realpath(dirname(__FILE__ ). '/../env.ini');
        $aEnv = parse_ini_file($sEnvPath);
        

        try{
            $rConnection = new PDO(
                "pgsql:host={$aEnv['host']};
                dbname={$aEnv['database']}",
                $aEnv['username'], 
                $aEnv['password']
            );
        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage() . '<br>';
            die("Lamentamos o ocorrido");
        }

        return $rConnection;
    }

    public static function getResultFromQuery($sql){
        $rConncetion = self::getConnection();

        $rResult = $rConncetion->query($sql);
        $rConncetion = null;

        return $rResult;
    }

    public static function executeSQL($sql, $table_name){
        $rConnection = self::getConnection();
        if($rConnection->query($sql) === null){

            throw new Exception(pg_errormessage($rConnection));
        }
        $iId = $rConnection->lastInsertId($table_name);
        $rConnection = null;
        return $iId;
    }

}

?>