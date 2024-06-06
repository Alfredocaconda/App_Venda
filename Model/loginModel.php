<?php

class LoginModel{
    public $email,$password;

    public function autenticar(){

        include 'Dao/loginDao.php';

        $dados=new LoginDAO();

        $dados->autenticar($this);
        
    }
  
}
?>