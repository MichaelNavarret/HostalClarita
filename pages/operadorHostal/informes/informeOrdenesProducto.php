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
    $this->Cell(60,10,'Listado de Ordenes de Producto',1,0,'C');
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
                $this->Cell(10,7,$col,1);
                $j++;
                break;
            case 2:
                $this->Cell(37,7,$col,1);
                $j++;
                break;
            case 3:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
            case 4:
                $this->Cell(57,7,$col,1);
                $j++;
                break;
            case 5:
                $this->Cell(20,7,$col,1);
                $j++;
                break;
            case 6:
                $this->Cell(20,7,$col,1);
                $j++;
                break;
            case 7:
                $this->Cell(25,7,$col,1);
                $j++;
                break;
        }
        $this->Ln();
        
        require('../../../php/connection.php');
        $consulta = "SELECT	OP.idOrdenPedido ID,
                                OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat OPERADOR,
                                P.nombre PROVEEDOR,
                                OP.detalle DETALLE,
                                CONVERT(VARCHAR,OP.fechaGenOrden,111 ) FECHAORDEN,
                                OP.estado ESTADO,
                                SUM(OPP.cantidad) PRODUCTOS
                        FROM OrdenPedido AS OP
                        JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                        JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                        JOIN Proveedor AS P ON OP.rutProveedor = P.rutProveedor
                        GROUP BY	OP.idOrdenPedido ,
                                    OP.detalle ,
                                    CONVERT(VARCHAR,OP.fechaGenOrden,111 ) ,
                                    OP.estado,
                                    OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat,
                                    P.nombre,
                                    OP.fechaGenOrden
                        ORDER BY OP.fechaGenOrden DESC;";
        $ejecutar = sqlsrv_query($conn, $consulta);
        $i=0;
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $id = $fila["ID"];
            $operador = $fila["OPERADOR"];
            $proveedor = $fila["PROVEEDOR"];
            $detalle = $fila["DETALLE"];
            $fOrden = $fila["FECHAORDEN"];
            $estado = $fila["ESTADO"];
            $productos = $fila["PRODUCTOS"];
            $i++;
            $this->Cell(10,7,"$id",1);
            $this->Cell(37,7,"$operador",1);
            $this->Cell(25,7,"$proveedor",1);
            $this->Cell(57,7,"$detalle",1);
            $this->Cell(20,7,"$fOrden",1);
            $this->Cell(20,7,"$estado",1);
            $this->Cell(25,7,"$productos",1);
            $this->ln();
        
        }
   }
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('ID','Operador','Proveedor','Detalle','Fecha Orden' ,'Estado', 'Nro Productos');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(45);
//$pdf->AddPage();
$pdf->TablaSimple($header);
$pdf->Output();
?>