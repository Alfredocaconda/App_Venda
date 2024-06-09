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
    public static function diario(){
        include "Model/VendaModel.php";
        $modelagem=new VendaModel();
        #chamando as fucnoes das 
            if (isset($_POST['data'])) {
                # code...
                $modelagem->relatorioDiario($_POST['data']);
            } else {
                $modelagem->relatorioDiario("");
                # code...
            }
        
        #incluindo o formulario para poder mostrar todos os produtos
        Middleware::auth();
        include 'View/Modules/Relatorio/diario.php';
       
    }
    public static function personalizado(){
        include "Model/VendaModel.php";
        $modelagem=new VendaModel();
        #chamando as fucnoes das 
        $modelagem->relatorioPersonalizado($_POST['nome']);
        #incluindo o formulario para poder mostrar todos os produtos
        Middleware::auth();
        include 'View/Modules/Relatorio/personalizado.php';
       
    }
   

    public static function save(){
    include "Model/VendaModel.php";
    $model=new VendaModel();
    $model->id_carrinho=$_POST['id_carrinho'];
    $model->idstock=$_POST['idstock'];
    $model->idproduto=$_POST['idp'];
    $model->nome=$_POST['nomes'];
    $model->quantidade=$_POST['quantidade'];
    $model->preco_venda=$_POST['preco_venda'];
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
        $model->finalizar();
        Middleware::auth();
        
    }
   
    public static function Apagar(){
        include "Model/VendaModel.php";
        $model=new VendaModel();
        $model->Apagar();
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
 