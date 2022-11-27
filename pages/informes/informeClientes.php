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
        $this->Cell(70,10,'Ficha de Clientes',0,0,'C');

        //Salto de Linea
        $this->Ln(20);



        $this->Cell(10);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(38, 10, 'Nombre Usuario', 1, 0, 'C', 0);  
        $this->Cell(40, 10, 'Contrasena Usuario', 1, 0, 'C', 0);
        $this->Cell(38, 10, 'Nombre Empresa', 1, 0, 'C', 0);  
        $this->Cell(38, 10, 'Direccion Empresa', 1, 0, 'C', 0); 
        $this->Cell(38, 10, 'Correo Empresa', 1, 1, 'C', 0); 
    }
}

require 'cn.php';
$consulta = "SELECT U.nombreUsuario, U.CONTRASENA, E.NOMBRE, E.DIRECCION, E.CORREO FROM USUARIO AS U
		JOIN EMPRESA AS E ON U.RUTEMPRESA=E.RUTEMPRESA";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10);
    $pdf->Cell(38, 10, utf8_decode($row['nombreUsuario']), 1, 0, 'C', 0); 
    $pdf->Cell(40, 10, $row['contraseña'], 1, 0, 'C', 0);
    $pdf->Cell(38, 10, $row['nombre'], 1, 0, 'C', 0); 
    $pdf->Cell(38, 10, $row['direccion'], 1, 0, 'C', 0); 
    $pdf->Cell(38, 10, $row['correo'], 1, 1, 'C', 0);  
    //La 'C' es de Centrado
}
$pdf->Output('');

?>