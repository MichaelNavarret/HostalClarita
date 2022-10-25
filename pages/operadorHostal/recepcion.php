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
    <link rel="stylesheet" href="../../css/cancelaciones_proveedores.css">
    
    
</head>
<body>
    <div id ="container">
        <h1>Proveedores</h1> 
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
        <br>
        <div id ="recepContainer">
            <h2>Recepcion de Orden de pedido</h2>
            <form action="">
                <div class ="campo">
                    <label for="nroPedido"> Ingrese numero de pedido: </label>
                    <input type="number" name ="nroPedido" id ="nroPedido">
                </div>
                <div class ="campo">
                    <label for=""> Seleccionar el estado:  </label>
                    <select name="estado-name" id="estado-name">
                        <option value="01">Aceptado</option>
                        <option value="02">Rechazado</option>
                    </select>
                </div>
                <div class ="campo">
                    <label for="w3review">Observacion</label>
                    <br>
                    <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                </div>

                <button id ="btnEnviar" class ="campo" type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <br>
    <!--Scripts-->
    <script src="../../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.6.1.min.js"></script>
    <script src="../../js/scripts.js"></script>
</body>
</html>