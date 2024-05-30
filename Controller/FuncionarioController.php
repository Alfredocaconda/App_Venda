<?php

class FuncionarioController {
    public static function auth(){
        Middleware::auth();
    
    }
    
    public function __construct()
    {
        $this->auth();
    }
public static function index(){
    #CHAMANDO A CLASSE PAI PARA REVIRIFICAR SE ESTA LOGADO OU NAO
    include "Model/FuncionarioModel.php";
    $model=new FuncionarioModel();
    if (isset($_POST['nome'])) {
        # code...
        $model->listar($_POST['nome']);
    } else {
        $model->listar("");
        # code...
    }
    Middleware::auth();
    include 'View/Modules/Funcionario/listarFuncionario.php';
}
public static function form(){
    include "Model/FuncionarioModel.php";
    $model=new FuncionarioModel();
    if (isset($_GET['idf']))
    $model= $model->listarId((int) $_GET['idf']);
    Middleware::auth();
    include 'View/Modules/Funcionario/formFuncionario.php';
} 
public static function save(){
    include "Model/FuncionarioModel.php";
    $model=new FuncionarioModel();
    $model->idf=$_POST['idf'];
    $model->nome=$_POST['nome'];
    $model->genero=$_POST['genero'];
    $model->bilhete=$_POST['bilhete'];
    $model->estado=$_POST['estado'];
    $model->cargo=$_POST['cargo'];
    $model->data_nascimento=$_POST['data_nascimento'];
    $model->senha=$_POST['senha'];
    $model->telefone_email=$_POST['telefone_email'];
    $model->endereco=$_POST['endereco'];
    $model->save();
    Middleware::auth();
    header("Location: /funcionario");
}
public static function delete(){
    include "Model/FuncionarioModel.php";
    $model=new FuncionarioModel();
    $model->delete((int) $_GET['idf']);
    Middleware::auth();
    header("Location: /funcionario");

}
}
?>