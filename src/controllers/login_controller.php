<?php 

loadModel('Login');

if(count($_POST)>0){
    $login = new Login(
        $_POST
    );
    
    try{
        $resultado = $login->LoginExists();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
}

loadView('login', $_POST);
