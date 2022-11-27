<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

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
            <h2>Ordenes de Compra </h2>
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
      
        <div class="btnGenerador">
            <a href="selectProveedor.php?rutOperador=<?php echo($rutLog);?>" name="generarOrdenCompra" id="generarOrdenCompra">Generar Orden Compra</a>
            
            
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <div class ="mainContainer">
            <div class="filtros">

            </div>

            <div class="reservas">
                <table id ="tablaReservas">
                    <tr id="cabeceraTabla">
                        <td>ID Orden</td>
                        <td>Operador</td>
                        <td>Proveedor</td>
                        <td>Detalle</td>
                        <td>Fecha Orden</td>
                        <td>Estado</td>
                        <td>Productos</td>
                    </tr>
                <?php
                    if(isset($_POST['btn'])){
                        $contBuscador = $_POST['contBuscador'];
                        $consulta = "SELECT	OP.idOrdenPedido ID,
                                            OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat OPERADOR,
                                            P.nombre PROVEEDOR,
                                            OP.detalle DETALLE,
                                            CONVERT(VARCHAR,OP.fechaGenOrden,111 ) FECHAORDEN,
                                            OP.estado ESTADO,
                                            SUM(OPP.cantidad) PRODUCTOS
                                    FROM OrdenPedido AS OP
                                    JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                                    JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                                    JOIN Proveedor AS P ON OP.rutProveedor = P.rutProveedor
                                    WHERE OP.idOrdenPedido LIKE '$contBuscador%' OR P.nombre LIKE '$contBuscador%' OR OP.estado LIKE '$contBuscador%' 
                                    GROUP BY	OP.idOrdenPedido ,
                                                OP.detalle ,
                                                CONVERT(VARCHAR,OP.fechaGenOrden,111 ) ,
                                                OP.estado,
                                                OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat,
                                                P.nombre ,
                                                OP.fechaGenOrden
                                    ORDER BY OP.fechaGenOrden DESC;";
                    }else{ 
                        $consulta = "SELECT	OP.idOrdenPedido ID,
                                            OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat OPERADOR,
                                            P.nombre PROVEEDOR,
                                            OP.detalle DETALLE,
                                            CONVERT(VARCHAR,OP.fechaGenOrden,111 ) FECHAORDEN,
                                            OP.estado ESTADO,
                                            SUM(OPP.cantidad) PRODUCTOS
                                    FROM OrdenPedido AS OP
                                    JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                                    JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                                    JOIN Proveedor AS P ON OP.rutProveedor = P.rutProveedor
                                    GROUP BY	OP.idOrdenPedido ,
                                                OP.detalle ,
                                                CONVERT(VARCHAR,OP.fechaGenOrden,111 ) ,
                                                OP.estado,
                                                OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat,
                                                P.nombre,
                                                OP.fechaGenOrden
                                    ORDER BY OP.fechaGenOrden DESC;";
                        
                    }
                    $ejecutar = sqlsrv_query($conn, $consulta);
                    $i=0;
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $id = $fila["ID"];
                        $operador = $fila["OPERADOR"];
                        $proveedor = $fila["PROVEEDOR"];
                        $detalle = $fila["DETALLE"];
                        $fOrden = $fila["FECHAORDEN"];
                        $estado = $fila["ESTADO"];
                        $productos = $fila["PRODUCTOS"];
                        $i++;
                        ?>
                        <tr id="contenidoTabla">
                            <td id="inicio"><a href="generarRecepcion.php?rutOperador=<?php global $rutLog; echo($rutLog) ?>&idOrden=<?php echo($id) ?>"><?php echo($id); ?></a></td>
                            <td><?php echo($operador); ?></td>
                            <td><?php echo($proveedor); ?></td>
                            <td><?php echo($detalle); ?></td>
                            <td><?php echo($fOrden); ?></td>
                            <td><?php echo($estado); ?></td>
                            <td><?php echo($productos); ?></td>
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