<?php
// Algum código ou espaço em branco aqui
require('fpdf.php');
$pdf = new FPDF();
              #Adicionar Páginas:**
              $pdf->AddPage();
               #Definir Configurações da Página (Opcional):**
             $pdf->SetFont('Arial', 'B', 12);
 $pdf->Cell(0, 10, 'Farmacia Luz&Vida/Catumbela', 0, 1, 'C');
 $pdf->Cell(0, 10, 'Nif: 00000000BA000', 0, 1, 'C');
 $pdf->Cell(0, 10, 'Contacto: 935460590/955698784', 0, 1, 'C');
 $pdf->Cell(0, 10, 'E-mail: farmacialuzvida@gmail.com', 0, 1, 'C');
 $pdf->Ln();
 
?>
