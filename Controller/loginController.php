<?php
class LoginController {

    public static function index(){
        include "View/Modules/login/login.php";
    }
  
    public static function autenticar(){
        include "Model/loginModel.php";
        $model= new LoginModel();
        $model->email=$_POST['email'];
        $model->password=$_POST['password'];
        $model->autenticar();
    }
 
}
?>