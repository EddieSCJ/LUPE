<?php

loadModel('User');

Class Login extends Model{
    

    public function LoginExists(){
        $user = User::getOne('*', ['email'=>$this->email]);
        if($user){
            if($user->end_date){
                throw new AppException("Usuário desligado da empresa");
            }
            if(password_verify($this->password, $user->password)){
                return true;
            }else{
                throw new AppException('Senha incorreta');
            }

        }
        throw new AppException('Usuário e senha incorretos');
    }

}


?>