<?php
require('../../../fpdf/fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Arial bold 15
    $this->SetFont('Arial','B',8);
    //Movernos a la derecha
    $this->Cell(60);
    //Título
    $this->Cell(60,10,'Listado de Reservas',1,0,'C');
    //Salto de línea
    $this->Ln(10);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    //Cabecera
    $j=0;
    foreach($header as $col)
        if($j!=5){
            $this->Cell(25,7,$col,1);
            $j++;
        }else{
            $this->Cell(30,7,$col,1);
            $j++;
        }
        
        $this->Ln();
        $consulta = "SELECT	R.idReserva ID,
                    CONVERT(VARCHAR,R.fechaReserva,111) FRESERVA,
                    CONVERT(VARCHAR,R.fechaInicio,111) FINICIO,
                    CONVERT(VARCHAR,R.fechaTermino,111) FTERMINO,
                    FORMAT(R.costoTotal, '$ ### ###') COSTO,
                    R.usuario USUARIO,
                    E.nombre ESTADO
                FROM Reserva AS R
                JOIN EstadoReserva ES ON ES.idReserva = R.idReserva
                JOIN Estado E ON ES.idEstado = E.idEstado
                ORDER BY R.fechaReserva DESC;";

                
        require('../../../php/connection.php');
        $ejecutar = sqlsrv_query($conn, $consulta);
        $i=0;
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $id = $fila["ID"];
            $fReserva = $fila["FRESERVA"];
            $fInicio = $fila["FINICIO"];
            $fTermino = $fila["FTERMINO"];
            $costo = $fila["COSTO"];
            $usuario = $fila["USUARIO"];
            $estado = $fila["ESTADO"];
            $i++;
            $this->Cell(25,7,"$id",1);
            $this->Cell(25,7,"$fReserva",1);
            $this->Cell(25,7,"$fInicio",1);
            $this->Cell(25,7,"$fTermino",1);
            $this->Cell(25,7,"$costo",1);
            $this->Cell(30,7,"$usuario",1);
            $this->Cell(25,7,"$estado",1);
            $this->ln();
        }  
   }
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('ID','Fecha Reserva','Fecha Inicio','Fecha Termino','Costo' ,'Usuario', 'Estado');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(45);
//$pdf->AddPage();
$pdf->TablaSimple($header);
$pdf->Output();
?>