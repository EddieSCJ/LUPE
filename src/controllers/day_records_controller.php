<?php 
session_start();
requireValidSession();


$rDate = (new DateTime())->getTimestamp();
$rToday = strftime('%d de %B de %Y',$rDate);

$oUser = $_SESSION['user'];
$oRecord = WorkingHours::loadFromUserAndData($oUser->id, date('Y-m-d'));


loadTemplateView('day_records', 
[
    'rToday' => $rToday,
    'oRecord' => $oRecord
]);

?>