<?php

use PDF as GlobalPDF;

require('fpdf/fpdf.php');

class PDF extends FPDF
{

    function Header()
    {
        //La primera comilla es para el tipo de letra
        //La segunda para Letra ennegrecida
        //Y el número es para el tamaño de la letra
        $this->SetFont('Arial','B',18);

        //Esto es para mover el texto hacia la derecha
        $this->Cell(60);

        //Titulo
        $this->Cell(70,10,'Ficha de Huespedes',0,0,'C');

        //Salto de Linea
        $this->Ln(20);



        $this->Cell(-2);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(30, 10, 'nombre', 1, 0, 'C', 0); 
        $this->Cell(30, 10, 'apellido', 1, 0, 'C', 0); 
        $this->Cell(30, 10, 'Rut', 1, 0, 'C', 0); 
        $this->Cell(35, 10, 'F. Nacimiento', 1, 0, 'C', 0);
        $this->Cell(35, 10, 'Rut Empresa', 1, 0, 'C', 0); 
        $this->Cell(35, 10, 'N. Reserva', 1, 1, 'C', 0); 
    }
}

require 'cn.php';
$consulta = "SELECT * FROM huesped";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(-2);
    $pdf->Cell(30, 10, $row['nombre'], 1, 0, 'C', 0); 
    $pdf->Cell(30, 10, $row['apellido'], 1, 0, 'C', 0); 
    $pdf->Cell(30, 10, $row['rutHuesped'], 1, 0, 'C', 0); 
    $pdf->Cell(35, 10, $row['fechaNacimiento'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['rutEmpresa'], 1, 0, 'C', 0); 
    $pdf->Cell(35, 10, $row['idReserva'], 1, 1, 'C', 0); 
    //La 'C' es de Centrado
}
$pdf->Output('');

?>