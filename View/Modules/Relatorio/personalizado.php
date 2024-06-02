<?php
   require_once "./View/Cabecalho/header.php";
?>
               <!-- end topbar -->
               <style>
                   .pesquisa{
            width: 50%;
            display:flex;
            height: 30px;
            margin-left: 50%;
            margin-top: 50px;
            input{
               width: 500%;
               text-align: center;
            }
         }
               </style>
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Relatório Personalizado</h2>
                           </div>
                        </div>
                     </div>
                     <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
               <form class="d-flex" action="/produto" method="POST" role="search">
                  <input class="form-control me-2" type="text" name="nome" aria-label="Search"
                  placeholder="PRODUTO/FUNCIONÁRIO" autofocus>
                     <button class="btn btn-outline-success" type="submit">Pesquisar</button>
               </form>
            </div>
            </nav>
                    <!-- #=====-->
              <!-- end graph -->
              <section class="content"  style="overflow-y: auto; overflow-x: hidden; height: 65vh;">
    <table class="table table-hover">
        <tr>
            <th  scope="col">CODIGO</th>
            <th  scope="col">PRODUTO</th>
            <th  scope="col">QTD VENDIDO</th>
            <th  scope="col">VALOR TOTAL</th>
            <th  scope="col">DATA</th>
            <th  scope="col">FACTURA</th>
            <th  scope="col">FUNCIONÁRIO</th>
        </tr>
        <?php foreach ($modelagem->listarVendas as $item): ?>
         <tr>
            <td scope="col" ><?=$item->idv?> </td>
            <td scope="col" ><?=$item->nome?> </td>
            <td scope="col" ><?=$item->qtdrequerida?> </td>
            <td scope="col" ><?=number_format($item->totalCompra)."KZ"?> </td>
            <td scope="col" ><?=$item->datavenda?> </td>
            <td scope="col" ><?=$item->fatura?> </td>
            <td scope="col" ><?=$item->nomef?> </td>
        </tr>
        <?php endforeach ?> 
    </table>
    </section>

                     </div>
                  <!-- footer -->
                  <?php
require_once "./View/Cabecalho/rodape.php";
?>