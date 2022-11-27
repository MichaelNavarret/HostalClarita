<?php
    include('../../php/connection.php');
    $operador = $_GET["operador"];
    $idReserva = $_GET["idReserva"];
    $accion = $_GET["accion"];
    if($accion == 1){
        $consulta = "   UPDATE EstadoReserva
                        SET idEstado = 3
                        WHERE idReserva = $idReserva";
        $mensaje = "La reserva número ".$idReserva." se ha activado con éxito.";
    }else if($accion == 2){
        $consulta = "   UPDATE EstadoReserva
                        SET idEstado = 4
                        WHERE idReserva = $idReserva";
        $liberar = "UPDATE Habitacion
                    SET idEstadoHabitacion = 1, idReserva = NULL
                    WHERE idReserva = $idReserva";
        $mensaje = "La reserva número ".$idReserva." ha terminado satisfactoriamente.";
    }else{
        $consulta = "   UPDATE EstadoReserva
                        SET idEstado = 2
                        WHERE idReserva = $idReserva";
        $liberar = "UPDATE Habitacion
                    SET idEstadoHabitacion = 1, idReserva = NULL
                    WHERE idReserva = $idReserva";
        $mensaje = "La reserva número ".$idReserva." ha sido cancelada.";
    }
    sqlsrv_query($conn, $consulta);
    sqlsrv_query($conn, $liberar);
    header("Location: detalleReserva.php?rutOperador=".$operador."&idReserva=".$idReserva."&mensaje=".$mensaje);
?>