<?php 

include_once(dirname(__FILE__, 2) . "/src/config/database.php");

Database::getConnection();

$sql = "select * from users;";

$result = Database::getResultFromQuery($sql);

while($row = $result->fetch()){
    print_r($row);
}

?>