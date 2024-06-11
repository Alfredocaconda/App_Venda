<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ponto De Venda</title>
   <?php include "./View/Cabecalho/link.php" ?>
      <style>
         .tabela{
            width: 50%;
         }
         .cont{
            display: flex;
            justify-content: space-between;
            position: fixed;
            position: relative;
            z-index: 11;
         }
         #esquerdo {
            min-width: 450px;
            max-width: 450px;
            background-color: #15283c;
            color: #fff;
            transition: all 0.3s;
            position: relative;
            z-index: 11;
            box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.4);
            float: left;
            background-image: url('images/layout_img/pattern_h.png');
            position: fixed;
            height: 100%;
            overflow: auto;
            width: 150%;
            margin-left: 67%;
            margin-top: 7.3%;

         }
         .tabela1{
            width: 70%;
            height: 50vh;
            margin-top: 7%;
            font-size: 20px;
            position: relative;
            z-index: 11;
            box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.4);
            float: left;
            position: fixed;
         }

         img{
            width: 100px;
            height: 100px;
         }
         .logo{
            margin-left: 20px;
            
         }
         .cabecalho{
            background: #2a3a4b;
            width: 100%;
            height: 100px;
            position: fixed;
         }
         .nav{
            display: flex;
            justify-content: center;
            margin-top: -80px;
            color: white;
         }
         .valores{
            margin-left:10px;
         }
         h2{
            text-align: center;
            color: white;
         }
         h3{
            text-align: center;
         }
         input{
            text-align: center;
            width: 100%;
         }
         .total{
            font-size: 20px;
            color: white;
            margin-top: 10px;
         }
         .pesquisa{
            width: 50%;
            display:flex;
            height: 30px;
            margin-left: 50%;
            margin-top: 50px;
            input{
               width: 500%;
            }
         }
         .baixar{
            margin-top: 20px;
            height: 100vh;
         }
         .nome{
            display:flex;
            margin-left: 82%;
            margin-top: -50px;
            font-size: 15px;
         }
         .cor_nome{
            color:white;
         }
         .tabela2{
            margin-top: 5px;
         }
       
         .input{
            text-align: center;
            input{
               width: 70%;
               margin-top: 7px;
            }
         }
   </style>
</head>
<body>
            <div class="cabecalho">
               <div class="logo">
                  <img src="../../../logotipo/logotipo.png" alt="">
                  </div>
                  <div class="nome">
                     <div>
                  <p class="cor_nome"><?php echo $_SESSION['nome'] ?></p>
                       </div>   
                     <div>
                     <a href="/logout" class="btn btn-danger">SAIR</a>
                       </div>   
                  </div>
               </div>
            </div>
               <!-- end topbar -->
   <div class="cont">
   <div class="tabela1">
      <div class="pesquisa">
         <table class="table">
         <form action="/Venda" method="post">
            <input type="text" name="nome" placeholder="NOME / CODIGO DE BARRA">
            <button type="submite" class="btn btn-primary">PESQUISAR</button>
          </form>
         </table>
      </div>
      <h3>PONTO DE VENDA</h3>
      <div class="baixar" style="overflow-y: auto; overflow-x: hidden; height: 65vh;" >
<table class="table table-hover">
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">PREÇO</th>
            <th scope="col">QTD</th>
        </tr>
        <?php foreach ($model->linhas as $item): ?>
        <tr>
        <form action="/Venda/save" method="post">
            <input type="hidden" name="id_carrinho" value="<?=$item->id_carrinho?>">
            <input type="hidden" name="idp" value="<?=$item->idp?>">
            <input type="hidden" name="idstock" value="<?=$item->idstock?>">
            <input type="hidden" name="preco_venda" value="<?=$item->preco_venda?>">
            <input type="hidden" name="codigo_barra" value="<?=$item->codigo_barra?>">
            <input type="hidden" name="nomes" value="<?=$item->nome?>">
            <td scope="col" style="width: 150px;"><?=$item->nome." ".$item->descricao?> </td>
            <td scope="col"style="width: 150px;"><?=number_format($item->preco_venda)."KZ"?> </td>
            <td scope="col" style="width: 100px;"><?=$item->qtd?> </td>
            <td scope="col" style="width: 150px;"><input type="text" name="quantidade"
            placeholder="QUANTIDADE"  ></td>
            <td scope="col" ><button class="btn btn-primary">VENDER</button></td>
            </form>
         </tr>
        <?php endforeach ?> 
    </table>
    </div>
    </div>
      <!-- Sidebar  -->
      <nav id="esquerdo">
            <!-- end sidebar -->
            <div class="tabela2" style="overflow-y: auto; overflow-x: hidden; height: 65vh;">
    <table class="table table-hover">
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">SUBTOTAL</th>
        </tr>
        <form class="formulario2" action="/Venda/final" onsubmit="abrirNovaJanela(event)" method="post">
        <tr>
         <?php $soma = 0;
         $troco=0;?>
        <?php foreach ($model2->linha as $itens): ?>
            <input type="hidden" name="idf" value="<?=$_SESSION['idf']?>">
            <input type="hidden" name="id_carrinho" value="<?=$itens->id_carrinho?>">
            <input type="hidden" name="quantidade" value="<?=$itens->quantidade?>">
            <input type="hidden" name="preco" value="<?=$itens->preco?>">
            <input type="hidden" name="codigo_barra" value="<?=$itens->codigo_barra?>">
            <td  width='100px'; scope="col"><?=$itens->nome?> </td>
            <td  width='100px'; scope="col"><?=$itens->quantidade?> </td>
            <td  width='100px'; scope="col"><?=number_format($itens->preco)."KZ"?> </td>
            <td  scope="col"> <a href="/Venda/removerID?codigo_barra=<?=$itens->codigo_barra?>" class="btn btn-danger">REMOVER</a> </td>
            <?php $soma += $itens->preco?>
         </tr>
        <?php endforeach ?>
        <div class="valores">
           <input type="hidden" name="soma" id="total" value="<?php echo $soma ?>">
        <p class="total"><b>Total: <?php echo number_format($soma)."KZ"?></b></p> 
        <p class="total troco"><b>Troco: </b></p>
        </div>
        <div class="input">
        <input type="text" name="cliente" class="" placeholder="NOME DO CLIENTE">
         <input type="number" name="valor" class="valor" placeholder="VALOR A PAGAR">
      </div>
      <br>
            <td scope="col">
            <a href="" target="_blank" style="display: none;" class="btn btn-success" id="btnVender" >VENDER</a>
         </td>
            <td scope="col"><a href="/fatura/performa"target="_blank" class="btn btn-primary">PERFORMA</a></td>
            <td scope="col"><a href="/venda/Apagar" class="btn btn-primary">NOVA VENDA</a></td>
            </form>
    </table>
    </div>
    </nav>
    </div>
   </body>
  <!-- jQuery -->
  <?php include "./View/Cabecalho/script.php" ?>
      <script>
         $(function(){
            $(".valor").change(function(){
               var valor_recebido=$(".valor").val()
               var total=$("#total").val()
               console.log(valor_recebido)
               console.log(total)
               if (valor_recebido>=total) {
                     $("#btnVender").css('display','flex')
                     $("#btnVender").prop('href',"/impressao/fatura?somatorio="+valor_recebido)
                    
                     trocando=valor_recebido-total
                     $(".troco b").text("Troco:"+trocando)
                  }else{
                     $("#btnVender").css('display','none')
                  }
            })
         });
      </script>
