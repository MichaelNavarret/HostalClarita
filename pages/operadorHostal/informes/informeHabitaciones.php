<?php
require('../../../fpdf/fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Arial bold 15
    $this->SetFont('Arial','B',12);
    //Movernos a la derecha
    $this->Cell(35);
    //Título
    $this->Cell(60,10,'Listado de Habitaciones',1,0,'C');
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
            $this->Cell(35,7,$col,1);
            $j++;
        }else{
            $this->Cell(30,7,$col,1);
            $j++;
        }
        
        $this->Ln();
        include("../../../php/connection.php");
        $consultaDatos = "  SELECT	H.idHabitacion ID,
                                    EH.nombre ESTADO,
                                    CASE 
                                        WHEN H.idReserva IS NULL THEN 'Sin Reserva'
                                        ELSE CONVERT(VARCHAR,H.idReserva)
                                    END AS CODIGORESERVA,
                                    TP.nombre TIPO
                                    
                            FROM Habitacion AS H
                            JOIN EstadoHabitacion AS EH ON H.idEstadoHabitacion = EH.idEstadoHabitacion
                            JOIN TipoHabitacion AS TP ON H.idTipoHabitacion = TP.idTipoHabitacion;";
        $ejectuar = sqlsrv_query($conn, $consultaDatos);
        $i=0;
        while($fila=sqlsrv_fetch_array($ejectuar)){
            $id = $fila["ID"];
            $estado = $fila["ESTADO"];
            $codigoReserva = $fila["CODIGORESERVA"];
            $tipo = $fila["TIPO"];
            $i++;
            $this->Cell(35,7,"$id",1);
            $this->Cell(35,7,"$estado",1);
            $this->Cell(35,7,"$codigoReserva",1);
            $this->Cell(35,7,"$tipo",1);
            $this->ln();
        }
   }
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('ID','Estado','Codigo Reserva','Tipo');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(45);
//$pdf->AddPage();
$pdf->TablaSimple($header);
$pdf->Output();
?>