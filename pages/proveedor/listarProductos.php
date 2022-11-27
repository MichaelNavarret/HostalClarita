<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    $rutLog = $_GET["rutProveedor"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Proveedores - Hostal Doña Clarita</title>

    <link rel="icon" href="img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg">
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores/listarProductos.css">
    <script src="../../js/scripts.js"></script>
</head>
<body>
<!-- /////////////////////////////////////-CONTENIDO PRINCIPAL-/////////////////////////////////////////////////  -->   
    <div id ="container">
<!--/////////////////////////////////////////////-MENU-/////////////////////////////////////////////////////////  -->
        <nav id="menu">
            <ul id ="ul01" >
                <li><a href="portalProveedores.php?rutProveedor=<?php global $rutLog; echo($rutLog) ?>">Inicio</a> </li>
                <li>
                    <a href="#"> Orden de compra </a>
                    <ul>
                        <li><a href="listarOrdenes.php?rutProveedor=<?php global $rutLog; echo($rutLog) ?>">Listar ordenes</a></li>                         
                    </ul>
                </li>
                <li>
                <a href="#"> Inventario </a>
                    <ul>
                        <li><a href="listarProductos.php?rutProveedor=<?php global $rutLog; echo($rutLog) ?>">Listar Productos</a></li>
                        <li><a href="adminProductos.php?rutProveedor=<?php global $rutLog; echo($rutLog) ?>">Agregar Producto</a></li>                           
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a id ="salir" href="../../index.php">Salir</a> </li>
            </ul>
        </nav>
        <div class="clearFix"></div>

        <div id ="miniBanner">
            <h2>Listar Productos</h2>
        </div>
        <div class="clearFix"></div>
   
<!--/////////////////////////////////////////////-BARRA FILTROS-//////////////////////////////////////////////////  -->
        <div class ="filtros">
            <form action="" method ="post" id ="filtros" name="filtros">
                <div class ="campo">
                    <input type="submit" value="Listar productos con bajo stock" name="btn" id="btn">
                </div>
            </form>
            <div class ="iconPlus">
                <a id ="agregar" href="adminProductos.php?rutProveedor=<?php global $rutLog; echo($rutLog) ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
<!--/////////////////////////////////////////////-TABLA PRODUCTOS-/////////////////////////////////////////////////////////  -->
        <div class ="tablaProductos" >
            <table id="tablaProductos">
                <tr class = 'cabecera'>
                    <td><strong> ID PRODUCTO </strong></td>
                    <td><strong> NOMBRE </strong></td>
                    <td><strong> VALOR </strong></td>
                    <td><strong> FAMILIA </strong></td>
                    <td><strong> FECHA VENCIMIENTO </strong></td>
                    <td><strong> STOCK PRODUCTO </strong></td>
                    <td><strong> STOCK CRÍTICO </strong></td>
                    <td><strong> EDITAR </strong></td>
            <?php
                if(isset($_POST['btn'])){
                    $consulta = "SELECT	codigo Id, 
                                        nombre Nombre,
                                        FORMAT(valor,'$ ### ###') Valor,
                                        familia Familia,
                                        CASE 
                                            WHEN fechaVencimiento IS NULL THEN 'NO VENCE'
                                            ELSE CONVERT(VARCHAR,fechaVencimiento,111)
                                        END AS Fecha,
                                        stock Stock,
                                        stockCritico StockCritico
                                FROM Producto
                                WHERE rutProveedor = '$rutLog' AND stock = stockCritico;";
                    
                }else{
                    $consulta =         "SELECT	codigo Id, 
                                                nombre Nombre,
                                                FORMAT(valor,'$ ### ###') Valor,
                                                familia Familia,
                                                CASE 
                                                    WHEN fechaVencimiento IS NULL THEN 'NO VENCE'
                                                    ELSE CONVERT(VARCHAR,fechaVencimiento,111)
                                                END AS Fecha,
                                                stock Stock,
                                                stockCritico StockCritico
                                        FROM Producto
                                        WHERE rutProveedor = '$rutLog';";
                }
                $ejecutar = sqlsrv_query($conn, $consulta);
                $i=0;
                while($fila = sqlsrv_fetch_array($ejecutar)){
                    $id = $fila["Id"];
                    $name = $fila["Nombre"];
                    $valor = $fila["Valor"];
                    $familia = $fila["Familia"];
                    $date = $fila["Fecha"];
                    $stock = $fila["Stock"];
                    $stockCritico = $fila["StockCritico"];
                ?>
                    <tr class="filas">
                        <td> <?php echo($id); ?> </td>
                        <td> <?php echo($name); ?> </td>
                        <td> <?php echo($valor); ?> </td>
                        <td> <?php echo($familia); ?> </td>
                        <td> <?php echo($date); ?> </td>
                        <td> <?php echo($stock); ?> </td>
                        <td> <?php echo($stockCritico); ?> </td>
                        <td id ="icon">
                            <a  href="editar.php?codigo=<?php echo $id?>&rutProveedor=<?php echo $rutLog ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="36" fill="#007AAE" class="bi bi-pencil-square " viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            <a  href="eliminar.php?codigo=<?php echo $id?>&rutProveedor=<?php echo $rutLog ?>" onclick="return eliminarProducto()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="36" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>      
        </div>
    </div>
<!--/////////////////////////////////////////////-FOOTER-/////////////////////////////////////////////////////////  -->
   <!-- <div class="clearFix"></div>
    <footer>
        <div class="pie">
            <p >Todos los derechos reservados &copy; Michael Navarrete Cartes 2022 </p>
        </div>
        
    </footer>-->

</body>
</html>