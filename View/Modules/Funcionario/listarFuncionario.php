<?php
   require_once "./View/Cabecalho/header.php";
?>
               <!-- end topbar -->
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
   <section class="content">
    <table class="table table-hover">
        <tr>
            <th  scope="col">NOME</th>
            <th scope="col">GENERO</th>
            <th scope="col">BILHETE</th>
            <th scope="col">FUNÇÃO</th>
            <th scope="col">DATA DE NASCIMENTO</th>
            <th scope="col">TELEFONE/EMAIL</th>
            <th scope="col">ENDEREÇO</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        <?php foreach ($model->linhas as $item): ?>
         <tr>
            <td scope="col" ><?=$item->nome?> </td>
            <td scope="col"><?=$item->genero?> </td>
            <td scope="col"><?=$item->bilhete?> </td>
            <td scope="col"> <?=$item->cargo?></td>
            <td scope="col"> <?=$item->data_nascimento?></td>
            <td scope="col"> <?=$item->telefone_email?></td>
            <td scope="col"> <?=$item->endereco?></td>
            <td scope="col"> <a href="/funcionario/delete?idf=<?=$item->idf?>" class="btn btn-danger">APAGAR</a></td>
            <td scope="col"> <a href="/funcionario/form?idf=<?=$item->idf?>" class="btn btn-success">EDITAR</a></td>
        </tr>
        <?php endforeach ?> 
    </table>
    </section>
<!-- /.content-wrapper -->
<?php
require_once "./View/Cabecalho/rodape.php";
?>  