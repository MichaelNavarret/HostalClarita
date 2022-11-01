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
            <h2>Administrar Productos </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// AGREGAR PRODUCTO -->
        <div class ="mainContainer">
            <section id ="informacion">
                <h2 class ="titulo" >Agregar Producto</h2>
                <form action="" method = "post" >
                    <ul id ="datos" >
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Nombre</strong> </h4>
                                <input class ="datoCampoContent" type="text" name="namePro" id="namePro" required>
                            </div>
                            
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Valor</strong> </h4>
                                <input class ="datoCampoContent" type="number" name="valorPro" id="valorPro" required>
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
                                <input class ="datoCampoContent" type="date" name="datePro" id="datePro" >
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Stock</strong> </h4>
                                <input class ="datoCampoContent" type="number" name="stockPro" id="stockPro" min = 1 required>
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Contraseña</strong> </h4>
                                <input class ="datoCampoContent" type="pass" name="contraPro" id="contraPro" required>
                            </div>    
                        </li>
                        <li>
                            <div class ="btn" id="btnAgregar" >
                                <input type="submit" name="agregar" id="agregar" value ="Agregar Producto">
                            </div>    
                        </li>
                    </ul>
                </form>
            </section>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// ELIMINAR PRODUCTO -->
            <section id ="contraseña">
                <h2 class ="titulo" >Eliminar Producto</h2>
                <form action="" method="post" name ="formPass" id = "formPass">
                    <div class="campo">
                        <label for="">ID Producto </label>
                        <br>
                        <input type="text" name ="idPro" id ="idPro" required>
                    </div>
                    <div class="campo">
                        <label for="">Contraseña </label>
                        <br>
                        <input type="password" name ="pass1" id ="pass1" required>
                    </div>
                    <div class="campo">
                        <label for="">Vuelva a introducir contraseña </label>
                        <br>
                        <input type="password" name ="pass2" id ="pass2" required>
                    </div>
                    
                    <div class ="btn" >
                        <input type="submit" name ="delete" id ="delete" value ="Eliminar producto">
                    </div>              
                </form>
            </section>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// EDITAR STOCK -->
            <section id ="contraseña">
                <h2 class ="titulo" >Editar stock producto</h2>
                <form action="" method="post" name ="formPass" id = "formPass">
                    <div class="campo">
                        <label for="">Introduzca contraseña actual: </label>
                        <br>
                        <input type="password" name ="oldPass" id ="oldPass">
                    </div>
                    <div class="campo">
                        <label for="">Introduzca contraseña nueva: </label>
                        <br>
                        <input type="password" name ="newPass1" id ="newPass1">
                    </div>
                    <div class="campo">
                        <label for="">Vuelva a introducir contraseña nueva: </label>
                        <br>
                        <input type="password" name ="newPass2" id ="newPass2">
                    </div>
                    
                    <div class ="btn" >
                        <input type="submit" name ="btnUpdate" id ="btnUpdate" value ="Actualizar Contraseña">
                    </div>
                    
                </form>
            </section>
        </div>

        
    </div>
    <div class="clearFix"></div>
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