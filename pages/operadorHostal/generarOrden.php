<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

    }else{
        $rutLog = $_GET["rutOperador"];
        $rutPro = $_GET["rutProveedor"];
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
                <form action="genOr.php">
                    <div class="estado">
                        <label for="">Ingrese Detalle de la orden: </label>
                        <input type="text" name="detalle" required>
                    </div>
                    
                    <table id ="tablaReservas">
                        <tr id="cabeceraTabla">
                            <td>Codigo</td>
                            <td>Nombre</td>
                            <td>Costo </td>
                            <td>Familia</td>
                            <td>Cantidad</td>
                        </tr>
                    <?php
                        $consulta = "   SELECT  idProducto ID,
                                                codigo CODE,
                                                nombre NOMBRE,
                                                FORMAT(valor,'$ ### ###') Valor,
                                                familia FAMILIA,
                                                stock STOCK,
                                                stockCritico STOCKCRIT
                                        FROM Producto
                                        WHERE stock > stockCritico AND rutProveedor = '$rutPro'
                                        ORDER BY familia DESC;
                                        ";
                            
                        $ejecutar = sqlsrv_query($conn, $consulta);
                        $i=0;
                        while($fila = sqlsrv_fetch_array($ejecutar)){
                            $idProducto = $fila["ID"];
                            $code = $fila["CODE"];
                            $nombre = $fila["NOMBRE"];
                            $valor = $fila["Valor"];
                            $familia = $fila["FAMILIA"];
                            $stock = $fila["STOCK"];
                            $stockCrit = $fila["STOCKCRIT"];
                            $i++;
                            ?>
                            <tr id="contenidoTabla">
                                <input type="hidden" name="rutProveedor" value="<?php echo($rutPro); ?>">
                                <input type="hidden" name="rutOperador" value="<?php echo($rutLog); ?>">
                                <input type="hidden" name="producto<?php echo($i); ?>" value="<?php echo($idProducto); ?>">
                                <td><?php echo($code); ?></td>
                                <td><?php echo($nombre); ?></td>
                                <td><?php echo($valor); ?></td>
                                <td><?php echo($familia); ?></td>
                                <td><input type="number" name="cantidad<?php echo($i); ?>" min=0 max=<?php echo($stock-$stockCrit); ?> id="cantidad"></td>
                                
                            </tr>
                            <?php
                        }
                    ?>
                    </table>
                    <input id="btnGenerar" type="submit" value="GENERAR">
                </form>
                
            </div>
            
        </div>

        
    </div>
 
</body>
</html>