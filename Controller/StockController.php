<?php

class StockController{
    public static function auth(){
        Middleware::auth();
    
    }
    
    public function __construct()
    {
        $this->auth();
    }
public static function index(){
    include "Model/StockModel.php";
    $model=new StockModel();
    if (isset($_POST['nome'])) {
        # code...
        $model->selectStock($_POST['nome']);
    } else {
        $model->selectStock("");
        # code...
    }
    Middleware::auth();
    include 'View/Modules/Stock/listarStock.php';
}
public static function form(){
    include "Model/ProdutoModel.php";
    include "Model/StockModel.php";
    $model2=new StockModel();
    if (isset($_POST['nome'])) {
        # code...
        $model2->selectStock($_POST['nome']);
    } else {
        $model2->selectStock("");
        # code...
    }
    $model=new ProdutoModel();
    if (isset($_GET['idp']))
    $model= $model->listarId((int) $_GET['idp']);
   Middleware::auth();
    include 'View/Modules/Stock/formStock.php';
} 
public static function edit(){
    include "Model/StockModel.php";
    $model=new StockModel();
    if (isset($_GET['idstock']))
    $model= $model->listarId((int) $_GET['idstock']);
   Middleware::auth();
    include 'View/Modules/Stock/formEdit.php';
} 
public static function qtd(){
    include "Model/StockModel.php";
    $model=new StockModel();
    if (isset($_GET['idstock']))
    $model= $model->listarId((int) $_GET['idstock']);
    Middleware::auth();
    include 'View/Modules/Stock/formStockQTD.php';
} 
public static function save(){
    include "Model/StockModel.php";
    $data=date('Y-m-d-H:i:s'); 
    $model=new StockModel();
    $model->idstock=$_POST['idstock'];
    $model->preco_venda=$_POST['preco_venda'];
    $model->qtd=$_POST['qtd'];
    $valor1=$_POST['valor_compra']*$_POST['qtd'];
    $valor2=$_POST['preco_venda']*$_POST['qtd'];
    $model->dataentrada=$data;
    $model->idp=$_POST['idp'];
    $model->idf=1;
    $lucros=$valor2-$valor1;
    $model->lucro=$lucros;
    $model->save();
    Middleware::auth();
    header("Location: /Stock");
}
public static function quantidade(){
    include "Model/StockModel.php";
    $model=new StockModel();
    $model->qtd=$_POST['qtd'];
    $model->idstock=$_POST['idstock'];
    $model->saveQtd();
    Middleware::auth();
    header("Location: /Stock");
}
public static function delete(){
    include "Model/StockModel.php";
    $model=new StockModel();
    $model->delete((int) $_GET['idstock']);
    Middleware::auth();
    header("Location: /Stock");
}
}
?>