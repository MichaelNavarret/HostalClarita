<?php
    include("../../php/connection.php");
    if($_POST["datePro"] == ""){
        $codigo = $_POST["codePro"];
        $name = $_POST["namePro"];
        $valor = $_POST["valorPro"];
        $familia = $_POST["familiaPro"];
        $stock = $_POST["stockPro"];
        $consulta = "   INSERT INTO Producto (idProducto, nombre, valor, rutProveedor, familia, stock)
                        VALUES ('$codigo', '$name', $valor, '128723132', '$familia', $stock);";
    }else{
        $fecha = $_POST["datePro"];
        $codigo = $_POST["codePro"];
        $name = $_POST["namePro"];
        $valor = $_POST["valorPro"];
        $familia = $_POST["familiaPro"];
        $stock = $_POST["stockPro"];
        $consulta = "   INSERT INTO Producto (idProducto, nombre, valor, rutProveedor, familia, fechaVencimiento, stock)
                        VALUES ('$codigo', '$name', $valor, '128723132', '$familia', '$fecha' ,$stock);";
    }
    $ejectuar=sqlsrv_query($conn,$consulta);
    header("Location: listarProductos.php");
?>