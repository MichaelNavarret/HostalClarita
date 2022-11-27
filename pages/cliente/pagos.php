<?php
    $tipo = $_GET["tipo"];
    $reserva = $_GET["reserva"];
    $usuario = $_GET["usuario"];
    $recibo = $_GET["recibo"];
    if($tipo == 1){
        $total = 64990;
    }else{
        $total = 110000;
    }
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
    <!--<script src="js/pagos.js"></script>-->
    <link type="text/css" rel="stylesheet" href="CSS/pagos.css">
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
            <div class="container">
                <?php
                    if($recibo == "FACTURA"){
                        ?>
                            <!-- FORMULARIO FACTURA -->
                             <form action="php/pagarReservaFactura.php" id="signupForm" method="post">
                                <h1>Datos Factura</h1>
                                <div class="row">

                                    <div class="col">
                                            
                                            <h3 class="title">Datos Personales</h3>

                                            <div class="inputText">
                                                <span>Nombre Completo :</span>
                                                <input type="text" placeholder="Lucas Aguirre" id="NombreCompleto" name="NombreCompleto">
                                            </div>

                                            <div class="inputBox">
                                                <span>Email :</span>
                                                <input type="email" placeholder="Ejemplo@gmail.com" id="Email" name="Email">
                                            </div>
                                            <div class="inputText">
                                                <span>Dirección :</span>
                                                <input type="text" placeholder="Comuna / Calle / Número de Casa" id="Direccion" name="Direccion">
                                            </div>

                                            <div class="inputText">
                                                <span>Ciudad :</span>
                                                <input type="text" placeholder="Quilpué" class="" id="Ciudad" name="Ciudad">
                                            </div>

                                            <div class="flex">
                                            <div class="InputBox">
                                                <span>Comuna :</span>
                                                <input type="text" placeholder="Viña del Mar" id="Comuna" name="Comuna">
                                            </div>
                                            <div class="InputBox">
                                                <span>Código postal :</span>
                                                <input type="text" placeholder="2430000" pattern="[0-9]+" id="CodigoPostal" name="CodigoPostal">
                                            </div>
                                        </div>

                                        </div>

                                        <div class="col">

                                            <h3 class="title">Pago</h3>

                                            <div class="inputIMG">
                                                <span>Tarjetas aceptadas :</span>
                                                <img src="img/pagos.png" alt="">
                                            </div>

                                            <div class="inputText">
                                                <span>Nombre Titular Tarjeta :</span>
                                                <input type="text" placeholder="Sergio Aguilera" id="TitularTarjeta" name="TitularTarjeta">
                                            </div>

                                            <div class="inputBox">
                                                <span>Número de Tarjeta  :</span>
                                                <input type="text" placeholder="1111-2222-3333-4444" id="Nrotarjeta" name="Nrotarjeta" pattern="[0-9]+">
                                            </div>

                                            <div class="inputText">
                                                <span>Mes de caducidad :</span>
                                                <input type="text" placeholder="05" id="Mesdecaducidad" name="Mesdecaducidad" pattern="[0-9]+">
                                            </div>

                                            <div class="flex">
                                                <div class="InputBox">
                                                    <span>Año de caducidad :</span>
                                                    <input type="text" placeholder="2028" id="Añodecaducidad" name="Añodecaducidad" pattern="[0-9]+">
                                                </div>
                                                <div class="InputBox">
                                                    <span>CVV :</span>
                                                    <input type="text" placeholder="345" id="CVV" name="CVV" pattern="[0-9]+">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <input type="hidden" name="usuario" value = "<?php echo($usuario); ?>" id ="usuario">
                                    <input type="hidden" name="idReserva" value = "<?php echo($reserva); ?>" id ="idReserva">
                                    <input type="hidden" name="tipoReserva" value = "<?php echo($tipo); ?>" id ="idReserva">
                                    <input type="submit" value="<?php echo("Pagar: $" . $total) ?>" class="submit-btn">
                            </form>

                        <?php
                    }else{
                        #FORMULARIO DE BOLETA
                        ?>
                            <form action="php/pagarReservaBoleta.php" id="signupForm" method="post">
                            <h1>Datos Boleta</h1>
                            <div class="row">

                                <div class="col">

                                        <h3 class="title">Datos Personales</h3>

                                        <div class="inputText">
                                            <span>Nombre Completo :</span>
                                            <input type="text" placeholder="Lucas Aguirre" id="NombreCompleto" name="NombreCompleto">
                                        </div>

                                        <div class="inputBox">
                                            <span>Email :</span>
                                            <input type="email" placeholder="Ejemplo@gmail.com" id="Email" name="Email">
                                        </div>

                                        

                                    </div>

                                    <div class="col">

                                        <h3 class="title">Pago</h3>

                                        <div class="inputIMG">
                                            <span>Tarjetas aceptadas :</span>
                                            <img src="img/pagos.png" alt="">
                                        </div>

                                        <div class="inputText">
                                            <span>Nombre Titular Tarjeta :</span>
                                            <input type="text" placeholder="Sergio Aguilera" id="TitularTarjeta" name="TitularTarjeta">
                                        </div>

                                        <div class="inputBox">
                                            <span>Número de Tarjeta  :</span>
                                            <input type="text" placeholder="1111-2222-3333-4444" id="Nrotarjeta" name="Nrotarjeta" pattern="[0-9]+">
                                        </div>

                                        <div class="inputText">
                                            <span>Mes de caducidad :</span>
                                            <input type="text" placeholder="05" id="Mesdecaducidad" name="Mesdecaducidad" pattern="[0-9]+">
                                        </div>

                                        <div class="flex">
                                            <div class="InputBox">
                                                <span>Año de caducidad :</span>
                                                <input type="text" placeholder="2028" id="Añodecaducidad" name="Añodecaducidad" pattern="[0-9]+">
                                            </div>
                                            <div class="InputBox">
                                                <span>CVV :</span>
                                                <input type="text" placeholder="345" id="CVV" name="CVV" pattern="[0-9]+">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <input type="hidden" name="usuario" value = "<?php echo($usuario); ?>" id ="usuario">
                                <input type="hidden" name="idReserva" value = "<?php echo($reserva); ?>" id ="idReserva">
                                <input type="submit" value="<?php echo("Pagar: $" . $total) ?>" class="submit-btn">
                            </form>
                        <?php
                    }
                ?>

                

            </div>
        </div>
    </div>



</body>

</html>