<?php
    include('../../php/connection.php');

    if(isset($_GET['codigo'])){

    }
    $codigo = $_GET['codigo'];
    $consulta = "   DELETE FROM Producto
                    WHERE idProducto = '$codigo';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    header("Location: listarProductos.php");
?>