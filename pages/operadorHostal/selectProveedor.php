<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    if(isset($_POST['buscar'])){

    }else{
        $rutLog = $_GET["rutOperador"];
        $consultarHabilitacion =  "SELECT habilitado HAB FROM OperadorHostal
                                WHERE rutOperador = '$rutLog';";
        $ejecutar = sqlsrv_query($conn, $consultarHabilitacion);
        $i=0;
        while($fila=sqlsrv_fetch_array($ejecutar)){
            $habilitado = $fila["HAB"];
            $i++;
        }
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal OperadorHostal - Hostal Doña Clarita</title>

    <link rel="icon" href="img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg">
    <link rel="stylesheet" type = "text/css" href="../../css/operador/ordenCompra.css">
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
            <h2>Seleccione Proveedor </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// BUSCADOR -->
        <div class ="filtros">
            <form action="" method ="post" id ="filtros" name="filtros">
                <div class="campo">
                    <input type="text" name="contBuscador" id="contBuscador" placeholder="Ingrese rut a buscar">
                </div>
                <div class ="campo">
                    <input type="submit" value="Buscar" name="btn" id="btn">
                </div>
            </form>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// LISTA DE RESERVAS -->
        <div class ="mainContainer">
            <div class="filtros">

            </div>

            <div class="reservas">
                <table id ="tablaReservas">
                    <tr id="cabeceraTabla">
                        <td>Proveedor</td>
                        <td>Rubro</td>
                        <td>Generar orden </td>
                    </tr>
                <?php
                    if(isset($_POST['btn'])){
                        $contBuscador = $_POST['contBuscador'];
                        $consulta = "   SELECT	P.rutProveedor RUT,
                                                P.nombre PROVEEDOR,
                                                R.nombre RUBRO
                                        FROM Proveedor AS P
                                        JOIN Rubro AS R On P.idRubro = R.idRubro
                                        WHERE P.rutProveedor LIKE '$contBuscador%' OR P.nombre LIKE '$contBuscador%' OR R.nombre LIKE '$contBuscador%' 
                                        ORDER BY R.nombre DESC;";
                    }else{
                        $consulta = "SELECT	P.rutProveedor RUT,
                                            P.nombre PROVEEDOR,
                                            R.nombre RUBRO
                                    FROM Proveedor AS P
                                    JOIN Rubro AS R On P.idRubro = R.idRubro
                                    ORDER BY R.nombre DESC;";
                        
                    }
                    $ejecutar = sqlsrv_query($conn, $consulta);
                    $i=0;
                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $rut = $fila["RUT"];
                        $proveedor = $fila["PROVEEDOR"];
                        $rubro = $fila["RUBRO"];
                        $i++;
                        ?>
                        <tr id="contenidoTabla">
                            <td><?php echo($proveedor); ?></td>
                            <td><?php echo($rubro); ?></td>
                            <td>
                                <a href="generarOrden.php?rutOperador=<?php echo($rutLog); ?>&rutProveedor=<?php echo($rut); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="#7dafd1" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                </table>
                <?php
                if($i == 0){
                        ?>
                        <h2>Los parametros de busqueda no coinciden con ningún resultado</h2>
                        <?php
                    }
                ?>
            </div>
            
        </div>

        
    </div>
 
</body>
</html>