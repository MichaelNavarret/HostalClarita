<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

    }else{
        $rutLog = $_GET["rutOperador"];
        $id = $_GET["idReserva"];
        $consulta = "SELECT usuario USUARIO FROM Reserva WHERE idReserva = $id";
        $buscarUsuario = sqlsrv_query($conn, $consulta);
        while($fila = sqlsrv_fetch_array($buscarUsuario)){
            $usuarioReserva = $fila["USUARIO"];
        }
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
            <h2>Detalle Reserva: <?php echo($id); ?> </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <?php
            if(isset($_GET["mensaje"])){
                $mensaje = $_GET["mensaje"];
                ?>
                <div class="mensaje" id="mensaje">
                    <p><?php echo($mensaje); ?></p>
                    <button id= "btnMensaje" onclick="cerrarMensaje()">Cerrar</button>
                </div>
                <?php
            }
        ?>
        <div class ="mainContainerDetalles">
            <div class="panel-body">
                <div class ="panelInfo" id="empresa">
                    <?php 
                        $verTipo = "SELECT idEstado ESTADO FROM EstadoReserva WHERE idReserva = $id";
                        $ejecutar = sqlsrv_query($conn, $verTipo);
                        while($fila=sqlsrv_fetch_array($ejecutar)){
                            $estadoReserva = $fila["ESTADO"];
                        }
                        if($estadoReserva != 2 && $estadoReserva != 4){
                            ?>
                            <div class="check">
                                <a href="actualizarReserva.php?operador=<?php echo($rutLog); ?>&idReserva=<?php echo($id); ?>&accion=1" id="checkIn">Comenzar</a>
                                <a href="actualizarReserva.php?operador=<?php echo($rutLog); ?>&idReserva=<?php echo($id); ?>&accion=2" id="checkOut">Terminar</a>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="clearFix"></div>
                    <div class="titulo">
                        <h3>Información Cliente</h3>
                    </div>
                    <?php
                        $consultaDatos = "  SELECT  nombre NOMBRE,
                                                    rutEmpresa RUT,
                                                    correo EMAIL,
                                                    FORMAT(numero, '+569 #########') TELEFONO
                                            FROM EMPRESA
                                            WHERE correo = '$usuarioReserva';
                                            ";
                        $ejectuar = sqlsrv_query($conn, $consultaDatos);
                        $i=0;
                        while($fila=sqlsrv_fetch_array($ejectuar)){
                            $name = $fila["NOMBRE"];
                            $rut = $fila["RUT"];
                            $correo = $fila["EMAIL"];
                            $numero = $fila["TELEFONO"];
                            $i++;
                            ?>
                            <div class="campos">
                                <p class ="nombreCampo" >Nombre Cliente</p>
                                <p class ="contentCampo"><?php echo(utf8_encode($name)); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo">Rut </p>
                                <p class ="contentCampo"><?php echo($rut); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo">Correo </p>
                                <p class ="contentCampo"><?php echo($correo); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo">Teléfono</p>
                                <p class ="contentCampo"><?php echo($numero); ?></p>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="titulo">
                      <h3>Información Huespedes</h3>
                    </div>
                    <?php
                        $consultaHuesped = "SELECT	H.nombre HUESPED,
                                                    R.ninos NINOS
                                            FROM HUESPED AS H
                                            JOIN Reserva AS R ON H.idReserva = R.idReserva
                                            WHERE H.idReserva = $id;";
                        $ejec2 = sqlsrv_query($conn, $consultaHuesped);
                        $h=0;
                        while($fila = sqlsrv_fetch_array($ejec2)){
                            $huesped = $fila["HUESPED"];
                            $ninos = $fila["NINOS"];
                            ?>
                            <div class="campos">
                                <p class ="nombreCampo">Nombre Huesped <?php echo($h+1) ?></p>
                                <p class ="contentCampo"><?php echo($huesped); ?></p>
                            </div>
                            <?php
                            $h++;
                        }
                    ?>
                    <div class="campos">
                        <p class ="nombreCampo">Cantidad Niños</p>
                        <p class ="contentCampo"><?php echo($ninos); ?></p>
                    </div>
                </div>
                <div class ="panelInfo">
                    <div class="titulo">
                        <h3>Información Reserva</h3>
                    </div>
                    <?php
                        $consulta = "SELECT	CONVERT(VARCHAR,fechaReserva,111) FRESERVA,
                                            CONVERT(VARCHAR,fechaInicio,111) FINICIO,
                                            CONVERT(VARCHAR,fechaTermino,111) FTERMINO,
                                            ES.idEstado IDESTADO,
                                            ES.nombre ESTADO,
                                            FORMAT(R.costoTotal,'$ ### ###') COSTO,
                                            R.ninos NINOS
                                    FROM RESERVA AS R
                                    JOIN EstadoReserva AS ER ON R.idReserva = ER.idReserva
                                    JOIN Estado ES ON ER.idEstado = ES.idEstado
                                    WHERE R.idReserva = $id;";
                        $ejec = sqlsrv_query($conn, $consulta);
                        $i=0;
                        while($fila = sqlsrv_fetch_array($ejec)){
                            $fReserva = $fila["FRESERVA"];
                            $fInicio = $fila["FINICIO"];
                            $fTermino = $fila["FTERMINO"];
                            $idEstado = $fila["IDESTADO"];
                            $estado = $fila["ESTADO"];
                            $costo = $fila["COSTO"];
                            $ninos = $fila["NINOS"];
                            if($h==1){
                                $tipo="Individual";
                            }else{
                                $tipo="Grupal";
                            }
                            $i++;
                            ?>
                            <div class="campos">
                                <p class ="nombreCampo">Fecha Reserva</p>
                                <p class ="contentCampo"><?php echo($fReserva); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo">Fecha Inicio</p>
                                <p class ="contentCampo"><?php echo($fInicio); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo">Fecha Termino</p>
                                <p class ="contentCampo"><?php echo($fTermino); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo">Tipo Reserva</p>
                                <p class ="contentCampo"><?php echo($tipo); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo"> Estado</p>
                                <p class ="contentCampo"><?php echo($estado); ?></p>
                            </div>
                            <div class="campos">
                                <p class ="nombreCampo"> Costo Total</p>
                                <p class ="contentCampo"><?php echo($costo); ?></p>
                            </div>
                            <?php
                            if($idEstado == 1 || $idEstado == 5){
                                ?>
                                <div  id="btnCancelar">
                                    <a href="actualizarReserva.php?operador=<?php echo($rutLog); ?>&idReserva=<?php echo($id); ?>&accion=3" onclick="return cancelarReserva()">Cancelar Reserva</a>
                                </div>

                                <?php
                            }
                            ?>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>  
    </div>
 
</body>
</html>