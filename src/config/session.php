<?php

function requireValidSession(){
    $oUser = $_SESSION['user'];
    if(!isset($oUser)){
        header("Location: login_controller.php");
        exit();
    }
}


?>