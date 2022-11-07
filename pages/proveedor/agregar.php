<?php
    include("../../php/connection.php");
    if($_POST["datePro"] == ""){
        $name = $_POST["namePro"];
        $valor = $_POST["valorPro"];
        $familia = $_POST["familiaPro"];
        $stock = $_POST["stockPro"];
        $consulta = "   INSERT INTO Producto (nombre, valor, rutProveedor, familia, stock, codigo)
                        VALUES ('$name', $valor, '128723132', '$familia', $stock, 0);";
        $consulta2 = "  UPDATE Producto
                        SET codigo = (SELECT SUBSTRING(rutProveedor, 1, 3) 
                                            + SUBSTRING(familia,1,3) 
                                            + ISNULL(CONVERT(VARCHAR,fechaVencimiento,112),'00000000') 
                                            + SUBSTRING(nombre,1,1)
                                            + CONVERT(VARCHAR, idProducto)
                                        FROM Producto
                                        WHERE nombre = '$name')
                        WHERE nombre = '$name';";
        
        }else{
        $fecha = $_POST["datePro"];
        $name = $_POST["namePro"];
        $valor = $_POST["valorPro"];
        $familia = $_POST["familiaPro"];
        $stock = $_POST["stockPro"];
        $consulta = "   INSERT INTO Producto ( nombre, valor, rutProveedor, familia, fechaVencimiento, stock, codigo)
                        VALUES ('$name', $valor, '128723132', '$familia', '$fecha' ,$stock, 0);";
        $consulta2 = "  UPDATE Producto
        SET codigo = (SELECT SUBSTRING(rutProveedor, 1, 3) 
                            + SUBSTRING(familia,1,3) 
                            + ISNULL(CONVERT(VARCHAR,fechaVencimiento,112),'00000000') 
                            + SUBSTRING(nombre,1,1)
                            + CONVERT(VARCHAR, idProducto)
                        FROM Producto
                        WHERE nombre = '$name')
        WHERE nombre = '$name';";
    }
    $ejectuar=sqlsrv_query($conn,$consulta);
    $ejectuar2=sqlsrv_query($conn,$consulta2);
    header("Location: listarProductos.php");
?>