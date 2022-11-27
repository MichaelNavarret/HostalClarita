<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    $rutLog = $_GET["rutOperador"];
    $consultarHabilitacion =  "SELECT habilitado HAB FROM OperadorHostal
                                WHERE rutOperador = '$rutLog';";
    $ejecutar = sqlsrv_query($conn, $consultarHabilitacion);
    $i=0;
    while($fila=sqlsrv_fetch_array($ejecutar)){
        $habilitado = $fila["HAB"];
        $i++;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Proveedores - Hostal Doña Clarita</title>
    
    <link rel="icon" href="img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg">
    <link rel="stylesheet" type = "text/css" href="../../css/operador/habitaciones.css">
    <script src="../../js/scripts.js"></script>
</head>
<body>
    
    <div id ="container">
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// MENU -->
        <nav id="menu">
            <ul id ="ul01" >
                <li><a href="portalOperador.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Inicio</a> </li>
                <li>
                    <a href="consultarReserva.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Reservas </a>
                </li>
                <li>
                    <a href="consultarHabitaciones.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Habitaciones </a>
                </li>
                <?php
                    if($habilitado == 'S'){
                        ?>
                        <li>
                            <a href="ordenesCompra.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Orden de Compra </a>
                        </li>
                        <li>
                            <a href="listarOrdenesRec.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Orden de Recepcion </a>
                        </li>
                        <?php
                    }
                ?>
                <li>
                    <a href="mensajes.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Mensajes </a>
                </li>
                <li>
                    <a href="informes.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>">Informes </a>
                </li>
            </ul>
            <ul>
                <li><a id ="salir" href="../../index.php">Salir</a> </li>
            </ul>
            
        </nav>
        <div class="clearFix"></div>

        <div id ="miniBanner">
            <h2>Habitaciones</h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <div class ="mainContainerDetalles">
            <div class="panel-body">
                <div class ="panelInfo" id="empresa">
                        <h3>Información Habitaciones</h3>
                    <table id ="tablaReservas">
                        <tr id="cabeceraTabla">
                            <td>N° Habitación</td>
                            <td>Estado Habitación</td>
                            <td>Código Reserva</td>
                            <td>Tipo habitación</td>
                        </tr>
                    <?php
                        $consultaDatos = "  SELECT	H.idHabitacion ID,
                                                    EH.nombre ESTADO,
                                                    CASE 
                                                        WHEN H.idReserva IS NULL THEN 'Sin Reserva'
                                                        ELSE CONVERT(VARCHAR,H.idReserva)
                                                    END AS CODIGORESERVA,
                                                    TP.nombre TIPO
                                                    
                                            FROM Habitacion AS H
                                            JOIN EstadoHabitacion AS EH ON H.idEstadoHabitacion = EH.idEstadoHabitacion
                                            JOIN TipoHabitacion AS TP ON H.idTipoHabitacion = TP.idTipoHabitacion;";
                        $ejectuar = sqlsrv_query($conn, $consultaDatos);
                        $i=0;
                        while($fila=sqlsrv_fetch_array($ejectuar)){
                            $id = $fila["ID"];
                            $estado = $fila["ESTADO"];
                            $codigoReserva = $fila["CODIGORESERVA"];
                            $tipo = $fila["TIPO"];
                            $i++;
                            ?>
                            <tr id="contenidoTabla">
                                <td><?php echo($id); ?></td>
                                <td><?php echo($estado); ?></td>
                                <td><?php echo($codigoReserva); ?></td>
                                <td><?php echo($tipo); ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                    </table>
                
            </div>
        </div>  
    </div>
 
</body>
</html>