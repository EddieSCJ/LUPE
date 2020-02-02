<?php 

loadModel('Login');

$exception = null;

if(count($_POST)>0){
    $login = new Login(
        $_POST
    );
    
    try{
        $login->LoginExists();
    }catch(ValidationException $e){
        $exception = $e;
    }
    
}

loadView('login', $_POST + ['exception' => $exception]);
