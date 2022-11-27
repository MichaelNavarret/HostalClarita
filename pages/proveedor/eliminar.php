<?php
    include('../../php/connection.php');

    if(isset($_GET['codigo'])){

    }
    $codigo = $_GET['codigo'];
    $rutLog = $_GET["rutProveedor"];
    $consulta = "   DELETE FROM Producto
                    WHERE codigo = '$codigo';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    header("Location: listarProductos.php?rutProveedor=$rutLog");
?>