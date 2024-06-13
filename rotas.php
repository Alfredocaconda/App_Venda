<?php

        #================================================================================================
        #=================INCIO DOS CONTROLLER=======================================================
        #Controller do funcionario
        include "Controller/FuncionarioController.php";

        #Controller do produto
        include "Controller/ProdutoController.php";

        #controller da categoria
        include "Controller/CategoriaController.php";

        #controller do stock
        include "Controller/StockController.php";

        #controller de venda
        include "Controller/VendaController.php";

        #controller da login
        include "Controller/loginController.php";

        #CONTROLLER DO ERRO
        include "Controller/dashboardController.php";

        #CONTROLLER DA FATURA
        include "Controller/faturaController.php";
        #Controller da impressao
        include "Controller/ImpressaoController.php";

        include "Controller/fechoDiario.php";

        include "Controller/fechoPersonalizado.php";

        include "Controller/DevolucaoController.php";

        #==============================================================================================
        #====================== FIM DO CONTROLLER =====================================================
        #direcionando a url para as paginas

 try {
    //code...
    switch ($url) {
        #======================== INICIO DAS ROTAS DA AUTENTICAÇÃO=======================
        case '/login':
            # rota da pagina inicial...
            LoginController::index();
            break;
            
            case '/logout':
                # rota da pagina inicial...
                session_start();
                unset($_SESSION['nome']);
                unset($_SESSION['cargo']);
                LoginController::index();
                break;
                
            case '/autenticacao':
                # rota para autenticar...
                LoginController::autenticar();
                break;
                #======================== FIM DAS ROTAS DA AUTENTICAÇÃO=======================

            #======================== INICIO DAS ROTAS DO FUNCIONARIO=======================

        case '/funcionario':
            # chamando a class controlcom a funcao de pagina inicial...
            FuncionarioController::index();
            break;

        case '/funcionario/form':
            # chamando a class control com a funcao de formulario...
            FuncionarioController::form();
            break;

        case '/funcionario/form/save':
            FuncionarioController::save();
            break;

        case '/funcionario/delete':
            FuncionarioController::delete();
            break;

            #======================== FIM DAS ROTAS DO FUNCIONARIO=======================
       
            #======================== INICIO DAS ROTAS DO PRODUTO==========================
        case '/produto':
            # chamando a class controlcom a funcao de pagina inicial...
            ProdutoController::index();
            break;
        case '/produto/form':
            # chamando a class control com a funcao de formulario...
            ProdutoController::form();
            break;
        case '/produto/form/save':
            ProdutoController::save();
            break;
        case '/produto/delete':
            ProdutoController::delete();
            break;
            #============================= FIM DAS ROTAS DE PRODUTOS


            #======================== INICIO DAS ROTAS DE STOCK=======================

        case '/Stock':
            # chamando a class controlcom a funcao de pagina inicial...
            StockController::index();
            break;

        case '/Stock/form':
            # chamando a class controlcom a funcao de pagina inicial...
            StockController::form();
            break;

        case '/Stock/form/qtd':
            # chamando a class controlcom a funcao de pagina inicial...
            StockController::qtd();
            break;

        case '/Stock/qtd/save':
            # chamando a class controlcom a funcao de pagina inicial...
            StockController::quantidade();
            break;

        case '/Stock/form/save':
            StockController::save();
            break;

        case '/Stock/editar':
            StockController::edit();
            break;

            #============================= FIM DAS ROTAS DE STOCK=========================

            #============================= INICIO DA ROTA DA PAGINA PRINCIPAL===================
            case '/':
                dashboardController::dashboard();
                break;
            
                #============================= FIM DA ROTA DA PAGINA PRINCIPAL================

             #================== INICIO DAS ROTAS DA CATEGORIA=========== 
             case '/categoria/form/save':
                CategoriaController::save();
            break;

            case '/categoria/form':
                CategoriaController::form();
                break;

            case '/categoria':
                CategoriaController::index();
                break;

            case '/categoria/delete':
                CategoriaController::delete();
                break;
            #================== FIM DAS ROTAS DA CATEGORIA=========== 
            #========================================================================================================
            
            
            #================== INICIO DAS ROTAS DE VENDA=========== 
            #========================================================================================================
           
            case '/Venda':
                VendaController::index();
                break;

            case '/Venda/save':
                VendaController::save();
                break;

                case '/Venda/basconista':
                    VendaController::basconista();
                    break;

            case '/Venda/final':
                VendaController::finalizar();
                break;

                case '/impressao/fatura':
                imprimirController::fatura();
                VendaController::finalizar();
                break;

            case '/fatura/performa':
                imprimirController::performa();
                break;

            case '/venda/Apagar':
                VendaController::Apagar();
                break;

            case '/Venda/removerID':
                VendaController::carrinhoremoverId();
                break;
           
                #================== FIM DAS ROTAS DA CATEGORIA=========== 
                #========================================================================================================
                case '/devolucao':
                    DevolucaoController::index(); 
                    break;
                case '/apagarDevolucao':
                    DevolucaoController::delete(); 
                    break;
                #==============Rota de relatorio================================
                #=================================================================================
                case '/relatoriodiario';
                VendaController::diario();
                break;
                case '/relatoriodiario/imprimir';
                fechoDiario::diario();
                break;
                case '/relatorioPersonalizado';
                VendaController::personalizado();
                break;
                case '/relatorioPersonalizadoimpressao';
                impressaoPersonalizado::impressaoPers();
                break;
                #================== INICIO DAS ROTAS DE PAGINAS NÃO EXISTENTE=========== 
                #========================================================================================================
                
                case '/eliminado':
                    dashboardController::eliminado();
                    break;
                    #===========================================================
                    default:
                    # code...
                    dashboardController::Error404();
                    break;
                    #================== FIM DAS ROTAS DA CATEGORIA=========== 
                    #========================================================================================================
                    
     }
 } catch (Exception $ex) {
    //throw $th;
    echo $ex->getMessage();
 }
 
 
?>