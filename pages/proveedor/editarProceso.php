<?php
    include("../../php/connection.php");
    print_r($_POST);
    if(!isset($_POST['update'])){
        header("Location: listarProductos.php");
    }
    $n_valor = $_POST['valorPro'];
    $n_stock = $_POST['stockPro'];
    $n_stockCritico = $_POST['stockCritico'];
    $codigo = $_POST['codigoPro'];
    $rutLog = $_POST['usuario'];
    $consulta = "   UPDATE Producto
                    SET valor = $n_valor, 
                        stock = $n_stock,
                        stockCritico = $n_stockCritico
                    WHERE codigo = '$codigo';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    header("Location: listarProductos.php?rutProveedor=$rutLog");
?>