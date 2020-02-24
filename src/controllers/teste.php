<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
loadModel("WorkingHours");

$workingHours = WorkingHours::loadFromUserAndData(1, date("Y-m-d"));

$lunch = $workingHours->getWorkedInterval()->format("%H:%i:%s");
echo $lunch;

?>