<?php
require_once "./View/Cabecalho/header.php";
?>
      <!-- dashboard inner -->
      <div class="container-fluid">
         <div class="row column_title">
            <div class="col-md-12">
               <div class="page_title">
                  <h2>Listar as Categorias</h2>
               </div>
            </div>
         </div>
      </div>
      <nav class="navbar bg-body-tertiary">
         <div class="container-fluid">
            <form class="d-flex" action="/categoria" method="POST" role="search">
               <input class="form-control me-2" type="search" name="nome" placeholder="NOME DA CATEGORIA" aria-label="Search" autofocus>
               <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
         </div>
      </nav>
      <section class="content" style="overflow-y: auto; overflow-x: hidden; height: 65vh;">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">NOME</th>
                  <th scope="col">FUNCIONÁRIO</th>
                  <th scope="col">OPÇÕES</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($model->linhas as $item): ?>
                  <tr>
                     <td scope="col"><?=$item->nome?> </td>
                     <td scope="col"><?=$item->nomef?> </td>
                     <td width=10px;> <a href="/categoria/delete?idcategoria=<?=$item->idcategoria?>" class="btn btn-danger">
                     APAGAR</a></td>
                     <td> <a href="/categoria/form?idcategoria=<?=$item->idcategoria?>"class="btn btn-success">EDITAR</a></td>
                  </tr>
               <?php endforeach ?>
            </tbody>
         </table>
      </section>
   <!-- footer -->
<?php
require_once "./View/Cabecalho/rodape.php";
?>