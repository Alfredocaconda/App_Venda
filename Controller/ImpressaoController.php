<?php
class imprimirController{
    public static function auth(){
        Middleware::auth();
    }
    public function __construct()
    {
        $this->auth();
    }

public static function fatura(){
// Conexão com o banco de dados (substitua os valores conforme necessário)
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=venda',"root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
    // Data atual
    $data_atual = date("Y-m-d");
    $factura = date("YmdHis");
    Middleware::auth();
    include('./factura/fpdf.php');
    // Crie um novo objeto FPDF
    $pdf = new FPDF();
    // Adicione uma página
    $pdf->AddPage();
    try {
        // Consulta para selecionar vendas feitas durante o dia atual
        $sql = "SELECT idstock,id_carrinho,preco_venda,idp,nome,descricao,qtd,SUM(vcarrinho.quantidade) as quantidade,SUM(vcarrinho.preco)
        as preco,codigo_barra,nomec FROM vcarrinho GROUP BY (codigo_barra) order by id_carrinho desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        // Verifica se há vendas
    if ($stmt->rowCount() > 0) {
        $conta=0;
        // Exibe as vendas
        // Defina a fonte e o tamanho do texto
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'NOME DA EMPRESA', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Nif: 00000000BA000', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Bairro: ..... ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Benguela/Benguela  ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Contacto: 935460590', 0, 1, 'C');
        $pdf->Cell(0, 10, 'E-mail: alfredocaconda3@gmail.com', 0, 1, 'C');
        $pdf->Ln();
        //apresentar informacoes
        $pdf->Cell(35,0,'============================FACTURA=================================', 0);
        $pdf->Ln();
        $pdf->Cell(60, -20, 'Factura n : ' .$factura, 0, 0, 'C');
        $pdf->Cell(10, 0, '', 0, 0, 'C');
        $pdf->Cell(160,-20,  'Data da Venda :' .$data_atual, 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(-10, 100, '', 0, 0, 'C');
        $pdf->Cell(40, 50, 'Produto', 0, 0, 'C');
        $pdf->Cell(46, 50, 'Preco Unitario', 0, 0, 'C');
        $pdf->Cell(40, 50, 'Quantidade', 0, 0, 'C');
        $pdf->Cell(30, 50, 'Total da Venda', 0, 0, 'C');
        $pdf->Cell(10, 32, '', 0, 0, 'C');
        $pdf->Ln();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $pdf->Cell(43, 10, $row['nome']."/".$row['nomec'], 0); // Nome do produto
                    $pdf->Cell(43, 10, number_format($row['preco_venda']).' KZ', 0); // Preço do row
                    $pdf->Cell(35, 10, $row['quantidade'], 0); // Preço do row
                    $pdf->Cell(35, 10, number_format($row['preco']).' KZ', 0); // Preço do produto
                    $pdf->Ln();
                    $valortotal=$row['preco'];
                    $conta +=$valortotal;
                }
        $valor=$_GET['somatorio'];
        $troco=$valor-$conta;
        $pdf->Ln();
        $pdf->Cell(0, 0, 'Valor total da venda : '.number_format($conta).' kz', 0,'C'); // Preço do produto
        $pdf->Cell(0, 12, 'Valor pago : '.number_format($valor).' kz', 0,'C'); // Preço do produto
        $pdf->Cell(0, 6, 'Troco : '.number_format($troco).' kz', 0,'C'); // Preço do produto
        $pdf->Ln();
        $pdf->Cell(35,10,'=========================================================================', 0);
        $pdf->Ln();
        $pdf->Cell(0,10,'FUNCIONARIO: '.$_SESSION['nome'], 0, 1, 'C');
        $pdf->Cell(0,10,'Software Processado pelo : PEDROLENGUE', 0, 1, 'C');
        $pdf->Ln();
        $pdf->Cell(0,10,'Obrigado e volte sempre', 0, 1, 'C');
        $pdf->Ln();
        // Saída do documento
        $pdf->Output();
    }else{
        echo "<script>alert('NENHUMA VENDA FEITA');</script>";
    }
    }
    catch (PDOException $e) {
     die("Erro na consulta: " . $e->getMessage());
    }
}
}
?>