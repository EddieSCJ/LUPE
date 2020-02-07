<?php

loadModel('User');

Class Login extends Model{

    public function validate(){
        $errors =[];
        
        if(!$this->email){
            $errors['email'] = "O email é um campo obrigatório.";
        }

        if(!$this->password){
            $errors['password'] = "O password é um campo obrigatório.";
        }

        if(count($errors)>0){
            throw new ValidationException($errors);
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
