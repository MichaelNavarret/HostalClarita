<!--DESARROLLADO POR MICHAEL NAVARRETE-->
<?php
    include('../../php/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Proveedores - Hostal Doña Clarita</title>

    <link rel="icon" href="img/WhatsApp Image 2022-09-21 at 3.07.35 PM.jpeg">
    <link rel="stylesheet" type = "text/css" href="../../css/proveedores.css">
    <script src="../../js/scripts.js"></script>
</head>
<body>
    
    <div id ="container">
        <h1>Portal Proveedores</h1> 
        <div id ="tarjetaUsuario">
            <div id="imagenPerfil">
                Imagen de Perfil
            </div>
            <div id="datos">
                <div class ="campo">
                    <label for=""><strong>Proveedor:</strong></label>
                    <label for="">Proveedor</label>
                </div>
                <div class ="campo">
                    <label for=""><strong>Rubro:</strong> </label>
                    <label for="">Rubro </label>
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

        <nav id="menu">
            <ul>
                <li><a href="portalProveedores.php">Inicio</a> </li>
                <li><a href="infoPedido.php"> Detalle Orden </a></li>
                <li><a href="#">Salir</a> </li>
            </ul>
        </nav>
        <br>
        
        <form id ="buscador" name="buscador" method="post" action="">
            <p id ="mensajeAyuda">Ingrese Id de la Orden de pedido</p>
            <div id ="rut">
                <input id ="rutBlock" name ="rutBlock" type="number" name ="rut" placeholder="Ingrese ID de la Orden" min=1 >
            </div>
            <button type ="submit" id ="botonBuscar" name ="botonBuscar"> Buscar Orden </button>
        </form>
        
        <?php
            include('../../php/consultas.php');
            if(isset($_POST['botonBuscar'])){
                $id = $_POST['rutBlock'];
                detalle_Orden($id);
            }
        ?>
    </div>
</body>
</html>