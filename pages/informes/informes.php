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
    <link rel="stylesheet" href="../../css/informes.css">
    
    
</head>
<body>
    <div id ="container">
        <h1>Generador de Informes</h1> 
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
        <div id="contentInfo">
            <div class id="downloadInfo">
                <h3>Seleccionar Informe a descargar</h3>
                <div id ="selector">
                    <select name="informe-name" id="informe-name">
                        <option value="01">Registro de ventas</option>
                        <option value="02">Registro de sesion</option>
                        <option value="03">Registro de pedidos</option>
                        <option value="04">Registro de visitas web</option>
                    </select>
                </div>
                <div class="clearFix"></div>
                <button type ="submit"  id="btnDownload" onclick="download()" >Download</button>
                <div class="alert alert-info" role="alert" id="alerta">
                    <p id="infoDown"></p>
                  </div>
            </div>
        </div>

        <div>
            <button type="submit" onclick="location.href='informeClientes.php'"> Informe de Clientes</button>
        </div>

        <div>
            <button type="submit" onclick="location.href='informeProveedores.php'"> Informe de Proveedores</button>
        </div>

        <div>
            <button type="submit" onclick="location.href='informeHuespedes.php'"> Informe de Huespedes</button>
        </div>



    </div>
    

    <!--Scripts-->
    <script src="../../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.6.1.min.js"></script>
    <script src="../../js/scripts.js"></script>
</body>
</html>