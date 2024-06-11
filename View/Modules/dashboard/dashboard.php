<?php
   require_once "./View/Cabecalho/header.php";
?>
               <!-- dashboard inner -->
               <div  class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Informações</h2>
                           </div>
                           <div class="col-md-6 col-lg-3">
         <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
               <div> 
               <i class="fa fa-comments-o red_color"></i>
               </div>
            </div>
               <div class="counter_no">
               <div>
                  <p class="total_no">
                     <?php
                     include "./Connection/conexao.php";
                     // Consulta SQL para contar os usuários
                        $sql = "SELECT COUNT(idv) as total_venda FROM vvenda";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // Exibe o número de usuários cadastrados
                        $row = $result->fetch_assoc();
                        echo "<h1>".$row["total_venda"]."</h1>";
                        } else {
                        echo "<h1>0</h1>";
                        } 
                     ?>
                  </p>
                  <p class="head_couter">Venda</p>
               </div>
      </div>
   </div>
                     </div>
                  </div>
                     <!-- graph -->
                     <!-- end graph -->
                     <section class="content"  style="overflow-y: auto; overflow-x: hidden; height: 65vh;">
    <table class="table table-hover">
        <tr>
            <th  scope="col">CODIGO</th>
            <th  scope="col">NOME/DESCRIÇÃO/CATEGORIA</th>
            <th  scope="col">QTD VENDIDO</th>
            <th  scope="col">VALOR TOTAL</th>
            <th  scope="col">DATA</th>
            <th  scope="col">FACTURA</th>
            <th  scope="col">FUNCIONÁRIO</th>
        </tr>
        <?php foreach ($modelagem->listarVendas as $item): ?>
         <tr>
            <td scope="col" ><?=$item->idv?> </td>
            <td scope="col" ><?=$item->nome."/".$item->descricao."/".$item->nomec?> </td>
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
<?php
require_once "./View/Cabecalho/rodape.php";
?>             