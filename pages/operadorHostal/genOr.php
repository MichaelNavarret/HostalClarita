<?php
    include("../../php/connection.php");
    print_r($_GET);
    $arreglo = $_GET;
    $rutPro = $_GET["rutProveedor"];
    $rutLog = $_GET["rutOperador"];
    $detalle = $_GET["detalle"];
    /*CREAR ORDEN DE PRODUCTO*/
    $crearOrden = "INSERT INTO OrdenPedido (rutOperador, rutProveedor, detalle, fechaGenOrden, estado) VALUES ('$rutLog', '$rutPro', '$detalle', GETDATE(), 'Pendiente');";
    sqlsrv_query($conn, $crearOrden);
    /*OBTENER ID DE ORDEN RECIEN CREADA*/
    $obtenerID = "SELECT TOP 1 idOrdenPedido ID FROM OrdenPedido ORDER BY fechaGenOrden DESC;";
    $ejecutar = sqlsrv_query($conn, $obtenerID);
    while($fila=sqlsrv_fetch_array($ejecutar)){
        $idOrden = $fila["ID"];
    }
    
    $i=1;
    foreach($arreglo as &$valor){
        if($i > 3){
            if(($i % 2) == 0){
                /*INSERTANDO PRODUCTO A LA ORDEN*/
                $insertarProducto = "INSERT INTO OrdenPedido_Producto (idOrdenPedido, idProducto, cantidad) VALUES ($idOrden, $valor, 0);";
                $idProducto = $valor;
                sqlsrv_query($conn, $insertarProducto);
            }else{
                /*ACTUALIZANDO CANTIDAD A LA ORDEN*/
                $updateCantidad = " UPDATE OrdenPedido_Producto
                                    SET cantidad = $valor
                                    WHERE idOrdenPedido = $idOrden AND idProducto = $idProducto;";
                sqlsrv_query($conn, $updateCantidad);
            }
        }
        $i++;
    }

    $limpiarOrden = "DELETE FROM OrdenPedido_Producto WHERE cantidad = 0 AND idOrdenPedido = $idOrden";
    sqlsrv_query($conn, $limpiarOrden);
    header("Location: ordenesCompra.php?rutOperador=".$rutLog);
?>