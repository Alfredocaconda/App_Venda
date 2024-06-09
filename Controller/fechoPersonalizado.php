<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=venda',"root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
// Data atual
$data_atual = date("Y-m-d");
$factura = date("YmdHis");
require('../factura/fpdf.php');
    // Crie um novo objeto FPDF
    $pdf = new FPDF();

    // Adicione uma página
    $pdf->AddPage();
try {
    // Consulta para selecionar vendas feitas durante o dia atual
    $sql = "SELECT * FROM vvenda WHERE DATE(datavenda) = :data";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('data',$data_atual);
    $stmt->execute();
    
    // Verifica se há vendas
    if ($stmt->rowCount() > 0) {
        $conta=0;
        // Exibe as vendas
        // Defina a fonte e o tamanho do texto
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'YSJ Comercio e prestacao de servico', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Nif: 00324145BA043', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Bairro: Calossongo ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Benguela/Benguela  ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Contacto: 944902346', 0, 1, 'C');
        $pdf->Cell(0, 10, 'E-mail: ysjcomercial@gmail.com', 0, 1, 'C');
        $pdf->Ln();
        //apresentar informacoes
        $pdf->Cell(35,0,'============================FECHO PERSONALIZADO=================================', 0);
        $pdf->Ln();
        $pdf->Cell(10, 0, '', 0, 0, 'C');
        $pdf->Cell(20,-20,  'Data:' .$data_atual, 0, 0, 'C');
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
        $pdf->Cell(35, 10, 'Valor total da venda : '.$conta.' kz', 0); // Preço do produto
        $pdf->Ln();
        $pdf->Cell(35,10,'=========================================================================', 0);
        $pdf->Ln();
        $pdf->Cell(0,10,'Obrigado e volte sempre', 0, 1, 'C');
        $pdf->Ln();
         // Saída do documento
         $pdf->Output();
        }else{
            echo "<script>alert('Nenhuma venda feita');</script>";
        }
}
 catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
?>
