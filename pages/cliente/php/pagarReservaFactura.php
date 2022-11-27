<?php
    print_r($_POST);
    include("../../../php/connection.php");
    $nombreCompleto = $_POST["NombreCompleto"];
    $email = $_POST["Email"];
    $direccion = $_POST["Direccion"];
    $ciudad = $_POST["Ciudad"];
    $comuna = $_POST["Comuna"];
    $codigoPostal  = $_POST["CodigoPostal"];
    $titular = $_POST["TitularTarjeta"];
    $usuario = $_POST["usuario"];
    $reserva = $_POST["idReserva"];
    $tipo = $_POST["tipoReserva"];
    if ($tipo == 1){
        $tipoName = "Individual";
        $total = 64990;
    }else{
        $tipoName = "Grupal";
        $total = 110000;
    }

    $insertarPago = "INSERT INTO PAGO (idReserva) VALUES ($reserva);";
    sqlsrv_query($conn,$insertarPago);

    $buscarId = "SELECT TOP 1 idPago ID FROM PAGO ORDER BY idPago DESC;";
    $ejectuar = sqlsrv_query($conn, $buscarId);
    $i=0;
    while ($fila=sqlsrv_fetch_array($ejectuar)){
        $idPago = $fila["ID"];
        $i++;
    }
    echo($idPago);
    echo($nombreCompleto);
    echo($direccion);
    echo($email);
    echo($tipoName);
    echo($total);
    $insertarFactura = "INSERT INTO FACTURA (idPago, lugar, cliente, direccion, correo, fecha, motivo, valor) 
                        VALUES ($idPago, 'Hosteleria Doña Clarita', '$nombreCompleto', '$direccion', '$email', GETDATE(), '$tipoName', $total);";
    sqlsrv_query($conn, $insertarFactura);

    $consulta = "   UPDATE EstadoReserva
                    SET idEstado = 1
                    WHERE idReserva = $reserva;";
    sqlsrv_query($conn, $consulta);
    header("Location: ../detalleReserva.php?idReserva=$reserva&usuario=$usuario");

?>