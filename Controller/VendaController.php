<?php

    class VendaController{
        public static function auth(){
            Middleware::auth();
        
        }
        
        public function __construct()
        {
            $this->auth();
        }
    #funcao que irá mostrar todos os produtos
    public static function index(){
        #incluindo as modal 
        include "Model/VendaModel.php";
        include "Model/StockModel.php";
        #chamando as classes
        $model=new StockModel();
        $model2=new VendaModel();
        #chamando as fucnoes das 
        if (isset($_POST['nome'])) {
            # code...
            $model->listar($_POST['nome']);
        } else {
            $model->listar("");
            # code...
        }
        $model2->listarcarrinho();
        #incluindo o formulario para poder mostrar todos os produtos
        Middleware::auth();
        include 'View/Modules/dashboard/Venda.php';
    }

    public static function basconista(){
        #incluindo as modal 
        include "Model/VendaModel.php";
        include "Model/StockModel.php";
        #chamando as classes
        $model=new StockModel();
        $model2=new VendaModel();
        #chamando as fucnoes das 
        if (isset($_POST['nome'])) {
            # code...
            $model->listar($_POST['nome']);
        } else {
            $nome = "";
            $model->listar($nome);
            # code...
        }
        $model2->listarcarrinho();
        #incluindo o formulario para poder mostrar todos os produtos
        Middleware::auth();
        include 'View/Modules/Venda/listarVenda.php';
       
    }

    public static function save(){
    include "Model/VendaModel.php";
    $model=new VendaModel();
    $model->id_carrinho=$_POST['id_carrinho'];
    $model->idstock=$_POST['idstock'];
    $model->idproduto=$_POST['idp'];
    $model->nome=$_POST['nomes'];
    $model->quantidade=$_POST['quantidade'];
    $data=date("Y-m-d-H:i:s");
    $model->codigo_barra=$_POST['codigo_barra'];
    $model->dataCarrinho=$data;
    $model->save();
    Middleware::auth();
    header("Location: /Venda");
}
    public static function finalizar(){
        include "Model/VendaModel.php";
        $model=new VendaModel();
        $model->valorpago=$_POST['valor'];
        $model->soma=$_POST['soma'];
        $model->idf=$_POST['idf'];

        if ($_POST['valor']>=$_POST['soma']) {
            # code...
            $model->finalizar();
            Middleware::auth();
            header("Location: /Venda");
           # header("Location: ../View/fatura/fatura.php");
        } else {
            # code...
            echo "VALOR INSUFICIENTE";
        }
    }
   
    public static function Cancelar(){
        include "Model/VendaModel.php";
        $model=new VendaModel();
        $model->Cancelar();
        Middleware::auth();
        header("Location: /Venda");
    }
    public static function carrinhoremoverId(){
        include "Model/VendaModel.php";
        $model=new VendaModel();
        $model->removerId((string) $_GET['codigo_barra']);
        Middleware::auth();
       header("Location: /Venda");
    }
}
?>