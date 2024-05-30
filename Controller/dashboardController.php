<?php
#classe que irá mostrar erro
include "Model/middleware.php";
class dashboardController{
    public static function Error404(){
        include "View/Error/404_error.php";
    }
    public static function eliminado(){
        include "View/Error/eliminado.php";
    }
    public static function dashboard(){
        include "Model/VendaModel.php";
        $modelagem=new VendaModel();
        #chamando as fucnoes das 
        if (isset($_POST['nome'])) {
            # code...
            $modelagem->listarVendas($_POST['nome']);
        } else {
            $modelagem->listarVendas("");
           # code...
        }
        #incluindo o formulario para poder mostrar todos os produtos
        Middleware::auth();
        include "View/modules/dashboard/dashboard.php";
    }
}
?>