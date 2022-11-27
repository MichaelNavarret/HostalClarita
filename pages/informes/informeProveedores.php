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
        $this->Cell(70,10,'Ficha de Proveedores',0,0,'C');

        //Salto de Linea
        $this->Ln(20);



        $this->Cell(10);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(35, 10, 'Rut Proveedor', 1, 0, 'C', 0); 
        $this->Cell(35, 10, 'Direccion', 1, 0, 'C', 0); 
        $this->Cell(48, 10, 'Nombre Proveedor', 1, 0, 'C', 0); 
        $this->Cell(35, 10, 'Id Rubro', 1, 1, 'C', 0);
    }
}

require 'cn.php';
$consulta = "SELECT * FROM proveedor";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10);
    $pdf->Cell(35, 10, $row['rutProveedor'], 1, 0, 'C', 0); 
    $pdf->Cell(35, 10, $row['direccion'], 1, 0, 'C', 0); 
    $pdf->Cell(48, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0); 
    $pdf->Cell(35, 10, $row['idRubro'], 1, 1, 'C', 0);
    //La 'C' es de Centrado
}
$pdf->Output('');

?>