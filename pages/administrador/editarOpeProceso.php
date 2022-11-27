<?php
    include("../../php/connection.php");
    print_r($_POST);
    $nombre = $_POST["nombre"];
    $apellidoPat = $_POST["apellidoPat"];
    $apellidoMat = $_POST["apellidoMat"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $clave = $_POST["clave"];
    if($_POST["habilitado"] == 1){
        $habilitado = "S";
    }else{
        $habilitado = "N";
    }
    $rutProv = $_POST["rutProv"];
    $rutLog = $_POST["rutAdministrador"];

    $editarOperador = "UPDATE OperadorHostal
                        SET nombre = '$nombre', apellidoPat = '$apellidoPat', apellidoMat = '$apellidoMat', habilitado = '$habilitado', correo = '$correo', numero = '$telefono'
                        WHERE rutOperador = '$rutProv';";
    sqlsrv_query($conn, $editarOperador);

    $editarUsuario ="   UPDATE Usuario
                        SET clave = '$clave'
                        WHERE rutUsuario = '$rutProv';";
    sqlsrv_query($conn, $editarUsuario);
    header("Location: listarOperadores.php?rutAdministrador=$rutLog");
/*
    $editarProveedor = "UPDATE Proveedor 
                        SET nombre = '$nombre', direccion = '$direccion', idRubro = $idRubro
                        WHERE rutProveedor = '$rutProv';";
    sqlsrv_query($conn, $editarProveedor);

    $editarUsuario ="   UPDATE Usuario
                        SET clave = '$clave'
                        WHERE rutUsuario = '$rutProv';";
    sqlsrv_query($conn, $editarUsuario);
    header("Location: listarProveedores.php?rutAdministrador=$rutLog");*/
?>