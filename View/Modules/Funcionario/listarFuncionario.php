<?php
   require_once "./View/Cabecalho/header.php";
?>
           
               <!-- dashboard inner -->
         <div class="row column_title">
            <div class="col-md-12">
               <div class="page_title">
                  <h2>Listar os Dados do Funcionario</h2>
               </div>
            </div>
         </div>
   <!--LINHA-->
         <nav class="navbar bg-body-tertiary">
         <div class="container-fluid">
            <form class="d-flex" action="/funcionario" method="POST" role="search">
               <input class="form-control me-2" type="search" name="nome" placeholder="NOME OU FUNÇÃO" aria-label="Search" autofocus>
                  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
         </div>
         </nav>
   <section class="content" style="overflow-y: auto; overflow-x: hidden; height: 65vh;">
    <table class="table table-hover">
       <thead>
        <tr>
            <th >NOME</th>
            <th >BILHETE</th>
            <th >FUNÇÃO</th>
            <th >DATA DE NASCIMENTO</th>
            <th >TELEFONE/EMAIL</th>
            <th >ENDEREÇO</th>
            <th >OPÇÕES</th>
         </tr>
      </thead>
        <?php foreach ($model->linhas as $item): ?>
         <tr>
            <tbody>
               <td ><?=$item->nome?> </td>
               <td ><?=$item->bilhete?> </td>
               <td > <?=$item->cargo?></td>
               <td > <?=$item->data_nascimento?></td>
               <td > <?=$item->telefone_email?></td>
               <td > <?=$item->endereco?></td>
               <td > <a href="/funcionario/delete?idf=<?=$item->idf?>" class="btn btn-danger">APAGAR</a></td>
               <td ><a href="/funcionario/form?idf=<?=$item->idf?>" class="btn btn-success">EDITAR</a></td>
            </tbody>
        </tr>
        <?php endforeach ?> 
    </table>
    </section>
<!-- /.content-wrapper -->
<?php
require_once "./View/Cabecalho/rodape.php";
?>  