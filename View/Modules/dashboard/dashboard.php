<?php
   require_once "./View/Cabecalho/header.php";
   include "./Connection/conexao.php";
?>
               <!-- dashboard inner -->
                 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>INFORMAÇÕES</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                        <?php
                                          // Consulta SQL para contar os usuários
                                          $sql = "SELECT COUNT(idf) as total_funcionario FROM funcionario";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                             // Exibe o número de usuários cadastrados
                                             $row = $result->fetch_assoc();
                                             echo "<h1>".$row["total_funcionario"]."</h1>";
                                          } else {
                                             echo "<h1>0</h1>";
                                          } 
                                       ?>
                                    </p>
                                    <p class="head_couter">FUNCIONARIO</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-clock-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                 <p class="total_no">
                                        <?php
                                          // Consulta SQL para contar os usuários
                                          $sql = "SELECT COUNT(idp) as total_produto FROM produto";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                             // Exibe o número de usuários cadastrados
                                             $row = $result->fetch_assoc();
                                             echo "<h1>".$row["total_produto"]."</h1>";
                                          } else {
                                             echo "<h1>0</h1>";
                                          } 
                                       ?>
                                    </p>
                                    <p class="head_couter">PRODUTO</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-cloud-download green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                 <p class="total_no">
                                        <?php
                                          // Consulta SQL para contar os usuários
                                          $sql = "SELECT COUNT(idstock) as total_stock FROM stock";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                             // Exibe o número de usuários cadastrados
                                             $row = $result->fetch_assoc();
                                             echo "<h1>".$row["total_stock"]."</h1>";
                                          } else {
                                             echo "<h1>0</h1>";
                                          } 
                                       ?>
                                    </p>
                                    <p class="head_couter">STOCK</p>
                                 </div>
                              </div>
                           </div>
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
                                        $data_atual=date("Y-m-d");
                                          // Consulta SQL para contar os usuários
                                          $sql = "SELECT COUNT(idp) as total_produto FROM produto where caducidade<='$data_atual'";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                             // Exibe o número de usuários cadastrados
                                             $row = $result->fetch_assoc();
                                             echo "<h1>".$row["total_produto"]."</h1>";
                                          } else {
                                             echo "<h1>0</h1>";
                                          } 
                                       ?>
                                    </p>
                                    <p class="head_couter">CADUCADOS</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    
                    
                 
               <!-- end dashboard inner -->
               
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
                  </div>
                 
                 </div>
<?php
require_once "./View/Cabecalho/rodape.php";
?>             