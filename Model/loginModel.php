<?php

class LoginModel{
    public $email,$password;

    public function autenticar(){

        include 'Dao/loginDao.php';

        $dados=new LoginDAO();

        $dados->autenticar($this);
        
    }
    public function listar(){
        include 'Dao/FuncionarioDao.php';
        $dados=new FuncionarioDao();
      // $this->linhas= $dados->select();

    }
  
}
?>