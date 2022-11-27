<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    $rutLog = $_GET["rutAdministrador"];
    $rutOpe = $_GET["rutOperador"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Proveedores - Hostal Doña Clarita</title>

    <link rel="icon" href="img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg">
    <link rel="stylesheet" type = "text/css" href="../../css/administrador/portalAdmin.css">
    <script src="../../js/scriptsAdmin.js"></script>
</head>
<body>
    
    <div id ="container">
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// MENU -->
        <nav id="menu">
            <ul id ="ul01" >
                <li><a href="portalAdministrador.php?rutAdministrador=<?php global $rutLog; echo($rutLog) ?>">Inicio</a> </li>
                <li>
                    <a href="listarProveedores.php?rutAdministrador=<?php echo($rutLog); ?>"> Proveedores </a>
                </li>
                <li>
                    <a href="listarOperadores.php?rutAdministrador=<?php echo($rutLog); ?>"> Operadores </a>
                </li>
            </ul>
            <ul>
                <li><a id ="salir" href="../../index.php">Salir</a> </li>
            </ul>
        </nav>
        <div class="clearFix"></div>
        <div id ="miniBanner">
            <h2>Editar Operador </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <?php
                $obtenerOperador = "SELECT OH.rutOperador Rut,
                                            OH.nombre Nombre,
                                            OH.apellidoPat ApellidoPaterno,
                                            OH.apellidoMat ApellidoMaterno,
                                            CONVERT(VARCHAR, OH.fechaContrato, 111) FechaContrato,
                                            OH.correo Correo,
                                            OH.numero Telefono,
                                            OH.habilitado Habilitado,
                                            U.clave Clave
                                    FROM OperadorHostal AS OH
                                    JOIN Usuario AS U ON OH.rutOperador = U.rutUsuario
                                    WHERE OH.rutOperador = '$rutOpe';";
                $ejecutar = sqlsrv_query($conn, $obtenerOperador);
                $i=0;
                while($fila=sqlsrv_fetch_array($ejecutar)){
                    $idOpe = $fila["Rut"];
                    $nombre = $fila["Nombre"];
                    $apellidoPat = $fila["ApellidoPaterno"];
                    $apellidoMat = $fila["ApellidoMaterno"];
                    $fechaContrato = $fila["FechaContrato"];
                    $correo = $fila["Correo"];
                    $telefono = $fila["Telefono"];
                    $habilitado = $fila["Habilitado"];
                    $clave = $fila["Clave"];
                    $i++;
                    ?>
                    <form id="proveedores" method = "post" action="editarOpeProceso.php" >
                        <br>
                        <h2>Actualizar Información</h2>
                        <div class="campo">
                            <label for="">Rut Operador </label><br>
                            <input type="text" name="idOpe" id="idOpe" value="<?php echo($idOpe) ?>" disabled>
                        </div>
                        <div class="campo">
                            <label for="">Nombre </label><br>
                            <input type="text" name="nombre" id="nombre" value="<?php echo($nombre) ?>">
                        </div>
                        <div class="campo">
                            <label for="">Apellido Paterno </label><br>
                            <input type="text" name="apellidoPat" id="apellidoPat" value="<?php echo($apellidoPat) ?>" >
                        </div>
                        <div class="campo">
                            <label for="">Apellido Materno </label><br>
                            <input type="text" name="apellidoMat" id="apellidoMat" value="<?php echo($apellidoMat) ?>" >
                        </div>
                        <div class="campo">
                            <label for="">Correo </label><br>
                            <input type="text" name="correo" id="correo" value="<?php echo($correo) ?>" >
                        </div>
                        <div class="campo">
                            <label for="">Telefono </label><br>
                            <input type="text" name="telefono" id="telefono" value="<?php echo($telefono) ?>" >
                        </div>
                        <div class="campo">
                            <label for="">Contraseña </label><br>
                            <input type="text" name="clave" id="clave" value="<?php echo($clave) ?>" >
                        </div>
                        <div class="campo">
                            <label for="habilitado">¿Habilitado para realizar ordenes?</label><br><br>
                            <select name="habilitado" id="habilitado">
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <input type="hidden" name="rutProv" id="rutProv" value="<?php echo($idOpe); ?>">
                        <input type="hidden" name="rutAdministrador" id="rutAdministrador" value="<?php echo($rutLog); ?>">
                        <input type="submit" value="Enviar" name="enviar" id="enviar" onclick="return editarProveedor()">
                    </form>
                    <?php
                }
            ?>
        </div>

        
    </div>
    <div class="clearFix"></div>
    <footer>
        <div class="pie">
            
        </div>
        
    </footer>

</body>
</html>