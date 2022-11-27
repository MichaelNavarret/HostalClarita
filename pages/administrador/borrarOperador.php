<?php
    include('../../php/connection.php');
    print_r($_GET);
    if(isset($_GET['rutProveedor'])){

    }
    $rutLog = $_GET["rutOperador"];
    $rutAdm =  $_GET["rutAdministrador"];
    $consulta = "SELECT idOrdenPedido ID_ORDEN FROM OrdenPedido WHERE rutOperador = '$rutLog';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    $i=0;
    while($fila=sqlsrv_fetch_array($ejecutar)){
        $idOrden = $fila["ID_ORDEN"];
        $borrarEnlace = "DELETE FROM OrdenPedido_Producto WHERE idOrdenPedido = $idOrden;";
        sqlsrv_query($conn, $borrarEnlace);
        $i++;
    }
    $borrarOrden = "DELETE FROM OrdenPedido WHERE rutOperador = '$rutLog';";
    sqlsrv_query($conn, $borrarOrden);
    $borrarProductos = "DELETE FROM PRODUCTO WHERE rutOperador = '$rutLog';"; 
    sqlsrv_query($conn, $borrarProductos);
    $borrarOperador = "DELETE FROM OperadorHostal WHERE rutOperador = '$rutLog';"; 
    sqlsrv_query($conn, $borrarOperador);
    $borrarUsuario = "DELETE FROM USUARIO WHERE rutUsuario = '$rutLog';";
    sqlsrv_query($conn, $borrarUsuario);
    header("Location: listarOperadores.php?rutAdministrador=$rutAdm");
?>