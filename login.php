
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
    <script src="js/login.js"></script>
    <link type="text/css" rel="stylesheet" href="CSS/login.css">
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
            <form class="formulario" id="signupForm" action="php/valLogin.php" method="post">

                <h1>Login Clientes</h1>
                <div class="contenedor">

                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Correo Electronico" name="uname" id="uname" required>

                    </div>

                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="password" placeholder="Contraseña" name="psw" id="psw" required>


                    </div>
                    <input type="submit" value="Ingresar" class="button">
                    <p>¿No tienes una cuenta? <a class="link" href="pages/cliente/registro.php">Registrate </a></p>
                    <a href="login_Empresa.php">Login Empresa</a>
                    <br><br>
                    <a href="index.php" title="Volver al inicio">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                    <?php
                        if($_GET){
                            $mensaje = $_GET["mensaje"];
                            ?>
                            <div class="men">
                                <p style ="color:red;"><?php echo($mensaje); ?></p>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>



</body>

</html>