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
    <!--<script src="js/registro.js"></script>-->
    <link type="text/css" rel="stylesheet" href="CSS/registro.css">
    <link rel="icon" href="img/dona.ico">
    <link rel="stylesheet" href="icon.css">


</head>

<body onload="slider()">

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

            <form class="formulario" id="signupForm" method ="post" action ="php/registrarEmpresa.php">

                <h1>Registrate</h1>
                <div class="contenedor">

                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Nombre empresa" name="name" id="name">

                    </div>

                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Correo Electronico" name="email" id="email">

                    </div>

                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="password" placeholder="Contraseña" name="pass" id="pass">

                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Rut empresa" name="rut" id="rut">

                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Teléfono" name="number" id="number">

                    </div>

                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Direccion" name="direc" id="direc">

                    </div>

                    <input type="submit" value="Registrate" class="button">
                    <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                    <p>¿Ya tienes una cuenta?<a class="link" href="../../login.php">Iniciar Sesion</a></p>
                </div>
            </form>
        </div>
    </div>



</body>

</html>