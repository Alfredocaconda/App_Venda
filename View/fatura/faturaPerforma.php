<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Factura Performa</title>
   <link rel="stylesheet" href="../fatura/style.css">
   <style>
    
    .base{
        font-size: 12px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        display: flex;
        height: 90vh;
        justify-content: center;
        .container{
            width: 100%;
            border: 1px solid dimgray;
            padding: 20px;
            border-radius: 8px;
            .dados_empresa{
                text-align: center;
                h3{
                    line-height: 0;
                }
            }
            .tabela{
                table{
                    width: 100%;
                    border-spacing: 0;
                    thead{
                        tr{
                            th{
                                text-align: left;
                            }
                        }
                    }
                }
            }
        }
    }
   </style>
</head>

<body>
   <div class="base">
        <div class="container">
            <div class="dados_empresa">
                <h3>nome da empresa</h3>
                <h3>contacto</h3>
                <h3>email</h3>
                <h3>endereco</h3>
            </div>
   
            <div class="tabela">
                
            <table class="table table-hover">
                <?php $soma=0;?>
                <thead>
                <tr>
                <th scope="col">NOME</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">SUBTOTAL</th>
                </tr>
                    
                </thead>
                <tbody>
                <?php foreach ($model2->linha as $itens): ?>
                <tr>
                    <td scope="col"><?=$itens->nome?> </td>
                    <td scope="col"><?=$itens->descricao?> </td>
                    <td scope="col"><?=$itens->preco?></td>
                    <td scope="col"><?=$itens->quantidade?></td>
                    <td scope="col"><?=number_format($itens->preco)."KZ"?> </td>
                    <?php $soma += $itens->preco?>
                </tr>
                <?php endforeach ?>

                </tbody>
                </table>
                <div class="total">
                    <h4 ><p><b>Total: <?php echo number_format($soma)."KZ"?></b></p></h4>
                    <h4 ><p><b>VAlor pago: <?php echo number_format($soma)."KZ"?></b></p></h4>
                    <h4 ><p><b>Troco: <?php echo number_format($soma)."KZ"?></b></p></h4>
                </div>
                 <p>funcionario: <?= $_SESSION['nome'] ?></p>
               
            </div>
        </div>
     
   </div>

</body>
</html>