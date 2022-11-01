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
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores/adminProductos.css">
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
            <h2>Administrar Productos </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// AGREGAR PRODUCTO -->
        <div class ="mainContainer">
            <section id ="informacion">
                <h2 class ="titulo" >Agregar Producto</h2>
                <form action="agregar.php" method = "post" >
                    <ul id ="datos" >
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Codigo</strong> </h4>
                                <input class ="datoCampoContent" type="text" name="codePro" id="codePro" required minlength=18 maxlength=18>
                            </div>
                            
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Nombre</strong> </h4>
                                <input class ="datoCampoContent" type="text" name="namePro" id="namePro"  maxlength=30>
                            </div>
                            
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Valor</strong> </h4>
                                <input class ="datoCampoContent" type="number" name="valorPro" id="valorPro" required min=0 >
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Familia</strong> </h4>
                                <input class ="datoCampoContent" type="text" name="familiaPro" id="familiaPro" required>
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Fecha Vencimiento</strong> </h4>
                                <input class ="datoCampoContent" type="date" name="datePro" id="datePro"  min="<?php echo(date("Y").'-'.date("m").'-'.date("d")); ?>">
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Stock</strong> </h4>
                                <input class ="datoCampoContent" type="number" name="stockPro" id="stockPro" min = 1 required>
                            </div>    
                        </li>
                        <li>
                            <div class ="btn" id="btnAgregar" >
                                <input type="submit" name="agregar" id="agregar" value ="Agregar Producto">
                            </div>    
                        </li>
                    </ul>
                </form>
                <?php

                ?>
            </section>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////// FOOTER -->
   <!-- 
    <footer>
        <div class="pie">
            <p >Todos los derechos reservados &copy; Michael Navarrete Cartes 2022 </p>
        </div>
        
    </footer>
    -->

</body>
</html>