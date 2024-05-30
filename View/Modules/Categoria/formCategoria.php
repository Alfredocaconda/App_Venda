<?php
   require_once "./View/Cabecalho/header.php";
?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Cadastrar Categoria</h2>
                           </div>
                        </div>
                     </div>
    <form action="/categoria/form/save" method="Post" enctype="multipart/form-data" class="row g-3">
        <input type="hidden" name="idcategoria"  value="<?= $model->idcategoria ?>" >
        <input type="hidden" name="idf"  value="<?= $_SESSION['idf'] ?>" >
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= $model->nome ?>" id="inputEmail4" 
        placeholder="DIGITE AQUI O SEU NOME" required>
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    </div>
                  <!-- footer -->
<?php
require_once "./View/Cabecalho/rodape.php";
?>