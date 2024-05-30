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
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>AUMENTAR A QUANTIDADE NO STOCK</h2>
                           </div>
                        </div>
                     </div>
    <section class="content">
    <form action="/Stock/qtd/save" method="Post" enctype="multipart/form-data" class="row g-3">
        <input type="hidden" name="idstock"  value="<?= $model->idstock ?>" >
        <input type="hidden" name="valor_compra"  value="<?= $model->valor_compra ?>" >
        <input type="hidden" name="preco_venda"  value="<?= $model->preco_venda ?>" >
        <input type="hidden" name="idf"  value="<?= $_SESSION['idf'] ?>" >
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">PRODUTO/DESCRIÇÃO/CATEGORIA</label>
        <input type="text" class="form-control" name="nome" value=
        "<?= $model->nome." / ".$model->descricao." / ".$model->nomec ?>" id="inputEmail4" 
        placeholder="PRODUTO/DESCRIÇÃO/CATEGORIA" required>
        </div>
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">QUANTIDADE</label>
        <input type="number" class="form-control" name="qtd" id="inputEmail4" 
        placeholder="DIGITE AQUI O QUANTIDADE" required>
        </div>
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">PREÇO DA VENDA</label>
        <input type="text" class="form-control"value="<?= $model->preco_venda ?>" name="preco_venda"  id="inputEmail4" 
        placeholder="DIGITE AQUI O PREÇO DA VENDA" required>
        </div>
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