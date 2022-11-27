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
            <h2>Generador de informes </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <section id ="generador">
                <h2 class ="titulo" >Generador</h2>

                   <ul id="datos">
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Informe de reservas</strong> </h4>
                                <p class="datoCampoContentBtn"><a href="informes/informeReservas.php" target="_blank">Generar</a></p>
                            </div>
                            
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Informe de habitaciones</strong> </h4>
                                <p class="datoCampoContentBtn"><a href="informes/informeHabitaciones.php" target="_blank">Generar</a></p>
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Informe de Ordenes de Compra</strong> </h4>
                                <p class="datoCampoContentBtn"><a href="informes/informeOrdenesProducto.php" target="_blank">Generar</a></p>
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Informe de Ordenes de recepcion</strong> </h4>
                                <p class="datoCampoContentBtn"><a href="informes/informeOrdenesRecepcion.php" target="_blank">Generar</a></p>
                            </div>    
                        </li>
                        <li>
                            <div class ="datoCampo" >
                                <h4 class ="datoCampoTitulo"><strong>Informe de proveedores</strong> </h4>
                                <p class="datoCampoContentBtn"><a href="informes/informeProveedores.php" target="_blank">Generar</a></p>
                            </div>    
                        </li>
                   </ul>
            </section>
        </div>                          
    </div>
    <div class="clearFix"></div>
    <footer>
        <div class="pie">
        </div>
        
    </footer>

</body>
</html>