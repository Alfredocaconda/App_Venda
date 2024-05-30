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
                              <h2>CADASTRAR FUNCIONÁRIO</h2>
                           </div>
                        </div>
                     </div>
                     
    <!--Conteudos Main content -->
    <section class="content">
    <!-- /.content-header -->
    <form action="/funcionario/form/save" method="Post" enctype="multipart/form-data" class="row g-3">
        <input type="hidden" name="idf"  value="<?= $model->idf ?>" >
        <div class="col-md-6">
        <label for="inputEmail4" class="form-label">NOME</label>
        <input type="text" class="form-control" name="nome" value="<?= $model->nome ?>" id="inputEmail4" 
        placeholder="DIGITE AQUI O SEU PRIMEIRO E ULTIMO NOME" required>
        </div>
        <div class="col-md-4">
        <br>
        <br>
        <select id="inputState" name="genero" value="<?= $model->genero ?>" class="form-select" required>
            <option >SELECIONAR O GENERO</option>
            <option value="Masculino" >Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
        </div>
        <div class="col-md-2">
        <label for="data_nascimento" class="form-label">DATA DE NASCIMENTO</label>
        <input type="date" class="form-control" name="data_nascimento" value="<?= $model->data_nascimento ?>" id="inputZip" required>
        </div>

        <div class="col-md-6">
        <label for="endereco" class="form-label">ENDEREÇO</label>
        <input type="text" class="form-control" id="inputAddress"
         value="<?= $model->endereco ?>" name="endereco"
        placeholder="DIGITE AQUI O SEU ENDEREÇO" required>
        </div>
        <div class="col-md-6">
        <label for="bilhete" class="form-label">Nº DO BILHETE</label>
        <input type="text" class="form-control" id="inputAddress"
         value="<?= $model->bilhete ?>" name="bilhete"
        placeholder=" XXXXXXXXXXXXBAXXX" required>
        </div>
        <div class="col-md-6">
        <label for="telefone" class="form-label">Nº DO TELEFONE OU E-MAIL</label>
        <input type="text" class="form-control" id="inputAddress" value="<?= $model->telefone_email ?>"
         name="telefone_email" 
        placeholder="DIGITE AQUI O SEU NÚMERO OU E-MAIL" required>
        </div>
        <div class="col-md-6">
        <label for="senha" class="form-label">SENHA</label>
        <input type="text" class="form-control" id="inputAddress" value="<?= $model->senha ?>" name="senha" 
        placeholder="DIGITE AQUI A SUA SENHA" required>
        </div>
        <div class="col-md-4">
        </br>
        <select id="cargo" name="cargo" class="form-select" value="<?= $model->cargo ?>" required>
            <option>SELECIONAR A FUNÇÃO</option>
            <option value="Gestor">GESTOR</option>
            <option value="Balconista">BALCONISTA</option>
            <option value="Limpeza">LIMPREZA</option>
            <option value="Segurança">SEGURANÇA</option>
        </select>
        </div>
        <div class="col-md-4">
        </br>
        <select value="<?= $model->estado ?>" id="estado" name="estado" class="form-select"  required>
            <option >SELECIONAR O ESTADO</option>
            <option value="activo" >ACTIVO</option>
            <option value="não activo">NÃO ACTIVO</option>
        </select>
        </div>
        <div class="col-12">
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    </section>
  <!-- /.content-wrapper -->
  <?php
require_once "./View/Cabecalho/rodape.php";
?> 