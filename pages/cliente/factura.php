<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostal Doña Clarita</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="js/factura.js"></script>
    <link type="text/css" rel="stylesheet" href="CSS/factura.css">
    <link rel="icon" href="img/dona.ico">
    <link rel="stylesheet" href="icon.css">


</head>

<body onload="slider()">

    <section>

        <ul class="menu">
            <li><img class="imgwe" src="img/dona.png"></li>
            <li><a href="inicio.php">INICIO</a></li>
            <li><a href="servicios.php">SERVICIOS</a></li>
            <li><a href="registro.php">REGISTRARSE</a></li>
            <li><a href="contacto.php">CONTACTO</a></li>
            <li><a href="clientes.php">NOSOTROS</a></li>
            <li><img class="imgabe" src="img/dona.png"></li>
        </ul>

    </section>

    <div class="banner">
        <div class="slider">
            <img src="img/hostal1.jpg" id="slideImg">
        </div>
        <div class="overlay">
            <script>
                var slideImg = document.getElementById("slideImg");

                var images = new Array(
                    "img/hostal2.jpg",
                    "img/hostal3.jpg",
                    "img/hostal1.jpg",
                    "img/hostal4.jpg"
                );

                var len = images.length;
                var i = 0;

                function slider() {
                    if (i > len - 1) {
                        i = 0;
                    }
                    slideImg.src = images[i];
                    i++;
                    setTimeout('slider()', 4000)
                }
            </script>
            <div class="container">

                <form action="" id="signupForm">

                    <div class="row">

                        <div class="col">

                            <h3 class="title">Factura</h3>

                            <div class="inputIMG">
                                <span>Tarjetas Aceptadas </span>
                                <img src="img/factura.png">
                            </div>

                            <div class="inputText">
                                <span>Nombre :</span>
                                <input type="text" placeholder="Pedro Aguilera" id="Nombre" name="Nombre">
                            </div>


                            <div class="inputText">
                                <span>Nombre Empresa :</span>
                                <input type="text" placeholder="Malvados y Asociados" id="NombreEmpresa" name="NombreEmpresa">
                            </div>

                            <div class="inputText">
                                <span>Ciudad :</span>
                                <input type="text" placeholder=" Viña del Mar" id="Ciudad" name="Ciudad">
                            </div>

                            <div class="inputBox">
                                <span>Correo Electronico Empresa:</span>
                                <input type="email" placeholder="Ejemplo@gmail.com" id="CorreoElectronicoEmpresa" name="CorreoElectronicoEmpresa">
                            </div>

                            <div class="inputText">
                                <span>Dirección Empresa :</span>
                                <input type="text" placeholder="Comuna / Calle / Número de edificio" id="DireccionEmpresa" name="DireccionEmpresa">
                            </div>

                            <div class="inputText">
                                <span>Rut Empresa :</span>
                                <input type="number" placeholder="25776281-6" class=" " id="RutEmpresa" name="RutEmpresa">
                            </div>
                            <div class="InputBox ">
                                <span>Código postal :</span>
                                <input type="number " placeholder="2430000 " pattern="[0-9]+ " id="CodigoPostal" name="CodigoPostal">
                            </div>

                            <div class="inputText">
                                <span>Telefono Empresa :</span>
                                <input type="number" placeholder="32-76851923" id="TelefonoEmpresa" name="TelefonoEmpresa">
                            </div>


                        </div>


                    </div>

                    <input type="submit" value="Verificar" class="submit-btn">
                    <div>
                        <button class="botonVolver" onclick="location.href='formulario.html'"> Volver</button>
                    </div>

                    <button></button>
                </form>

            </div>
        </div>
    </div>



</body>

</html>