<?php
    include("../../php/connection.php");
    print_r($_POST);
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $clave = $_POST["clave"];
    $idRubro = $_POST["rubro"];
    $rutProv = $_POST["rutProv"];
    $rutLog = $_POST["rutAdministrador"];

    $editarProveedor = "UPDATE Proveedor 
                        SET nombre = '$nombre', direccion = '$direccion', idRubro = $idRubro
                        WHERE rutProveedor = '$rutProv';";
    sqlsrv_query($conn, $editarProveedor);

    $editarUsuario ="   UPDATE Usuario
                        SET clave = '$clave'
                        WHERE rutUsuario = '$rutProv';";
    sqlsrv_query($conn, $editarUsuario);
    header("Location: listarProveedores.php?rutAdministrador=$rutLog");
?>