<?php
    include("../../php/connection.php");
    print_r($_GET);
    $codigo = $_GET["idOrden"];
    $rutLog = $_GET["rutProveedor"];

    $actualizarOrden = "UPDATE OrdenPedido
                        SET estado = 'Aceptada'
                        WHERE idOrdenPedido = $codigo;";
    sqlsrv_query($conn,$actualizarOrden);
    $obtenerOrdenProducti = "SELECT idProducto PRODUCTO, cantidad CANT FROM OrdenPedido_Producto WHERE idOrdenPedido = $codigo;";
    $orden = sqlsrv_query($conn,$obtenerOrdenProducti);
    $i=0;
    while($fila=sqlsrv_fetch_array($orden)){
        $idProducto = $fila["PRODUCTO"];
        $cantidad = $fila["CANT"];
        $descontarStock = " UPDATE Producto
                            SET stock = (stock-$cantidad)
                            WHERE idProducto = $idProducto";
        sqlsrv_query($conn,$descontarStock);
        $i++;
    }
    header("Location: listarOrdenes.php?rutProveedor=$rutLog");
?>
