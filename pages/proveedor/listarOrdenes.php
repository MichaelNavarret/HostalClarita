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
                        </ul>
                    </li>
                    <li>
                    <a href="#"> Inventario </a>
                        <ul>
                            <li><a href="listarProductos.php">Listar Productos</a></li>
                            <li><a href="adminProductos.php">Agregar Productos</a></li>                           
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
                    <td><strong> MIRAR DETALLE</strong></td>
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
                        <td>
                            <a href="buscarOrden.php?codigo=<?php echo($id) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="green" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
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