<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

    }else if(isset($_POST['Cerrar'])){
        
    }else{
        $rutLog = $_GET["rutOperador"];
        $consultarHabilitacion =  "SELECT habilitado HAB FROM OperadorHostal
                                WHERE rutOperador = '$rutLog';";
        $ejecutar = sqlsrv_query($conn, $consultarHabilitacion);
        $i=0;
        while($fila=sqlsrv_fetch_array($ejecutar)){
            $habilitado = $fila["HAB"];
            $i++;
        }
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
    <link rel="stylesheet" type = "text/css" href="../../css/operador/consultarReserva.css">
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
            <h2>Consultar Reserva </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// BUSCADOR -->
        <div class ="filtros">
            <form action="" method ="post" id ="filtros" name="filtros">
                <div class="campo">
                    <input type="text" name="contBuscador" id="contBuscador" placeholder="Ingrese rut a buscar">
                </div>
                <div class ="campo">
                    <input type="submit" value="Buscar" name="btn" id="btn">
                </div>
            </form>
        </div>
        <div class="clearFix"></div>
        <br>
        <button id="generarReserva">Generar Reserva Local</button>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <div class ="mainContainer">
            <dialog id="ingresarReserva">
                <button id="cerrar">Cerrar</button>
                <iframe src="../../index.php" frameborder="0" width="1600" height="800"></iframe>
            </dialog>

            <div class="reservas">
                <table id ="tablaReservas">
                    <tr id="cabeceraTabla">
                        <td>ID Reserva</td>
                        <td>Fecha Reserva</td>
                        <td>Fecha Inicio Reserva</td>
                        <td>Fecha Termino Reserva</td>
                        <td>Costo Reserva</td>
                        <td>Usuario</td>
                        <td>ESTADO</td>
                    </tr>
                <?php
                    if(isset($_POST['btn'])){
                        $contBuscador = $_POST['contBuscador'];
                        $consulta = "SELECT	R.idReserva ID,
                                            CONVERT(VARCHAR,R.fechaReserva,111) FRESERVA,
                                            CONVERT(VARCHAR,R.fechaInicio,111) FINICIO,
                                            CONVERT(VARCHAR,R.fechaTermino,111) FTERMINO,
                                            FORMAT(R.costoTotal, '$ ### ###') COSTO,
                                            R.usuario USUARIO,
                                            E.nombre ESTADO
                                    FROM Reserva AS R
                                    JOIN EstadoReserva ES ON ES.idReserva = R.idReserva
                                    JOIN Estado E ON ES.idEstado = E.idEstado
                                    JOIN Empresa EM ON R.usuario = EM.correo
                                    WHERE R.idReserva LIKE '$contBuscador%' OR E.nombre LIKE '$contBuscador%' 
                                          OR R.usuario LIKE '$contBuscador%' OR EM.rutEmpresa LIKE '$contBuscador%'
                                    ORDER BY R.fechaReserva DESC;";
                    }else{
                        $consulta = "SELECT	R.idReserva ID,
                                        CONVERT(VARCHAR,R.fechaReserva,111) FRESERVA,
                                        CONVERT(VARCHAR,R.fechaInicio,111) FINICIO,
                                        CONVERT(VARCHAR,R.fechaTermino,111) FTERMINO,
                                        FORMAT(R.costoTotal, '$ ### ###') COSTO,
                                        R.usuario USUARIO,
                                        E.nombre ESTADO
                                FROM Reserva AS R
                                JOIN EstadoReserva ES ON ES.idReserva = R.idReserva
                                JOIN Estado E ON ES.idEstado = E.idEstado
                                ORDER BY R.fechaReserva DESC;";
                        
                    }
                    $ejecutar = sqlsrv_query($conn, $consulta);
                    $i=0;
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $id = $fila["ID"];
                        $fReserva = $fila["FRESERVA"];
                        $fInicio = $fila["FINICIO"];
                        $fTermino = $fila["FTERMINO"];
                        $costo = $fila["COSTO"];
                        $usuario = $fila["USUARIO"];
                        $estado = $fila["ESTADO"];
                        $i++;
                        ?>
                        <tr id="contenidoTabla">
                            <td id="inicio"><a href="detalleReserva.php?idReserva=<?php echo($id); ?>&rutOperador=<?php echo($rutLog); ?>"><?php echo($id); ?></a></td>
                            <td><?php echo($fReserva); ?></td>
                            <td><?php echo($fInicio); ?></td>
                            <td><?php echo($fTermino); ?></td>
                            <td><?php echo($costo); ?></td>
                            <td><?php echo($usuario); ?></td>
                            <td><?php echo($estado); ?></td>
                        </tr>
                        <?php
                    }
                ?>
                </table>
                <?php
                if($i == 0){
                        ?>
                        <h2>Los parametros de busqueda no coinciden con ningún resultado</h2>
                        <?php
                    }
                ?>
            </div>
            
        </div>

        
    </div>
 
</body>
<script src="../../js/scripts.js"></script>
</html>