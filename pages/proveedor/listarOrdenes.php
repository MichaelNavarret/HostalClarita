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
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores/listarOrdenes.css">
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
            <h2>Listar Ordenes</h2>
        </div>
        <div class="clearFix"></div>
   
<!--/////////////////////////////////////////////-BARRA FILTROS-//////////////////////////////////////////////////  -->
        <div class ="filtros">
            <form action="" method ="post" id ="filtros" name="filtros">
                <div class="campo">
                    <label for="">Estado: </label>
                    <select name="state" id="state">
                        <option selected="true" value="Todos">Todos</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Cerrada">Cerrada</option>
                    </select>
                </div>
                <div class ="campo">
                    <input type="submit" value="Buscar" name="btn" id="btn">
                </div>
            </form>
        </div>
<!--/////////////////////////////////////////////-TABLA PEDIDOS-/////////////////////////////////////////////////////////  -->
        <div class ="tablaPedidos" >
            <table id="tablaPedidos">
                <tr class = 'cabecera'>
                    <td><strong> ID ORDEN </strong></td>
                    <td><strong> DETALLE </strong></td>
                    <td><strong> FECHA </strong></td>
                    <td><strong> ESTADO </strong></td>
                    <td><strong> CANTIDAD PRODUCTOS </strong></td>
            <?php
                if(isset($_POST['btn'])){
                    $state = $_POST['state'];
                    if($state == 'Todos'){
                        $consulta = "   SELECT	OP.idOrdenPedido ID,
                                        OP.detalle DETALLE,
                                        CONVERT(VARCHAR,OP.fechaGenOrden,111 ) FECHA,
                                        OP.estado ESTADO,
                                        COUNT(OPP.idProducto) CANT
                                FROM OrdenPedido AS OP
                                JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                                WHERE rutProveedor = '128723132'
                                GROUP BY	OP.idOrdenPedido ,
                                            OP.detalle ,
                                            CONVERT(VARCHAR,OP.fechaGenOrden,111 ) ,
                                            OP.estado;  
                                        ";
                    }else{
                        $consulta = "SELECT	OP.idOrdenPedido ID,
                                        OP.detalle DETALLE,
                                        CONVERT(VARCHAR,OP.fechaGenOrden,111 ) FECHA,
                                        OP.estado ESTADO,
                                        COUNT(OPP.idProducto) CANT
                                FROM OrdenPedido AS OP
                                JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                                WHERE rutProveedor = '128723132' AND OP.estado = '$state'
                                GROUP BY	OP.idOrdenPedido ,
                                            OP.detalle ,
                                            CONVERT(VARCHAR,OP.fechaGenOrden,111 ) ,
                                            OP.estado;";
                    }
                }else{
                    $consulta = "   SELECT	OP.idOrdenPedido ID,
                                        OP.detalle DETALLE,
                                        CONVERT(VARCHAR,OP.fechaGenOrden,111 ) FECHA,
                                        OP.estado ESTADO,
                                        COUNT(OPP.idProducto) CANT
                                FROM OrdenPedido AS OP
                                JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                                WHERE rutProveedor = '128723132'
                                GROUP BY	OP.idOrdenPedido ,
                                            OP.detalle ,
                                            CONVERT(VARCHAR,OP.fechaGenOrden,111 ) ,
                                            OP.estado;  
                                        ";
                }
                $ejecutar = sqlsrv_query($conn, $consulta);
                $i=0;
                while($fila = sqlsrv_fetch_array($ejecutar)){
                    $id = $fila["ID"];
                    $detail = $fila["DETALLE"];
                    $dateSQL = $fila["FECHA"];
                    $stateSQL = $fila["ESTADO"];
                    $cant = $fila["CANT"];
                ?>
                    <tr class="filas">
                        <td> <?php echo($id); ?> </td>
                        <td> <?php echo($detail); ?> </td>
                        <td> <?php echo($dateSQL); ?> </td>
                        <td> <?php echo($stateSQL); ?> </td>
                        <td> <?php echo($cant); ?> </td>
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