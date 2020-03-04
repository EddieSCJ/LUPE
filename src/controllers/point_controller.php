<?php

session_start(); 
requireValidSession();

loadModel("WorkingHours");

$oUser = $_SESSION['user']; 

$oRecord = WorkingHours::loadFromUserAndData($user->id, date('Y-m-d'));
$sCurrentTime = strftime('%H:%M:%S', time());

if($_POST['batimento_forcado']){
    $sCurrentTime = $_POST['batimento_forcado'];
}

try{
    $oRecord->batimento($sCurrentTime);
    $_SESSION['message'] = [
        'type' => 'sucess',
        'message' => 'Ponto batido com sucesso'
    ];
}catch(AppException $e){
    $_SESSION['message'] = [
        'type' => 'error',
        'message' => $e->getMessage()
    ];
}
header("Location: day_records_controller.php");
