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
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores/proveedores.css">
    <script src="../../js/scripts.js"></script>
</head>
<body>
    
    <div id ="container">
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// MENU -->
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
                        <li><a href="adminProductos.php?rutProveedor=<?php global $rutLog; echo($rutLog) ?>">Agregar Productos</a></li>                           
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a id ="salir" href="../../index.php">Salir</a> </li>
            </ul>
        </nav>
        <div class="clearFix"></div>

        <div id ="miniBanner">
            <h2>Portal Proveedores </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <section id ="informacion">
                <h2 class ="titulo" >Información Personal</h2>

                <?php
                    global $rutLog;
                    $consulta = "  SELECT	P.rutProveedor RUT,
                                            P.direccion DIRECCION,
                                            P.nombre NOMBRE,
                                            R.nombre RUBRO
                                    FROM Proveedor AS P
                                    JOIN Rubro AS R ON P.idRubro = R.idRubro
                                    WHERE P.rutProveedor = '$rutLog';";
                    $ejecutar = sqlsrv_query($conn, $consulta);
                    $i = 0;
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $rut = $fila['RUT'];
                        $adress = $fila['DIRECCION'];
                        $name = $fila['NOMBRE'];
                        $rubro = $fila['RUBRO'];
                    } 
                ?>

                <ul id ="datos" >
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Rut (Usuario):</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($rut); ?></p>
                        </div>
                         
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Nombre Proveedor:</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($name); ?> </p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Direccion:</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($adress); ?> </p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Rubro:</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($rubro); ?> </p>
                        </div>    
                    </li>
                </ul>
            </section>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// Contraseña -->
            <section id ="contraseña">
                <h2 class ="titulo" >Actualice su contraseña</h2>
                <form action="" method="post" name ="formPass" id = "formPass" >
                    <div class="campo">
                        <label for="">Introduzca contraseña actual: </label>
                        <br>
                        <input type="password" name ="oldPass" id ="oldPass" required>
                    </div>
                    <div class="campo">
                        <label for="">Introduzca contraseña nueva: </label>
                        <br>
                        <input type="password" name ="newPass1" id ="newPass1" required  minlength = 12 maxlength = 30>
                    </div>
                    <div class="campo">
                        <label for="">Vuelva a introducir contraseña nueva: </label>
                        <br>
                        <input type="password" name ="newPass2" id ="newPass2" required minlength = 12 maxlength = 30>
                    </div>
                    
                    <div id ="btn" >
                        <input type="submit" name ="btnUpdate" id ="btnUpdate" value ="Actualizar Contraseña">
                    </div>
                    
                </form>
                <?php
                    include('../../php/connection.php');
                    global $rutLog;
                    if(isset($_POST['btnUpdate'])){
                        $oldPass = $_POST["oldPass"];
                        $newPass = $_POST["newPass1"];
                        $newPass2 = $_POST["newPass2"];
                        $consulta = " SELECT clave Clave  FROM Usuario WHERE rutUsuario = '$rutLog';";
                        $ejecutar = sqlsrv_query($conn, $consulta);
                        $i=0;
                        while($fila=sqlsrv_fetch_array($ejecutar)){
                            $pass = $fila["Clave"];
                            $i++;
                        }
                        if($oldPass == $pass){
                            if($newPass == $newPass2){
                                $consulta = "   UPDATE Usuario
                                                SET clave = '$newPass'
                                                WHERE rutUsuario = '$rutLog';";
                                $ejecutar = sqlsrv_query($conn, $consulta);
                        ?>
                            <p class ="mensaje" id="success" >Contraseña actualizada exitosamente</p>
                        <?php
                            }else{                                
                        ?>
                            <p class ="mensaje" id="fail">Contraseñas no coinciden</p>
                        <?php
                            }
                        }else{
                        ?>
                        <p class ="mensaje" id="fail" >Contraseña Actual incorrecta</p>
                        <?php
                        }
                    }    
                        ?>
            </section>
        </div>

        
    </div>
    <div class="clearFix"></div>
    <footer>
        <div class="pie">
            <p >Todos los derechos reservados &copy; Michael Navarrete Cartes 2022 </p>
        </div>
        
    </footer>

</body>
</html>