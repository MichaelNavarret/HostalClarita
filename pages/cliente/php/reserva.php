<?php
    include("../../../php/connection.php");
    print_r($_POST);
    $tipo = $_POST["tipo"];
    $inicio = $_POST["checkin"];
    $termino = $_POST["checkout"];
    $usuario = $_POST["user"];
    $recibo = $_POST["recibo"];
    $obtenerRut = " SELECT rutEmpresa RUT
                    FROM Empresa
                    WHERE correo = '$usuario';";
    $ejectuar = sqlsrv_query($conn, $obtenerRut);
    $j=0;
    while($fila = sqlsrv_fetch_array($ejectuar)){
        $rutEmpresa = $fila["RUT"];
        $j++;
    }
    #HABITACIONES GRUPALES
    if($tipo == 2){
        $ninos = $_POST["children"];
        $arrayHuespedes = array (
            0 => $_POST["nombreHuesped1"],
            1 => $_POST["nombreHuesped2"],
            2 => $_POST["nombreHuesped3"]
        );
        $reserva = "INSERT  INTO RESERVA (fechaReserva, fechaInicio, fechaTermino, usuario, costoTotal, ninos) 
                            VALUES (GETDATE(), '$inicio', '$termino', '$usuario', 110000, $ninos);";
        sqlsrv_query($conn,$reserva);
        $consulta ="SELECT idReserva ID
                    FROM RESERVA
                    WHERE fechaInicio = '$inicio' AND fechaTermino = '$termino' AND usuario = '$usuario';";
        $ejectuar = sqlsrv_query($conn, $consulta);
        $i=0;
        while($fila = sqlsrv_fetch_array($ejectuar)){
            $idRe = $fila["ID"];
            $i++;
        }
        $asignarHabitacion = "  UPDATE TOP(1) Habitacion
                                SET idEstadoHabitacion = 2, idReserva = $idRe
                                WHERE idEstadoHabitacion = 1 AND idTipoHabitacion = 3;";
        sqlsrv_query($conn, $asignarHabitacion);
        $estadoReserva = "INSERT INTO EstadoReserva (idEstado, idReserva) VALUES (5, $idRe);";
        sqlsrv_query($conn, $estadoReserva);
        foreach($arrayHuespedes as $h){
            if($h != ""){
                $asignarHuespedes = " INSERT INTO HUESPED (rutEmpresa, idReserva, nombre) VALUES ('$rutEmpresa', $idRe, '$h');";
                sqlsrv_query($conn, $asignarHuespedes);
            }   
        }
        header("Location: ../pagos.php?reserva=$idRe&tipo=$tipo&usuario=$usuario&recibo=$recibo");
    #HABITACIONES INDIVIDUALES
    }else{
        $huesped = $_POST["nombreHuesped"];
        $reserva = "INSERT  INTO RESERVA (fechaReserva, fechaInicio, fechaTermino, usuario, costoTotal, ninos) 
                    VALUES (GETDATE(), '$inicio', '$termino', '$usuario', 64590, 0);";
        sqlsrv_query($conn,$reserva);
        $consulta ="SELECT idReserva ID
                    FROM RESERVA
                    WHERE fechaInicio = '$inicio' AND fechaTermino = '$termino' AND usuario = '$usuario';";
        $ejectuar = sqlsrv_query($conn, $consulta);
        $i=0;
        while($fila = sqlsrv_fetch_array($ejectuar)){
            $idRe = $fila["ID"];
            $i++;
        }
        $asignarHabitacion = "  UPDATE TOP(1) Habitacion
                                SET idEstadoHabitacion = 2, idReserva = $idRe
                                WHERE idEstadoHabitacion = 1 AND idTipoHabitacion = 2;";
        $asignarHuespedes = " INSERT INTO HUESPED (rutEmpresa, idReserva, nombre) VALUES ('$rutEmpresa', $idRe, '$huesped');";
        sqlsrv_query($conn, $asignarHabitacion);
        sqlsrv_query($conn, $asignarHuespedes);
        $estadoReserva = "INSERT INTO EstadoReserva (idEstado, idReserva) VALUES (5, $idRe);";
        sqlsrv_query($conn, $estadoReserva);
       header("Location: ../pagos.php?reserva=$idRe&tipo=$tipo&usuario=$usuario&recibo=$recibo");
    }
    
    /*
    $adultos = $_POST["adults"];
    $ninos = $_POST["children"];
    $inicio = $_POST["checkin"];
    $termino = $_POST["checkout"];
    $usuario = $_POST["user"];
    $informe = $_POST["informe-name"];
    $costo = 0;

    $reserva = "INSERT  INTO RESERVA (fechaReserva, fechaInicio, fechaTermino, adults, children, usuario) 
                        VALUES (GETDATE(), '$inicio', '$termino', $adultos, $ninos, '$usuario');";
    
    sqlsrv_query($conn,$reserva);
    $consulta ="SELECT idReserva ID
                FROM RESERVA
                WHERE fechaInicio = '$inicio' AND fechaTermino = '$termino' AND usuario = '$usuario';";
    $ejectuar = sqlsrv_query($conn, $consulta);
    $i=0;
    while($fila = sqlsrv_fetch_array($ejectuar)){
        $idRe = $fila["ID"];
        $i++;
    }
    if($informe == "01"){
        $asignarHabitacion = "  UPDATE TOP(1) Habitacion
                                SET idEstadoHabitacion = 2, idReserva = $idRe
                                WHERE idEstadoHabitacion = 1 AND idTipoHabitacion = 2;";
        $valorReserva = "UPDATE RESERVA
                            SET costoTotal = 30000
                            WHERE idReserva = $idRe";
        $costo = 30000;
    }else{
        $asignarHabitacion = "  UPDATE TOP(1) Habitacion
                                SET idEstadoHabitacion = 2
                                WHERE idEstadoHabitacion = 1 AND idTipoHabitacion = 3;";
        $valorReserva = "UPDATE RESERVA
                         SET costoTotal = 45000
                         WHERE idReserva = $idRe";
        $costo = 40000;
    }
    sqlsrv_query($conn, $asignarHabitacion);
    sqlsrv_query($conn, $valorReserva);
    $estadoReserva = "INSERT INTO EstadoReserva (idEstado, idReserva) VALUES (5, $idRe);";
    sqlsrv_query($conn, $estadoReserva);
    header("Location: ../pagos.php?reserva=$idRe&costo=$costo&usuario=$usuario");*/
?>