<?php

session_start();
requireValidSession();

$loUsers = User::get();
foreach($loUsers as $oUser){
    $oUser->start_date = getDateAsDateTime( $oUser->start_date)->format("d/m/Y");
    if($oUser->end_date){
        $oUser->end_date = getDateAsDateTime( $oUser->end_date)->format("d/m/Y");
    }
}

loadTemplateView("users", [
    "loUsers"=>$loUsers
]);
