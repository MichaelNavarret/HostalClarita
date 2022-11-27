<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
    $rutLog = $_GET["rutAdministrador"];
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
    <script src="../../js/scripts.js"></script>
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
            <h2>Portal Administrador </h2>
        </div>
        <div class="clearFix"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// CONTENIDO PRINCIPAL -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// INFORMACION PERSONAL -->
        <div class ="mainContainer">
            <section id ="informacion">
                <h2 class ="titulo" >Prueba de portales</h2>
                <iframe src="../../login_Empresa.php" frameborder="0" width="750" height="700"></iframe>
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