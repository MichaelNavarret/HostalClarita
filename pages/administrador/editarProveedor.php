<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    $rutLog = $_GET["rutAdministrador"];
    $rutProv = $_GET["rutProveedor"];
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
                <a href="#"> Operadores </a>
                </li>
            </ul>
            <ul>
                <li><a id ="salir" href="../../index.php">Salir</a> </li>
            </ul>
        </nav>
        <div class="clearFix"></div>
        <div id ="miniBanner">
            <h2>Editar Proveedor </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <?php
                $obtenerProveedor = "SELECT P.rutProveedor Rut,
                                            P.direccion Direccion,
                                            P.nombre Nombre,
                                            R.nombre Rubro,
                                            U.clave Clave
                                    FROM Proveedor AS P
                                    JOIN Rubro AS R ON P.idRubro = R.idRubro
                                    JOIN Usuario AS U ON U.rutUsuario = P.rutProveedor
                                    WHERE rutProveedor = '$rutProv';";
                $ejecutar = sqlsrv_query($conn, $obtenerProveedor);
                $i=0;
                while($fila=sqlsrv_fetch_array($ejecutar)){
                    $idProv = $fila["Rut"];
                    $direc = $fila["Direccion"];
                    $nombre = $fila["Nombre"];
                    $rubro = $fila["Rubro"];
                    $clave = $fila["Clave"];
                    $i++;
                    ?>
                    
                    <form id="proveedores" method = "post" action="editarProvProceso.php" >
                        <br>
                        <h2>Actualizar Información</h2>
                        <div class="campo">
                            <label for="">Rut Proveedor </label><br>
                            <input type="text" name="rutProv" id="rutProv" value="<?php echo($idProv) ?>" disabled>
                        </div>
                        <div class="campo">
                            <label for="">Nombre </label><br>
                            <input type="text" name="nombre" id="nombre" value="<?php echo($nombre) ?>">
                        </div>
                        <div class="campo">
                            <label for="">Direccion </label><br>
                            <input type="text" name="direccion" id="direccion" value="<?php echo(utf8_encode($direc)) ?>" >
                        </div>
                        <div class="campo">
                            <label for="">Contraseña </label><br>
                            <input type="text" name="clave" id="clave" value="<?php echo($clave) ?>" >
                        </div>
                        <div class="campo">
                            <label for="rubro">Rubro (Actualmente: <?php echo($rubro) ?>)</label><br><br>
                            <select name="rubro" id="rubro">
                                <option value="1">Alimentos</option>
                                <option value="2">Articulos del Hogar</option>
                                <option value="3">Carnieceria</option>
                                <option value="4">Elementos de Limpieza</option>
                                <option value="5">Equipo de oficina y muebles</option>
                                <option value="6">Equipo Electrico</option>
                                <option value="7">Fabrica de colchones y frazadas</option>
                            </select>
                        </div>
                        <input type="hidden" name="rutProv" id="rutProv" value="<?php echo($idProv); ?>">
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