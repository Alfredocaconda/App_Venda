<?php

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
                              <h2>DAR ENTRADA NO STOCK</h2>
                           </div>
                        </div>
                     </div>
    <section class="content">
    <form action="/Stock/form/save" method="Post" enctype="multipart/form-data" class="row g-3">
        <input type="text" name="idstock"  value="<?= $model->idstock="" ?>" >
        <input type="hidden" name="idf"  value="<?= $_SESSION['idf'] ?>" >
        <input type="hidden" name="valor_compra"  value="<?= $model->valor_compra ?>" >
        <input type="hidden" name="idp"  value="<?= $model->idp ?>" >
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">PRODUTO/DESCRIÇÃO/CATEGORIA</label>
        <input type="text" class="form-control" name="nome" value=
        "<?= $model->nome." / ".$model->descricao." / ".$model->nomec ?>" id="inputEmail4" 
        placeholder="NOME/DESCRIÇÃO/CATEGORIA" required>
        </div>
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">QUANTIDADE</label>
        <input type="number" class="form-control" name="qtd" id="inputEmail4" 
        placeholder="DIGITE AQUI O QUANTIDADE" required>
        </div>
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">PREÇO DA VENDA</label>
        <input type="text" class="form-control" name="preco_venda"  id="inputEmail4" 
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