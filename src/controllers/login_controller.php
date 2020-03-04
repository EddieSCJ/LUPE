<?php 

loadModel('Login');

session_start();

$exception = null;

if(count($_POST)>0){
    $oLogin = new Login(
        $_POST
    );
    
    try{
        $oResult = $oLogin->LoginExists();
        if($oResult){
            $_SESSION['user'] = $oResult;
            header('Location: day_records_controller.php');
            
            return true;
        }
    }catch(ValidationException $e){
        $exception = $e;
    }
    
}

loadView('login', $_POST + ['exception' => $exception]);
