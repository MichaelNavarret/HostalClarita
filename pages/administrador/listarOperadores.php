<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST["cerrar"])){

    }else{
        $rutLog = $_GET["rutAdministrador"];
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
    <link rel="stylesheet" type = "text/css" href="../../css/administrador/portalAdmin.css">
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
            <h2>Listar Operadores </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <div class="tablaProveedores">
                
                <a id ="btnAgregar" href="#" title ="Agregar Proveedor">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-patch-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                        <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                    </svg>
                </a>

                <dialog id ="popUpAgregar">
                    <form action="agregarOperador.php" method="post" name="formAdd" id="formAdd">
                    <h2>Agregar Operador</h2><br>
                    <p>Porfavor, evitar "ñ" y "tildes". Esto podria ocasionar que no se realice la insersión.</p>
                        <div class="campo">
                            <label for="">Rut Operador </label><br>
                            <input type="text" name="idOpe" id="idOpe" required maxlength="9">
                        </div>
                        <div class="campo">
                            <label for="">Nombre </label><br>
                            <input type="text" name="nombre" id="nombre" maxlength="30">
                        </div>
                        <div class="campo">
                            <label for="">Apellido Paterno </label><br>
                            <input type="text" name="apellidoPat" id="apellidoPat"  required maxlength="30"> 
                        </div>
                        <div class="campo">
                            <label for="">Apellido Materno </label><br>
                            <input type="text" name="apellidoMat" id="apellidoMat"  required maxlength="30">
                        </div>
                        <div class="campo">
                            <label for="">Fecha Nacimiento </label><br>
                            <input type="date" name="fechaNac" id="fechaNac"  required>
                        </div>
                        <div class="campo">
                            <label for="">Fecha Contrato </label><br>
                            <input type="date" name="fechaCon" id="fechaCon"  required>
                        </div>
                        <div class="campo">
                            <label for="">Correo </label><br>
                            <input type="text" name="correo" id="correo"  required maxlength="50"> 
                        </div>
                        <div class="campo">
                            <label for="">Telefono </label><br>
                            <input type="number" name="telefono" id="telefono"  required max="9">
                        </div>
                        <div class="campo">
                            <label for="">Contraseña </label><br>
                            <input type="text" name="clave" id="clave"  required>
                        </div>
                        <div class="campo">
                            <label for="habilitado">¿Habilitado para realizar ordenes?</label><br><br>
                            <select name="habilitado" id="habilitado">
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <input type="hidden" name="rutAdministrador" id="rutAdministrador" value="<?php echo($rutLog); ?>">
                        <input type="submit" value="Enviar" name="enviar" id="enviar">
                    </form>
                </dialog>

                <table id="proveedores">
                    
                    <tr id="cabecera">
                        <td>Rut Operador</td>
                        <td>Nombre</td>
                        <td>Fecha Contrato</td>
                        <td>Correo</td>
                        <td>Numero</td>
                        <td>¿Habilitado?</td>
                        <td>Contraseña</td>
                        <td>Editar</td>
                    </tr>
                    <?php
                        $consulta=" SELECT OH.rutOperador Rut,
                                            OH.nombre + ' ' + OH.apellidoPat + ' ' + OH.apellidoMat Nombre,
                                            CONVERT(VARCHAR, OH.fechaContrato, 111) FechaContrato,
                                            OH.correo Correo,
                                            FORMAT(OH.numero, '+56 #########') Telefono,
                                            OH.habilitado Habilitado,
                                            U.clave Clave
                                    FROM OperadorHostal AS OH
                                    JOIN Usuario AS U ON OH.rutOperador = U.rutUsuario;";
                        $ejectuar = sqlsrv_query($conn, $consulta);
                        $i=0;
                        while($fila=sqlsrv_fetch_array($ejectuar)){
                            $rut=$fila["Rut"];
                            $nombre=$fila["Nombre"];
                            $fContrato=$fila["FechaContrato"];
                            $correo=$fila["Correo"];
                            $telefono = $fila["Telefono"];
                            $habilitado = $fila["Habilitado"];
                            $clave = $fila["Clave"];
                            $i++;
                            ?>
                                <tr id="contenido">
                                    <td><?php echo($rut); ?></td>
                                    <td class ="color"><?php echo($nombre); ?></td>
                                    <td><?php echo($fContrato); ?></td>
                                    <td class ="color"><?php echo($correo); ?></td>
                                    <td><?php echo($telefono); ?></td>
                                    <td class ="color"><?php echo($habilitado); ?></td>
                                    <td><?php echo($clave); ?></td>
                                    <td class ="color"> 
                                        <a href="editarOperador.php?rutOperador=<?php echo($rut); ?>&rutAdministrador=<?php echo($rutLog); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        </a>

                                        <a href="borrarOperador.php?rutOperador=<?php echo($rut); ?>&rutAdministrador=<?php echo($rutLog); ?> " onclick="return eliminarProveedor()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                            <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
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

        
    </div>
    <div class="clearFix"></div>
    <footer>
        <div class="pie">
            
        </div>
        
    </footer>

                      
</body>
<script src="../../js/scriptsAdmin.js"></script>  
</html>