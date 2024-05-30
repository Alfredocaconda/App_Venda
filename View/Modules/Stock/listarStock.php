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
                     
      <section class="content">
      <!--coluna-->
      <div class="col"> 
            <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
               <form class="d-flex" action="/Stock" method="POST" role="search">
                  <input class="form-control me-2" type="search" name="nome" placeholder="NOME DO PRODUTO" aria-label="Search" autofocus>
                     <button class="btn btn-outline-success" type="submit">Pesquisar</button>
               </form>
            </div>
            </nav>
         
      </div>
                       
    <table class="table table-hover">
        <tr>
            <th scope="col">NOME/DESCRIÇÃO/CATEGORIA</th>
            <th scope="col">QTD</th>
            <th scope="col">ENTRADA</th>
            <th scope="col">CADUCIDADE</th>
            <th scope="col">CODIGO BARRA</th>
            <th scope="col">VALOR VENDA</th>
            <th scope="col">LUCRO</th>
            <th scope="col">FUNCIONARIO</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        <?php foreach ($model->linhas as $item): ?>
        <tr>
            <td scope="col"><?=$item->nome . "/".$item->descricao."/".$item->nomec?> </td>
            <td scope="col"><?=$item->qtd?> </td>
            <td scope="col"><?=$item->dataentrada?> </td>
            <td scope="col"><?=$item->caducidade?> </td>
            <td scope="col"><?=$item->codigo_barra?> </td>
            <td scope="col"><?=number_format($item->preco_venda)."kz"?>  </td>
            <td scope="col"><?=number_format($item->lucro)."kz"?>  </td>
            <td scope="col"><?=$item->nomef?> </td>
            <td scope="col"> <a href="/Stock/form/qtd?idstock=<?=$item->idstock?>" class="btn btn-primary">+QTD</a></td>
            <td scope="col"> <a href="/Stock/editar?idstock=<?=$item->idstock?>" class="btn btn-success">EDITAR</a></td>
        </tr>
        <?php endforeach ?> 
    </table>
    </section>
<!-- /.content-wrapper -->
<?php
require_once "./View/Cabecalho/rodape.php";
?>  