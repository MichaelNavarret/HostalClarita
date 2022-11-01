<?php
    include("../../php/connection.php");
    print_r($_POST);
    if(!isset($_POST['update'])){
        header("Location: listarProductos.php");
    }
    $n_valor = $_POST['valorPro'];
    $n_stock = $_POST['stockPro'];
    $codigo = $_POST['codigoPro'];
    $consulta = "   UPDATE Producto
                    SET valor = $n_valor, 
                        stock = $n_stock
                    WHERE idProducto = '$codigo';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    header("Location: listarProductos.php");
?>