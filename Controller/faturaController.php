<?php
class faturaController{
    public static function auth(){
        Middleware::auth();
    
    }
    
    public function __construct()
    {
        $this->auth();
    }
    public static function index(){
        include "Model/VendaModel.php";
        #chamando as classes
        $model2=new VendaModel();
        #chamando as fucnoes das 
        $model2->listarcarrinho();
        Middleware::auth();
        include 'View/fatura/fatura.php';
    }
    public static function performa(){
        include "Model/VendaModel.php";
        #chamando as classes
        $model2=new VendaModel();
        #chamando as fucnoes das 
        $model2->listarcarrinho();
        Middleware::auth();
        include 'View/fatura/faturaPerforma.php';
    }
}