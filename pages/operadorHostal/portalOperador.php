<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    $rutLog = $_GET["rutOperador"];
    $consultarHabilitacion =  "SELECT habilitado HAB FROM OperadorHostal
                                WHERE rutOperador = '$rutLog';";
    $ejecutar = sqlsrv_query($conn, $consultarHabilitacion);
    $i=0;
    while($fila=sqlsrv_fetch_array($ejecutar)){
        $habilitado = $fila["HAB"];
        $i++;
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
    <link rel="stylesheet" type = "text/css" href="../../css/operador/portalOperador.css">
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
            <h2>Portal Operador Hostal </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <section id ="informacion">
                <h2 class ="titulo" >Información Personal</h2>

                <?php
                    global $rutLog;
                    $consulta = "  SELECT	rutOperador RUT,
                                            nombre + ' ' + apellidoPat + ' ' + apellidoMat OPERADOR,
                                            correo Correo,
                                            CONCAT('+56 ', numero) Telefono
                                    FROM OperadorHostal
                                    WHERE rutOperador = '$rutLog';";
                    $ejecutar = sqlsrv_query($conn, $consulta);
                    $i = 0;
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $rut = $fila['RUT'];
                        $name = $fila['OPERADOR'];
                        $email = $fila['Correo'];
                        $num = $fila['Telefono'];
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
                            <h4 class ="datoCampoTitulo"><strong>Nombre:</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($name); ?> </p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Correo:</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($email); ?> </p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>Celular:</strong> </h4>
                            <p class ="datoCampoContent"><?php echo($num); ?> </p>
                        </div>    
                    </li>
                    <li>
                        <div class ="datoCampo" >
                            <h4 class ="datoCampoTitulo"><strong>¿Habilitado para generar ordenes?</strong> </h4>
                            <p class ="datoCampoContent">
                                <?php 
                                    if($habilitado == 'S'){
                                        echo("Si");
                                    }else{
                                        echo("No");
                                    }
                                ?> 
                            </p>
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