<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

    }else{
        $rutLog = $_GET["rutOperador"];
        $idOrden = $_GET["idOrden"];
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
            <h2>Seleccione Productos </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// BUSCADOR -->
        
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <div class ="mainContainer">
            <div class="filtros">

            </div>

            <div class="reservas">
                <form action="genRec.php">
                    <table id ="tablaReservas">
                        <tr id="cabeceraTabla">
                            <td>Codigo</td>
                            <td>Producto</td>
                            <td>Cantidad Solicitada </td>
                            <td>Confirmacion</td>
                        </tr>
                    <?php
                        $consulta = "   SELECT	P.idProducto ID,
                                                P.codigo CODIGO,
                                                P.nombre PRODUCTO,
                                                OPP.cantidad CANT
                                        FROM OrdenPedido_Producto AS OPP
                                        JOIN Producto AS P ON OPP.idProducto = P.idProducto
                                        WHERE idOrdenPedido = $idOrden;";
                            
                        $ejecutar = sqlsrv_query($conn, $consulta);
                        $i=0;
                        while($fila = sqlsrv_fetch_array($ejecutar)){
                            $idProducto = $fila["ID"];
                            $code = $fila["CODIGO"];
                            $nombre = $fila["PRODUCTO"];
                            $cant = $fila["CANT"];
                            $i++;
                            ?>
                            <tr id="contenidoTabla">
                                <input type="hidden" name="rutOperador" value="<?php echo($rutLog); ?>">
                                <input type="hidden" name="idOrden" value="<?php echo($idOrden); ?>">
                                <input type="hidden" name="producto<?php echo($i); ?>" value="<?php echo($idProducto); ?>">
                                <td><?php echo($code); ?></td>
                                <td><?php echo($nombre); ?></td>
                                <td><?php echo($cant); ?></td>
                                <td> <input type="checkbox" id="confirmacion" name="confirmacion<?php echo($i) ?>" value="1"></td>
                                
                            </tr>
                            <?php
                        }
                    ?>
                    </table>
                    
                    <div class="estado">
                        <p>Confirme estado de recepción</p>
                        <input type="radio" id="sucess" name="state" value="-1">
                        <label for="age1">Aprobada</label><br>
                        <input type="radio" id="failed" name="state" value="-2">
                        <label for="age2">Rechazada</label><br> 
                        <textarea name="textarea" rows="10" cols="50" maxlenght = 200>Observacion</textarea><br>
                        <div class="btn">
                            <input id="btnGenerar"  type="submit" value="GENERAR">
                        </div>
                    </div>
                    
                </form>
                
            </div>
            
        </div>

        
    </div>
 
</body>
</html>