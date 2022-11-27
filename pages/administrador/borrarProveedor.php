<?php
    include('../../php/connection.php');
    print_r($_GET);
    if(isset($_GET['rutProveedor'])){

    }
    $rutLog = $_GET["rutProveedor"];
    $rutAdm =  $_GET["rutAdministrador"];
    $consulta = "SELECT idOrdenPedido ID_ORDEN FROM OrdenPedido WHERE rutProveedor = '$rutLog';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    $i=0;
    while($fila=sqlsrv_fetch_array($ejecutar)){
        $idOrden = $fila["ID_ORDEN"];
        $borrarEnlace = "DELETE FROM OrdenPedido_Producto WHERE idOrdenPedido = $idOrden;";
        sqlsrv_query($conn, $borrarEnlace);
    }
    $borrarOrden = "DELETE FROM OrdenPedido WHERE rutProveedor = '$rutLog';";
    sqlsrv_query($conn, $borrarOrden);
    $borrarProductos = "DELETE FROM PRODUCTO WHERE rutProveedor = '$rutLog';"; 
    sqlsrv_query($conn, $borrarProductos);
    $borrarProveedores = "DELETE FROM PRoveedor WHERE rutProveedor = '$rutLog';"; 
    sqlsrv_query($conn, $borrarProveedores);
    $borrarUsuario = "DELETE FROM USUARIO WHERE rutUsuario = '$rutLog';";
    sqlsrv_query($conn, $borrarUsuario);
    header("Location: listarProveedores.php?rutAdministrador=$rutLog");
?>