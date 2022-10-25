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
    <link rel="stylesheet" href="../../css/check.css">
    
    
</head>
<body>
    <div id ="container">
        <h1>Check in / Check Out</h1> 
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
                <li><a class="text-decoration-none" href="habitaciones.php">Habitaciones</a></li>
                <li><a class="text-decoration-none" href="check.php">Check</a></li>
                <li><a class="text-decoration-none" href="cancelaciones.php">Cancelaciones</a></li>
                <li>Proveedores</li>
                <li>Informes</li>
                <li>Salir</li>
            </ul>
        </nav>

        <form method ="post" name ="buscador" id = "buscador">
            <div id ="rut">
                <input id ="rutBlock" name ="rutBlock" type="text" placeholder="Ingrese código reserva">
            </div>
            <button type ="submit" id ="botonBuscar" name ="botonBuscar">Activar / Terminar reserva</button>
        </form>

        <?php
            include("../../php/consultas.php");
            if(isset($_POST['botonBuscar'])){
                $id = $_POST['rutBlock'];
                revisarRevision($id);
            }
        ?>
    
        <div id ="succesCheck" class="alert alert-success alert-dismissible fade show" role="alert">
            <p id ="check"></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


        <script src="../../js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../js/jquery-3.6.1.min.js"></script>
        <script src="../../js/scripts.js"></script>
    </div>
</body>
</html>