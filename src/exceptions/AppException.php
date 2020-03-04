<?php

class AppException extends Exception{

    public function __construct($sMessage, $iCode = 0, $previous = null){
        parent::__construct($sMessage, $iCode, $previous);
    }
}



?>