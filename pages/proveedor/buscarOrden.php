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
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores/buscarOrden.css">
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
                            <li><a href="listarOrdenes.php">Listar ordenes</a></li>                         
                        </ul>
                    </li>
                    <li>
                    <a href="#"> Inventario </a>
                        <ul>
                            <li><a href="listarProductos.php">Listar productos</a></li>
                            <li><a href="adminProductos.php">Agregar producto</a></li>                           
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a id ="salir" href="#">Salir</a> </li>
                </ul>
        </nav>
        <div class="clearFix"></div>

        <div id ="miniBanner">
            <h2>Buscar Orden</h2>
        </div>
        <div class="clearFix"></div>
   
<!--/////////////////////////////////////////////-BARRA FILTROS-//////////////////////////////////////////////////  -->
        <div class ="buscador">
            <form action="" method ="post" id ="buscador" name="buscador">
                <div class="campo">
                    <label for="">ID Producto: </label>
                    <input type="number" min="1" name ="idNum" id="idNum">
                </div>
                <div class ="campo">
                    <input type="submit" value="Buscar" name="btn" id="btn"  >
                </div>
            </form>
        </div>
<!--/////////////////////////////////////////////-TABLA DETALLE PRODUCTO-/////////////////////////////////////////////////////////  -->
        <div class="infoPedido">
            <?php
                $codigo = $_GET['codigo'];
                if(isset($_POST['btn'])){
                    $id = $_POST["idNum"];
                    $consultaInfo = "SELECT	OPP.idOrdenPedido ORDEN,
                                            OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat OPERADOR,
                                            CONVERT(VARCHAR, OP.fechaGenOrden, 111) FECHA,
                                            OP.detalle DETALLE,
                                            OP.estado ESTADO 
                                    FROM OrdenPedido_Producto AS OPP
                                    JOIN OrdenPedido AS OP ON OPP.idOrdenPedido = OP.idOrdenPedido
                                    JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                                    JOIN Producto AS PR ON OPP.idProducto = PR.idProducto
                                    WHERE OPP.idOrdenPedido = $id AND PR.rutProveedor = '128723132'
                                    GROUP BY	OPP.idOrdenPedido ,
                                                OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat ,
                                                CONVERT(VARCHAR, OP.fechaGenOrden, 111) ,
                                                OP.detalle ,
                                                OP.estado ;";
                    $ejecutar = sqlsrv_query($conn, $consultaInfo);
                    $i=0;
                    
                }else{
                    $consultaInfo = "SELECT	OPP.idOrdenPedido ORDEN,
                                            OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat OPERADOR,
                                            CONVERT(VARCHAR, OP.fechaGenOrden, 111) FECHA,
                                            OP.detalle DETALLE,
                                            OP.estado ESTADO
                                    FROM OrdenPedido_Producto AS OPP
                                    JOIN OrdenPedido AS OP ON OPP.idOrdenPedido = OP.idOrdenPedido
                                    JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                                    JOIN Producto AS PR ON OPP.idProducto = PR.idProducto
                                    WHERE OPP.idOrdenPedido = $codigo AND PR.rutProveedor = '128723132'
                                    GROUP BY	OPP.idOrdenPedido ,
                                                OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat ,
                                                CONVERT(VARCHAR, OP.fechaGenOrden, 111) ,
                                                OP.detalle ,
                                                OP.estado ;";
                    $ejecutar = sqlsrv_query($conn, $consultaInfo);
                    $i=0;
                }
                while($info=sqlsrv_fetch_array($ejecutar)){
                    $codigo = $info['ORDEN'];
                    $operador = $info['OPERADOR'];
                    $fecha = $info['FECHA'];
                    $detail = $info['DETALLE'];
                    $estado = $info['ESTADO'];
                
                ?>
                <h3>Información Pedido</h3>
                <p> Codigo de la Orden:  <?php echo($codigo); ?> </p>
                <p> Operador solicitante:  <?php echo($operador); ?> </p>
                <p> Fecha de Generacion:  <?php echo($fecha); ?> </p>
                <p> Estado de la orden:  <?php echo($estado); ?> </p>
                <p id="final"> Detalle de la Orden:  <?php echo($detail); ?> </p>
                <?php
                }
            ?>
        </div>
        <div class="contenidoPedido">
            <?php
                if(isset($_POST['btn'])){
            ?>
            <table>
                <tr class="cabecera">
                    <td>Código Producto</td>
                    <td>Nombre Producto</td>
                    <td>Valor Unitario</td>
                    <td>Familia</td>
                    <td>Cantidad</td>
                    <td>Valor Total</td>
                </td>
            <?php
                    $id = $_POST["idNum"];
                    $consultaProductos = "SELECT	PR.idProducto CODIGO,
                                                    PR.nombre NOMBRE,
                                                    FORMAT(PR.valor,'$ ### ###') VALOR_UNITARIO,
                                                    PR.familia FAMILIA,
                                                    OPP.cantidad CANTIDAD,
                                                    FORMAT((PR.valor*OPP.cantidad), '$ ### ###') VALOR_TOTAL
                                            FROM OrdenPedido_Producto AS OPP
                                            JOIN OrdenPedido AS OP ON OPP.idOrdenPedido = OP.idOrdenPedido
                                            JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                                            JOIN Producto AS PR ON OPP.idProducto = PR.idProducto
                                            WHERE OPP.idOrdenPedido = $id AND PR.rutProveedor = '128723132';";
                    $ejecutar = sqlsrv_query($conn, $consultaProductos);
                    $i=0;
                    while($info=sqlsrv_fetch_array($ejecutar)){
                        $codigo = $info['CODIGO'];
                        $nombre = $info['NOMBRE'];
                        $valorUn = $info['VALOR_UNITARIO'];
                        $familia = $info['FAMILIA'];
                        $cant = $info['CANTIDAD'];
                        $valorTo = $info['VALOR_TOTAL'];
            ?>
                <tr class ="filas" >
                    <td><?php echo($codigo);?></td>
                    <td><?php echo($nombre);?></td>
                    <td><?php echo($valorUn);?></td>
                    <td><?php echo($familia);?></td>
                    <td><?php echo($cant);?></td>
                    <td><?php echo($valorTo);?></td>
                </td>
            <?php
                    }
                }else{
            ?>        
                    <table>
                <tr class="cabecera">
                    <td>Código Producto</td>
                    <td>Nombre Producto</td>
                    <td>Valor Unitario</td>
                    <td>Familia</td>
                    <td>Cantidad</td>
                    <td>Valor Total</td>
                </td>
            <?php
                    $id = $_GET["codigo"];
                    $consultaProductos = "SELECT	PR.idProducto CODIGO,
                                                    PR.nombre NOMBRE,
                                                    FORMAT(PR.valor,'$ ### ###') VALOR_UNITARIO,
                                                    PR.familia FAMILIA,
                                                    OPP.cantidad CANTIDAD,
                                                    FORMAT((PR.valor*OPP.cantidad), '$ ### ###') VALOR_TOTAL
                                            FROM OrdenPedido_Producto AS OPP
                                            JOIN OrdenPedido AS OP ON OPP.idOrdenPedido = OP.idOrdenPedido
                                            JOIN OperadorHostal AS OH ON OP.rutOperador = OH.rutOperador
                                            JOIN Producto AS PR ON OPP.idProducto = PR.idProducto
                                            WHERE OPP.idOrdenPedido = $id AND PR.rutProveedor = '128723132';";
                    $ejecutar = sqlsrv_query($conn, $consultaProductos);
                    $i=0;
                    while($info=sqlsrv_fetch_array($ejecutar)){
                        $codigo = $info['CODIGO'];
                        $nombre = $info['NOMBRE'];
                        $valorUn = $info['VALOR_UNITARIO'];
                        $familia = $info['FAMILIA'];
                        $cant = $info['CANTIDAD'];
                        $valorTo = $info['VALOR_TOTAL'];
            ?>
                <tr class ="filas" >
                    <td><?php echo($codigo);?></td>
                    <td><?php echo($nombre);?></td>
                    <td><?php echo($valorUn);?></td>
                    <td><?php echo($familia);?></td>
                    <td><?php echo($cant);?></td>
                    <td><?php echo($valorTo);?></td>
                </td>
            <?php
                }
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