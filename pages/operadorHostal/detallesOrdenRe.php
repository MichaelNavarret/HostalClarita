<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

    }else{
        $rutLog = $_GET["rutOperador"];
        $idRe = $_GET["idOrdenRe"];
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
    <link rel="stylesheet" type = "text/css" href="../../css/operador/ordenCompra.css">
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
            <h2>Detalles orden de recepción n° <?php echo($idRe); ?> </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// BUSCADOR -->
        
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <div class ="mainContainer">
            <div class="filtros">

            </div>
            <div class="detalleGenerales">
                <h1>Detalles generales</h1>
                <div class="contenidoDetalles">
                    <?php
                        $consultarDetalles = "SELECT	ODR.idOrdenRecepcion ID_RECEPCION,
                                                        ODR.idOrdenPedido ID_PEDIDO,
                                                        OP.nombre + ' ' + OP.apellidoPat + ' ' + OP.apellidoMat NOMBRE,
                                                        CONVERT(VARCHAR, ODR.fechaRecepcion, 111) FECHA,
                                                        UPPER(ODR.estado) ESTADO,
                                                        ODR.observacion OBS
                                                FROM OrdenRecepcion AS ODR
                                                JOIN OperadorHostal AS OP ON ODR.rutOperador = OP.rutOperador
                                                WHERE ODR.idOrdenRecepcion = $idRe;";
                        $buscarOrden = sqlsrv_query($conn, $consultarDetalles);
                        $i=0;
                        while($fila = sqlsrv_fetch_array($buscarOrden)){
                            $idReDetalle = $fila["ID_RECEPCION"];
                            $idOrDetalle = $fila["ID_PEDIDO"];
                            $operadorDetalle = $fila["NOMBRE"];
                            $fechaDetalle = $fila["FECHA"];
                            $estadoDetalle = $fila["ESTADO"];
                            $obsDetalle = $fila["OBS"];
                            $i++;
                            ?>
                            <div class="detalles">
                                <label for="">ID Orden Recepción: <?php echo($idReDetalle); ?></label>
                            </div>
                            <div class="detalles">
                                <label for="">ID Orden Pedido: <?php echo($idOrDetalle); ?></label>
                            </div>
                            <div class="detalles">
                                <label for="">Operador a cargo: <?php echo($operadorDetalle); ?></label>
                            </div>
                            <div class="detalles">
                                <label for="">Fecha de Recepción: <?php echo($fechaDetalle); ?></label>
                            </div>
                            <div class="detalles">
                                <label for="">Estado: <?php echo($estadoDetalle); ?></label>
                            </div>
                            <div class="detalles">
                                <label for="">Observacion: <?php echo($obsDetalle); ?></label>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="reservas">
                <table id ="tablaReservas">
                    <tr id="cabeceraTabla">
                        <td>N°</td>
                        <td>Producto</td>
                        <td>Resultado</td>
                    </tr>
                <?php
                    
                    $consulta = "SELECT P.nombre NOMBRE_PRODUCTO,
                                        UPPER(ORP.estado) ESTADO
                                FROM OrdenRecepcion_Producto AS ORP
                                JOIN Producto AS P ON ORP.idProducto = P.idProducto
                                WHERE ORP.idOrdenREcepcion = $idRe;";
                    $ejecutar = sqlsrv_query($conn, $consulta);
                    $i=0;
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $producto = $fila["NOMBRE_PRODUCTO"];
                        $estado = $fila["ESTADO"];
                        $i++;
                        ?>
                        <tr id="contenidoTabla">

                            <td id="inicio"><?php echo($i); ?></td>
                            <td><?php echo($producto); ?></td>
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
</html>