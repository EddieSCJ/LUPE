<?php

loadModel('User');
Class Login extends Model{
    

    public function LoginExists(){
        $user = User::getOne('email, password', ['email'=>$this->email]);
        if($user){
            if(password_verify($this->password, $user->password)){
                return true;
            }

        }
        throw new Exception('Usuário não encontrado');
    }

}


?>