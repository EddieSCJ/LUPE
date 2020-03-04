<?php

class ValidationException extends AppException{

    private $errors = [];

    public function __construct($errors =  [], 
        $sMessage = "Erros de validação",
        $iCode = 0,
        $previous = null){
        parent::__construct($sMessage, $iCode, $previous);
        $this->errors = $errors;    
    }

    public function getErrors(){
        return $this->errors;
    }

    public function get($error){
        return $this->errors["$error"];
    }
}



?>