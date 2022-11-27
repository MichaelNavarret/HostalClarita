<?php
    $usuario = $_GET["usuario"];
?>

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


    <link type="text/css" rel="stylesheet" href="CSS/servicios.css">
    <link rel="icon" href="img/dona.ico">
    <link rel="stylesheet" href="icon.css">


</head>

<body onload="slider()">

    <section>

        <ul class="menu">
            <li><img class="imgwe" src="img/dona.png"></li>
            <li><a href="servicios.php?usuario=<?php echo($usuario); ?>">SERVICIOS</a></li>
            <li><a href="consultarReserva.php?usuario=<?php echo($usuario); ?>">CONSULTAR RESERVA</a></li>
            <li><a href="../../index.php">SALIR</a></li>
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

            <div class="casilla">


                <form class="card" action = "formulario.php" >
                    <div class="card-image"></div>
                    <div class="card-text">
                        <h2>Habitación Individual</h2>
                        <p>Esta clase de habitación es perfecta para la clase de cliente que viaja de manera solitaria, debido a su buen espacio y servicio que ofrece.</p>
                    </div>
                    <div class="card-stats">
                        <div class="stat">
                            <input type="hidden" name="tipo" id="tipo" value="1">
                            <input type="hidden" name="usuario" id="usuario" value="<?php echo($usuario) ?>">
                            <div class="value"><input type="submit" value="Reservar $64.990" id ="reservaIndividual" name ="reservaIndividual"></div>
                        </div>
                    </div>
                </form>
                <form class="card" action = "formulario.php">
                    <div class="card-image card2"></div>
                    <div class="card-text card2">

                        <h2>Habitación Grupal</h2>
                        <p>Esta clase de habitación posee una cama familiar, dos literas y dos camas individuales, además de ofrecer a su vez un ambiente tranquilo al igual que la habitación de tipo individual.</p>
                    </div>
                    <div class="card-stats card2">
                        <div class="stat">
                            <input type="hidden" name="tipo" id="tipo" value="2">
                            <input type="hidden" name="usuario" id="usuario" value="<?php echo($usuario) ?>">
                            <div class="value"><input type="submit" value="Reservar $110.000" id ="reservaGrupal" name ="reservaGrupal"></div>
                        </div>

                    </div>
                </form>
                <form class="card">
                    <div class="card-image card3"></div>
                    <div class="card-text card3">
                        <h2>Comedor</h2>
                        <p>Contamos con un gran salon donde tenemos todo tipo de alimentos para todos nuestros huésped. </p>
                    </div>
                    <div class="card-stats card3">
                        <div class="stat">
                            <input type="hidden" name="usuario" id="usuario" value="<?php echo($usuario) ?>">
                            <div class="value"><input type="submit" value="Consultar Horarios" id ="verHorario" name ="verHorario"></div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>