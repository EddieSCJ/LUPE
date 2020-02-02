<?php 

loadModel('Login');

$exception = null;

if(count($_POST)>0){
    $login = new Login(
        $_POST
    );
    
    try{
        $result = $login->LoginExists();
        if($result){
            header('Location: day_records_controller.php');
            return true;
        }
    }catch(ValidationException $e){
        $exception = $e;
    }
    
}

loadView('login', $_POST + ['exception' => $exception]);
