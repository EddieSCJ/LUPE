<?php 

require_once(dirname(__FILE__, 2) . "/src/config/config.php");
require_once(dirname(__FILE__, 2) . "/src/models/User.php");

$user = new User(['name' => 'JSilva', 'idade' => 18]);
echo $user->getSelect('id, name', ['id'=>1, 'name'=> "Jsilva"]);

?>