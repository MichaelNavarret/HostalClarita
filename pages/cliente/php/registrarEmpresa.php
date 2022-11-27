<?php
    include("../../../php/connection.php");
    $nombre = $_POST["name"];
    $correo = $_POST["email"];
    $psw = $_POST["pass"];
    $rut = $_POST["rut"];
    $numero = $_POST["number"];
    $direccion = $_POST["direc"];

    $consulta = "INSERT INTO EMPRESA (rutEmpresa, correo, clave, nombre, direccion, numero) 
                            VALUES   ('$rut', '$correo', '$psw', '$nombre', '$direccion', '$numero'); ";
    sqlsrv_query($conn, $consulta);

    header("Location: ../../../index.php");
?>