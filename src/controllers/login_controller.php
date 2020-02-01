<?php 

loadModel('Login');

if(count($_POST)>0){
    $login = new Login(
        $_POST
    );
    
    try{
        $resultado = $login->LoginExists();
        var_dump($resultado);
    }catch(Exception $e){
        echo "Falha no Login";
    }
    
}

loadView('login', $_POST);
