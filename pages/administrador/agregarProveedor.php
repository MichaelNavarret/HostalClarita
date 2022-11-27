<?php
    include("../../php/connection.php");
    print_r($_POST);
    $runProv = $_POST["rutProv"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $clave = $_POST["clave"];
    $rubro = $_POST["rubro"];
    $rutLog = $_POST["rutAdministrador"];

    #Insertar Proveedor
    $consulta = "INSERT INTO Proveedor VALUES ('$runProv', '$direccion', '$nombre', 6);";
    $ejecutar = sqlsrv_query($conn, $consulta);
    if($ejecutar){
        #Insertar Usuario
        $insertarUsuario = "INSERT INTO Usuario VALUES ('$runProv','$clave','PRO');";
        sqlsrv_query($conn, $insertarUsuario);
    }
    
    header("Location: listarProveedores.php?rutAdministrador=$rutLog");
?>