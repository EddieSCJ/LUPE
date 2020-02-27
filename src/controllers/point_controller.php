<?php

session_start(); 
requireValidSession();

loadModel("WorkingHours");

$user = $_SESSION['user']; 

$records = WorkingHours::loadFromUserAndData($user->id, date('Y-m-d'));
$currentTime = strftime('%H:%M:%S', time());

if($_POST['batimento_forcado']){
    $currentTime = $_POST['batimento_forcado'];
}

try{
    $records->batimento($currentTime);
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
