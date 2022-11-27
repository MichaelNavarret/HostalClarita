<?php
    include("../../php/connection.php");
    if($_POST["datePro"] == ""){
        $rut = $_POST["usuario"];
        $name = $_POST["namePro"];
        $valor = $_POST["valorPro"];
        $familia = $_POST["familiaPro"];
        $stock = $_POST["stockPro"];
        $stockCritico = $_POST["stockCritico"];
        $consulta = "   INSERT INTO Producto (nombre, valor, rutProveedor, familia, stock, stockCritico, codigo)
                        VALUES ('$name', $valor, '$rut', '$familia', $stock, $stockCritico, 0);";
        $consulta2 = "  UPDATE Producto
                        SET codigo = (SELECT SUBSTRING(rutProveedor, 1, 3) 
                                            + UPPER(SUBSTRING(familia,1,3))
                                            + ISNULL(CONVERT(VARCHAR,fechaVencimiento,112),'00000000') 
                                            + UPPER(SUBSTRING(nombre,1,1))
                                            + CONVERT(VARCHAR, idProducto)
                                        FROM Producto
                                        WHERE nombre = '$name')
                        WHERE nombre = '$name';";
        
    }else{
        $rut = $_POST["usuario"];
        $fecha = $_POST["datePro"];
        $name = $_POST["namePro"];
        $valor = $_POST["valorPro"];
        $familia = $_POST["familiaPro"];
        $stock = $_POST["stockPro"];
        $stockCritico = $_POST["stockCritico"];
        $consulta = "   INSERT INTO Producto ( nombre, valor, rutProveedor, familia, fechaVencimiento, stock, stockCritico, codigo)
                        VALUES ('$name', $valor, '$rut', '$familia', '$fecha' ,$stock, $stockCritico, 0);";
        $consulta2 = "  UPDATE Producto
        SET codigo = (SELECT SUBSTRING(rutProveedor, 1, 3) 
                            + UPPER(SUBSTRING(familia,1,3))
                            + ISNULL(CONVERT(VARCHAR,fechaVencimiento,112),'00000000') 
                            + UPPER(SUBSTRING(nombre,1,1))
                            + CONVERT(VARCHAR, idProducto)
                        FROM Producto
                        WHERE nombre = '$name')
        WHERE nombre = '$name';";
    }
    $ejectuar=sqlsrv_query($conn,$consulta);
    $ejectuar2=sqlsrv_query($conn,$consulta2);
    header("Location: listarProductos.php?rutProveedor=$rut");
?>