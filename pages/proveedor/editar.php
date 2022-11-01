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
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores/editar.css">
    <script src="../../js/scripts.js"></script>
</head>
<body>
    
    <div id ="container">
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// MENU -->
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
            <h2>Editar producto </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// EDITAR PRODUCTO -->
        <div class ="mainContainer">
            <form id ="informacion" method ="post" action="editarProceso.php" >
                <h2 class ="titulo" >Información Producto</h2>

                <?php
                    include('../../php/connection.php');
                    $codigo = $_GET['codigo'];
                    $consulta = "SELECT	idProducto ID,
                                        nombre NOMBRE,
                                        FORMAT(valor, '######') VALOR,
                                        familia FAMILIA,
                                        CONVERT(VARCHAR,fechaVencimiento,105) FECHA,
                                        stock STOCK
                                FROM Producto
                                WHERE idProducto = '$codigo';";
                    $ejecutar = sqlsrv_query($conn,$consulta);
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $id = $fila["ID"];
                        $nombre = $fila["NOMBRE"];
                        $valor = $fila["VALOR"];
                        $familia = $fila["FAMILIA"];
                        $fecha = $fila["FECHA"];
                        $stock = $fila["STOCK"];
                    }
                    
                ?>

                <ul id ="datos" >
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>ID Producto</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($id); ?></p>
                        </div>
                         
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Nombre Producto</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($nombre); ?></p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Valor</strong> </h4>
                            <input type="number" name="valorPro" id="valorPro" value ="<?php echo($valor) ?>">
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Familia</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($familia); ?></p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Fecha Vencimiento</strong> </h4>
                            <p class ="datoCampoContent"> <?php echo($fecha); ?></p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>STOCK</strong> </h4>
                            <input type="number" name="stockPro" id="stockPro" value ="<?php echo($stock) ?>">
                        </div>    
                    </li>
                    <div id ="btn" >
                        <input type="hidden" name="codigoPro" value = "<?php echo($codigo) ?>">
                        <input type="submit" value="Actualizar Producto" id="update" name="update" onclick="return editarProducto()">
                    </div>
                </ul>
                <?php
                    /*if(isset($_POST['update'])){
                        global $codigo;
                        $n_valor =$_POST["valorPro"];
                        $n_stock =$_POST["stockPro"];
                        $consulta = "   UPDATE Producto
                                        SET valor = $n_valor, 
                                            stock = $n_stock
                                        WHERE idProducto = '$codigo';";
                        $ejecutar = sqlsrv_query($conn, $consulta);
                        header("Location: listarProductos.php");
                    }

                */?>
            </form>
        </div>
    <div class="clearFix"></div>
    <!--
    <footer>
        <div class="pie">
            <p >Todos los derechos reservados &copy; Michael Navarrete Cartes 2022 </p>
        </div>
        
    </footer>
    -->
</body>
</html>