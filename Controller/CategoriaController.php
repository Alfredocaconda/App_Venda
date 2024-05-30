<?php
class CategoriaController{

public static function auth(){
    Middleware::auth();

}

public function __construct()
{
    $this->auth();
}

public static function index(){
   // isProtected();
    include "Model/CategoriaModel.php";
    $model=new CategoriaModel();
    if (isset($_POST['nome'])) {
        # code...
        $model->listar($_POST['nome']);
    } else {
        $model->listar("");
        # code...
    }
    Middleware::auth();
    include 'View/Modules/Categoria/listar_categoria.php';
}
public static function form(){
    include "Model/CategoriaModel.php";
    $model=new CategoriaModel();
    if (isset($_GET['idcategoria']))
    $model= $model->listarId((int) $_GET['idcategoria']);
   Middleware::auth();
    include 'View/Modules/Categoria/formCategoria.php';
} 
public static function save(){
    include "Model/CategoriaModel.php";
    
    $model=new CategoriaModel();
    $model->idcategoria=$_POST['idcategoria'];
    $model->idf=$_POST['idf'];
    $model->nome=$_POST['nome'];
    $model->save();
    Middleware::auth();
    header("Location: /categoria/form");
}
public static function delete(){
    include "Model/CategoriaModel.php";
    $model=new CategoriaModel();
    $model->delete((int) $_GET['idcategoria']);
    Middleware::auth();
    header("Location: /categoria");

}
}
?>