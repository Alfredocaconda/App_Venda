<?php
try {
   include "Dao/CategoriaDao.php";
   $categoria_dao= new CategoriaDao();
   $listar_categoria=$categoria_dao->select("");
   $total_categoria=count($listar_categoria);
} catch (Exception $ex) {
   //throw $th;
   echo $ex->getMessage();
}
   require_once "./View/Cabecalho/header.php";
?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>CADASTRAR PRODUTOS</h2>
                           </div>
                        </div>
                     </div>
    <section class="content">
    <form action="/produto/form/save" method="Post" enctype="multipart/form-data" class="row g-3">
        <input type="hidden" name="idp"  value="<?= $model->idp ?>" >
        <input type="hidden" name="idf"  value="<?= $_SESSION['idf'] ?>" >
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">NOME DO PRODUTO</label>
        <input type="text" class="form-control" name="nome" value="<?= $model->nome ?>" id="inputEmail4" 
        placeholder="DIGITE AQUI O SEU NOME DO PRODUTO" required>
        </div>
       
        <div class="col-md-6">
        <label for="descricao" class="form-label">DESCRIÇÃO</label>
        <input type="text" class="form-control" id="inputAddress"
         value="<?= $model->descricao ?>" name="descricao"
        placeholder="DIGITE AQUI A SUA DESCRIÇÃO" required>
        </div>
        <div class="col-md-6">
        <label for="descricao" class="form-label">PREÇO DA COMPRA</label>
        <input type="text" class="form-control" id="inputAddress"
         value="<?= $model->valor_compra ?>" name="preco"
        placeholder="DIGITE AQUI O PRECO DA COMPRA" required>
        </div>
        <div class="col-md-6">
        <label for="caducidade" class="form-label">DATA DE CADUCIDADE</label>
        <input type="date" class="form-control" id="inputAddress"
         value="<?= $model->caducidade ?>" name="caducidade">
        </div>
        <div class="col-md-6">
        <label for="codigo_barra" class="form-label">CODIGO DE BARRA</label>
        <input type="text" class="form-control" id="inputAddress"
         value="<?= $model->codigo_barra ?>" name="codigo_barra"
        placeholder="DIGITE AQUI O CODIGO DE BARRA" required>
        </div>
        <div class="col-md-6">
         <br>
         <select name="idcategoria" id="idcategoria">
            <option>SELECIONAR A CATEGORIA</option>
            <?php for($i=0;$i<$total_categoria;$i++):?>
            <option value="<?= $listar_categoria[$i]->idcategoria ?>"
            ><?= $listar_categoria[$i]->nome ?></option>
            <?php endfor ?>
         </select>
        </div>
        <br>
        <div class="col-12">
         <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    </section>
                  <!-- footer -->
 <?php
require_once "./View/Cabecalho/rodape.php";
?>     