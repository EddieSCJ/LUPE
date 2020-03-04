<?php

loadModel('User');

Class Login extends Model{

    public function validate(){
        $aErrors =[];
        
        if(!$this->email){
            $aErrors['email'] = "O email é um campo obrigatório.";
        }

        if(!$this->password){
            $aErrors['password'] = "O password é um campo obrigatório.";
        }

        if(count($aErrors)>0){
            throw new ValidationException($aErrors);
        }

    }

    public function LoginExists(){
        
        $this->validate();
        $user = User::getOne('*', ['email'=>$this->email]);
        if($user->password){
            if($user->end_date){
                throw new ValidationException([], "Usuário desligado da empresa");
            }
            if(password_verify($this->password, $user->password)){
                return $user;
            }else{
                throw new ValidationException([], 'Senha incorreta');
            }

        }
        throw new ValidationException([], 'Usuário e senha incorretos');
    }

}
