<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
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
                    <li><a href="portalProveedores.php">Inicio</a> </li>
                    <li>
                        <a href="#"> Orden de compra </a>
                        <ul>
                            <li><a href="listarOrdenes.php">Listar productos</a></li>
                            <li><a href="buscarOrden.php">Buscar orden</a></li>                           
                        </ul>
                    </li>
                    <li>
                    <a href="#"> Inventario </a>
                        <ul>
                            <li><a href="listarProductos.php">Listar Productos</a></li>
                            <li><a href="adminProductos.php">Administrar Productos</a></li>                           
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a id ="salir" href="#">Salir</a> </li>
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
            <?php
                if(isset($_POST['btn'])){
                    $consulta = "SELECT	idProducto Id, 
                                        UPPER(nombre) Nombre,
                                        FORMAT(valor,'$ ### ###') Valor,
                                        familia Familia,
                                        CASE 
                                            WHEN fechaVencimiento IS NULL THEN 'NO VENCE'
                                            ELSE CONVERT(VARCHAR,fechaVencimiento,111)
                                        END AS Fecha,
                                        stock Stock
                                FROM Producto
                                WHERE rutProveedor = '128723132' AND stock < 4;";
                    
                }else{
                    $consulta =         "SELECT	idProducto Id, 
                                                UPPER(nombre) Nombre,
                                                FORMAT(valor,'$ ### ###') Valor,
                                                familia Familia,
                                                CASE 
                                                    WHEN fechaVencimiento IS NULL THEN 'NO VENCE'
                                                    ELSE CONVERT(VARCHAR,fechaVencimiento,111)
                                                END AS Fecha,
                                                stock Stock
                                        FROM Producto
                                        WHERE rutProveedor = '128723132';";
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
                ?>
                    <tr class="filas">
                        <td> <?php echo($id); ?> </td>
                        <td> <?php echo($name); ?> </td>
                        <td> <?php echo($valor); ?> </td>
                        <td> <?php echo($familia); ?> </td>
                        <td> <?php echo($date); ?> </td>
                        <td> <?php echo($stock); ?> </td>
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