<?php
class DevolucaoController{

public static function auth(){
    Middleware::auth();

}

public function __construct()
{
    $this->auth();
}

public static function index(){
   // isProtected();
    include "Model/DevolucaoModel.php";
    $model=new DevolucaoModel();
    if (isset($_POST['fatura'])) {
        # code...
        $model->listar_fatura($_POST['fatura']);
    } else {
        $model->listar_fatura("");
        # code...
    }
    Middleware::auth();
    include 'View/Modules/Devolucao/listar_devolucao.php';
}

public static function delete(){
    include "Model/DevolucaoModel.php";
    $model=new DevolucaoModel();
    $model->delete((int) $_GET['idp']);
    Middleware::auth();
    header("Location: /devolucao");

}
}
?>