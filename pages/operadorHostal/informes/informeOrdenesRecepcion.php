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
    $this->Cell(50);
    //Título
    $this->Cell(60,10,'Listado de Ordenes de Recepcion',1,0,'C');
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
    $j=1;
    foreach($header as $col)
        switch ($j){
            case 1:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 2:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 3:
                $this->Cell(45,7,$col,1);
                $j++;
                break;
            case 4:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 5:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 6:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 7:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
        }
        
        $this->Ln();
        require('../../../php/connection.php');
        $consulta = "SELECT	ODR.idOrdenRecepcion ID_RECEPCION,
                                ODR.idOrdenPedido ID_PEDIDO,
                                OP.nombre + ' ' + OP.apellidoPat + ' ' + OP.apellidoMat NOMBRE,
                                CONVERT(VARCHAR, ODR.fechaRecepcion, 111) FECHA,
                                UPPER(ODR.estado) ESTADO
                        FROM OrdenRecepcion AS ODR
                        JOIN OperadorHostal AS OP ON ODR.rutOperador = OP.rutOperador
                        ORDER BY ODR.fechaRecepcion DESC;";
        $ejecutar = sqlsrv_query($conn, $consulta);
        $i=0;
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $idRe = $fila["ID_RECEPCION"];
            $idOr = $fila["ID_PEDIDO"];
            $operador = $fila["NOMBRE"];
            $fechaRe = $fila["FECHA"];
            $estado = $fila["ESTADO"];
            $i++;
            $this->Cell(25,7,"$idRe",1);
            $this->Cell(25,7,"$idOr",1);
            $this->Cell(45,7,"$operador",1);
            $this->Cell(25,7,"$fechaRe",1);
            $this->Cell(25,7,"$estado",1);
            $this->ln();
        }  
   }
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('ID_Recepcion','ID_Pedido','Operador','Fecha','Estado');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(45);
//$pdf->AddPage();
$pdf->TablaSimple($header);
$pdf->Output();
?>