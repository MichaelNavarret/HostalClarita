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
    $this->Cell(70);
    //Título
    $this->Cell(60,10,'Listado de Proveedores',1,0,'C');
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
    $this->Cell(35);
    foreach($header as $col)
        
        switch ($j){
            case 1:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 2:
                $this->Cell(35,7,$col,1);
                $j++;
                break;
            case 3:
                $this->Cell(65,7,$col,1);
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
        $consulta = "SELECT	P.rutProveedor RUT,
                                P.nombre PROVEEDOR,
                                R.nombre RUBRO
                        FROM Proveedor AS P
                        JOIN Rubro AS R On P.idRubro = R.idRubro
                        ORDER BY R.nombre DESC;";
        $ejecutar = sqlsrv_query($conn, $consulta);
        $i=0;
        
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $this->Cell(35);
            $rut = $fila["RUT"];
            $proveedor = $fila["PROVEEDOR"];
            $rubro = $fila["RUBRO"];
            $i++;
            $this->Cell(25,7,"$rut",1);
            $this->Cell(35,7,"$proveedor",1);
            $this->Cell(65,7,"$rubro",1);
            $this->ln();
        }  
   }
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('Rut Proveedor','Nombre Proveedor','Rubro');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(45);
//$pdf->AddPage();
$pdf->TablaSimple($header);
$pdf->Output();
?>