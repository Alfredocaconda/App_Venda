<?php
class fechoDiario{
    public static function diario(){ 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=venda',"root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
// Data atual
$data_atual = date("Y-m-d");
require('./factura/fpdf.php');
    // Crie um novo objeto FPDF
    $pdf = new FPDF();
    $data_atual=$_GET['data'];
    // Adicione uma página
    $pdf->AddPage();
try {
    // Consulta para selecionar vendas feitas durante o dia atual
    $sql = "SELECT * FROM vvenda WHERE datavenda=? order by idv desc ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1,$data_atual);
    $stmt->execute();
    
    // Verifica se há vendas
    if ($stmt->rowCount() > 0) {
        $conta=0;
        // Exibe as vendas
        // Defina a fonte e o tamanho do texto
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'YSJ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Comercio e prestacao de servico', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Nif: 00324145BA043', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Bairro: Calossongo ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Benguela/Benguela  ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Contacto: 944902346', 0, 1, 'C');
        $pdf->Cell(0, 10, 'E-mail: ysjcomercial@gmail.com', 0, 1, 'C');
        $pdf->Ln();
        //apresentar informacoes
        $pdf->Cell(35,0,'============================FECHO DIARIO=================================', 0);
        $pdf->Ln();
        $pdf->Cell(10, 0, '', 0, 0, 'C');
        $pdf->Cell(20,-20,  'Data:' .$data_atual, 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(-10, 100, '', 0, 0, 'C');
        $pdf->Cell(50, 50, 'Produto', 0, 0, 'C');
        $pdf->Cell(10, 50, 'QTD', 0, 0, 'C');
        $pdf->Cell(26, 50, 'Subtotal', 0, 0, 'C');
        $pdf->Cell(20, 50, 'Data', 0, 0, 'C');
        $pdf->Cell(40, 50, 'Fatura', 0, 0, 'C');
        $pdf->Cell(30, 50, 'Funcionario', 0, 0, 'C');
        $pdf->Cell(10, 32, '', 0, 0, 'C');
        $pdf->Ln();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pdf->Cell(40, 10, $row['nome']."/".$row['nomec'], 0); // Nome do produto
            $pdf->Cell(15, 10, $row['qtdrequerida'], 0); // Preço do row
            $pdf->Cell(23, 10, number_format($row['totalCompra']).' KZ', 0); // Preço do row
            $pdf->Cell(25, 10, ($row['datavenda']), 0); // Preço do produto
            $pdf->Cell(35, 10, ($row['fatura']), 0); // Preço do produto
            $pdf->Cell(35, 10, ($row['nomef']), 0); // Preço do produto
            $pdf->Ln();
            $valortotal=$row['totalCompra'];
            $conta +=$valortotal;

        }
        $pdf->Cell(35, 10, 'Valor total da venda : '.number_format($conta).' kz', 0); // Preço do produto
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
}
}
?>
