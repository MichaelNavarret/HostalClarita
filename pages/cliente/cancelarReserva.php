<?php
    include("../../php/connection.php");
    $idReserva = $_GET["idReserva"];
    $user = $_GET["usuario"];
    echo($idReserva . $user);
    $consulta = "   UPDATE EstadoReserva
                    SET idEstado = 2
                    WHERE idReserva = $idReserva;";
    $liberar = "    UPDATE Habitacion
                    SET idEstadoHabitacion = 1, idReserva = NULL
                    WHERE idReserva = $idReserva";
    sqlsrv_query($conn, $consulta);
    header("Location: consultarReserva.php?usuario=".$user);
?>