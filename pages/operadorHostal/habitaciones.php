<!--DESARROLLADO POR MICHAEL NAVARRETE-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Operador - Hostal Doña Clarita</title>
    
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/habitaciones.css">
    
    
</head>
<body>
    <div id ="container">
        <h1>Habitaciones</h1> 
        <div id ="tarjetaUsuario">
            <div id="imagenPerfil">
                Imagen de Perfil
            </div>
            <div id="datos">
                <div class ="campo">
                    <label for=""><strong>Nombre Operador:</strong></label>
                    <label for="">Nombre</label>
                </div>
                <div class ="campo">
                    <label for=""><strong>Edad:</strong> </label>
                    <label for="">XX años </label>
                </div>
                <div class ="campo">
                    <label for=""><strong>Email:</strong></label>
                    <label for="">email@gmail.com </label>
                </div>
            </div>
        </div>
        <div id ="logo">
            <img id ="logoImage" src="../../img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg" alt="logo">
        </div>
        <div id ="textoLogo">
            <h2 id ="first">Hostal</h2>
            <h2 id ="second">Doña Clarita</h2>
        </div>

        <div class="clearFix"></div>

        <nav id="menu" >
            <ul >
                <li><a class="text-decoration-none" href="portalOperador.html">Inicio</a> </li>
                <li id="hab"><a class="text-decoration-none" href="habitaciones.php">Habitaciones</a></li>
                <li><a class="text-decoration-none" href="check.html">Check</a></li>
                <li><a class="text-decoration-none" href="cancelaciones.html">Cancelaciones</a></li>
                <li><a class="text-decoration-none" href="proveedores.html">Proveedores</a></li>
                <li><a class="text-decoration-none" href="informes.html">Informes</a></li>
                <li><a class="text-decoration-none" href="#">Salir</a> </li>
            </ul>
        </nav>
    </div>
    <?php
        include("../../php/consultas.php");
        mostrarHabitaciones();
    ?>

    <!--SCRIPTS-->
    <script src="../../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.6.1.min.js"></script>
    <script src="../../js/scripts.js"></script>
   
</body>
</html>