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
                              <h2>LISTAR OS PRODUTOS</h2>
                           </div>
                        </div>
                     </div>
                     
      <section class="content" style="overflow-y: auto; overflow-x: hidden; height: 65vh;">
      <!--coluna-->
      <div class="col"> 
            <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
               <form class="d-flex" action="/produto" method="POST" role="search">
                  <input class="form-control me-2" type="search" name="nome" placeholder="NOME DO PRODUTO" aria-label="Search" autofocus>
                     <button class="btn btn-outline-success" type="submit">Pesquisar</button>
               </form>
            </div>
            </nav>
    <table class="table table-hover">
        <tr>
            <th  scope="col">PRODUTO/DESCRIÇÃO/CATEGORIA</th>
            <th scope="col">PREÇO COMPRA</th>
            <th scope="col">CODIGO BARRA</th>
            <th scope="col">CADUCIDADE</th>
            <th scope="col">FUNCIONÁRIO</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        <?php foreach ($model->linhas as $item): ?>
            <td scope="col" ><?=$item->nome."/ ".$item->descricao." /".$item->nomec?></td>
            <td scope="col"><?=number_format($item->valor_compra)."KZ"?> </td>
            <td scope="col"> <?=$item->codigo_barra?></td>
            <td scope="col"> <?=$item->caducidade?></td>
            <td scope="col"> <?=$item->nomef?></td>
            <td scope="col"><a href="/produto/delete?idp=<?=$item->idp?>" class="btn btn-danger">APAGAR</a></td>
            <td scope="col"><a href="/produto/form?idp=<?=$item->idp?>" class="btn btn-success">EDITAR</a></td>
            <td scope="col"><a href="/Stock/form?idp=<?=$item->idp?>" class="btn btn-success">STOCK</a></td>
        </tr>
        <?php endforeach ?> 
    </table>
    </section>
<!-- /.content-wrapper -->
<?php
require_once "./View/Cabecalho/rodape.php";
?>  