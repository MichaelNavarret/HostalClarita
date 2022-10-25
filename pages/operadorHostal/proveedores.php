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
    </div>
    <br>
    <div class ="main" id="proveedores">
        <div id = "tableContainer">
            <h2 id ="tituloTabla">Proveedores</h2>
            <table id="tabla">
                <tr id = "cabecera">
                    <td><strong>Proveedor</strong></td>
                    <td><strong>Rubro</strong></td>
                </tr>
                <tr>
                    <td>TFC Productions</td>
                    <td>Mercadería</td>
                </tr>
                <tr>
                    <td>TFC Productions</td>
                    <td>Mercadería</td>
                </tr>
                <tr>
                    <td>TFC Productions</td>
                    <td>Mercadería</td>
                </tr>
                <tr>
                    <td>TFC Productions</td>
                    <td>Mercadería</td>
                </tr>
            </table>
        </div>

        
        <div class="btns">
            <button type ="submit" id ="btn1" onclick="generarOrden()" >Generar Orden de compra</button>
            <button type ="submit" id ="btn2" onclick="recepcionarOrden()">Recepcionar oden de compra</button>
        </div>
    </div>
    <div class ="main" id="ordenCompra">
        <h3>Seleccionar el proveedor</h3>
        <div id ="selector">
            <select name="proveedor-name" id="proveedor-name">
                <option value="prv01">Proveedor01</option>
                <option value="prv02">Proveedor02</option>
                <option value="prv02">Proveedor03</option>
                <option value="prv02">Proveedor04</option>
            </select>
        </div>
        <div id="file">
            <p>A continuación, suba el archivo excel que
                contiene la plantilla de productos del
                pedido.
            </p>
            <input type="file">
        </div>
        <button type ="submit"  id="btnSubir" >Subir</button>
    </div>
    <!--Scripts-->
    <script src="../../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.6.1.min.js"></script>
    <script src="../../js/scripts.js"></script>
</body>
</html>