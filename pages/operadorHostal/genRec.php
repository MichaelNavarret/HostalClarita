<?php
     include('../../php/connection.php');
     $arreglo = $_GET;
     $arreglo2 = $_GET;
     $rutOperador = $_GET["rutOperador"];
     $idOrden = $_GET["idOrden"];
     $i=0;
     foreach($arreglo as &$valor){
        if($i<2){
            $campo = next($arreglo);
        }
        if($i>1){
            $campo = next($arreglo);
            if($valor!=1){
                if($valor == -2){
                    $estado = "rechazada";
                }else if($valor == -1){
                    $estado = "aceptada";
                }else if($campo == 0){
                    $observacion = $valor;
                }
            }
        }
        $i++;
    }
    /*SE CREA LA ORDEN DE RECEPCION*/
    $crearOrdenRecepcion = "INSERT INTO OrdenRecepcion (idOrdenPedido, rutOperador, estado, fechaRecepcion, observacion) 
                 VALUES ($idOrden, '$rutOperador', '$estado', GETDATE(), '$observacion');";
    sqlsrv_query($conn, $crearOrdenRecepcion);
    $i=0;
    /* OBTENER ID ORDEN RECEPCION */
    $obtenerID = "SELECT TOP 1 idOrdenRecepcion ID FROM OrdenRecepcion ORDER BY fechaRecepcion DESC;";
    $ejecutar = sqlsrv_query($conn, $obtenerID);
    while($fila=sqlsrv_fetch_array($ejecutar)){
        $idOrdenRecep = $fila["ID"];
        /*SE INTEGRAN LOS PRODUCTOS A  LA ORDEN DE RECEPCION*/
        foreach($arreglo2 as &$valor2){
            if($i<2){
                $campo2 = next($arreglo2);
            }
            if($i>1){
                $campo2 = next($arreglo2);
                if($campo2==1 ){
                    $insertarProducto = "   INSERT INTO OrdenRecepcion_Producto (idOrdenRecepcion, idProducto, estado) 
                                            VALUES ($idOrdenRecep, $valor2, 'aceptado');";
                    sqlsrv_query($conn, $insertarProducto);
                }else if($valor2 > -1 && $campo2 != 0){
                    $insertarProducto = "   INSERT INTO OrdenRecepcion_Producto (idOrdenRecepcion, idProducto, estado) 
                                            VALUES ($idOrdenRecep, $valor2, 'rechazado');";
                    sqlsrv_query($conn, $insertarProducto);
                    
                }
            }
            $i++;
        }
    }
    header("Location: ordenesCompra.php?rutOperador=".$rutOperador);
?>