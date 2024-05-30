<?php

class ProdutoController{
    public static function auth(){
        Middleware::auth();
    
    }
    
    public function __construct()
    {
        $this->auth();
    }
    
public static function index(){
   // isProtected();
    include "Model/ProdutoModel.php";
    $model=new ProdutoModel();
    if (isset($_POST['nome'])) {
        # code...
        $model->listar($_POST['nome']);
    } else {
        $model->listar("");
        # code...
    }
    Middleware::auth();
    include 'View/Modules/Produto/listarProduto.php';
}
public static function form(){
    include "Model/ProdutoModel.php";
    $model=new ProdutoModel();
    if (isset($_GET['idp']))
    $model= $model->listarId((int) $_GET['idp']);
    Middleware::auth();
    include 'View/Modules/Produto/formProduto.php';
} 
public static function save(){
    include "Model/ProdutoModel.php";
    $model=new ProdutoModel();
    $model->idp=$_POST['idp'];
    $model->idf=$_POST['idf'];
    $model->nome=$_POST['nome'];
    $model->valor_compra=$_POST['preco'];
    $model->codigo_barra=$_POST['codigo_barra'];
    $model->caducidade=$_POST['caducidade'];
    $model->descricao=$_POST['descricao'];
    $model->idcategoria=$_POST['idcategoria'];
    $model->save();
    Middleware::auth();
    header("Location: /produto");
}
public static function delete(){
    include "Model/ProdutoModel.php";
    $model=new ProdutoModel();
    $model->delete((int) $_GET['idp']);
    Middleware::auth();
    header("Location: /produto");
}
}
?>