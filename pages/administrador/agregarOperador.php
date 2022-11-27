<?php
    include("../../php/connection.php");
    print_r($_POST);
    $rutOperador = $_POST["idOpe"];
    $nombre = $_POST["nombre"];
    $apellidoPat = $_POST["apellidoPat"];
    $apellidoMat = $_POST["apellidoMat"];
    $fechaNac = $_POST["fechaNac"];
    $fechaCont = $_POST["fechaCon"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $clave = $_POST["clave"];
    if($_POST["habilitado"] == 1){
        $habilitado = "S";
    }else{
        $habilitado = "N";
    }
    $rutLog = $_POST["rutAdministrador"];

    echo("<br>".$rutOperador);
    echo("<br>".$nombre);
    echo("<br>".$apellidoPat);
    echo("<br>".$apellidoMat);
    echo("<br>".$fechaNac);
    echo("<br>".$fechaCont);
    echo("<br>".$correo);
    echo("<br>".$telefono);
    echo("<br>".$clave);
    echo("<br>".$habilitado);

    $insertarOperador ="INSERT INTO OperadorHostal VALUES ('$rutOperador','$nombre','$apellidoPat',
                                                            '$apellidoMat','$fechaNac','$fechaCont',
                                                            '$habilitado','$correo','$telefono');";
    sqlsrv_query($conn,$insertarOperador);

    $insertarUsuario ="INSERT INTO USUARIO VALUES ('$rutOperador', '$clave', 'OPE');";
    sqlsrv_query($conn,$insertarUsuario);
    header("Location: listarOperadores.php?rutAdministrador=$rutLog");
?>