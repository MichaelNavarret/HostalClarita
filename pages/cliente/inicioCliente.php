<?php
    include("../../php/connection.php");
    $user = $_GET["usuario"];
    $obtenerDatos = "   SELECT	rutEMpresa RUT,
                            nombre NOMBRE,
                            direccion DIRECCION,
                            numero TELEFONO
                        FROM empresa
                        WHERE correo = '$user';";
    $ejecutar = sqlsrv_query($conn, $obtenerDatos);
    $i=0;
    while($fila = sqlsrv_fetch_array($ejecutar)){
        $rut= $fila["RUT"];
        $name= $fila["NOMBRE"];
        $dir= $fila["DIRECCION"];
        $tel= $fila["TELEFONO"];
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
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/formulario.js"></script>
    <link type="text/css" rel="stylesheet" href="CSS/inicio.css">
    <link rel="icon" href="img/dona.ico">
    <link rel="stylesheet" href="icon.css">


</head>

<body onload="slider()">

    <section>

        <ul class="menu">
            <li><img class="imgwe" src="img/dona.png"></li>
            <li><a href="servicios.php?usuario=<?php echo($user); ?>">SERVICIOS</a></li>
            <li><a href="consultarReserva.php?usuario=<?php echo($user); ?>">CONSULTAR RESERVA</a></li>
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

            <div class="banner-bottom">
                <div class="container">
                    <div class="agileits_banner_bottom">
                        <h3><span>Bienvenid@ <?php echo(utf8_encode($name)); ?></span> Encuentra nuestra acogedora bienvenida
                        </h3>
                    </div>
                    <div class="w3ls_banner_bottom_grids">
                        <ul class="cbp-ig-grid">
                            <li>
                                <div class="w3_grid_effect">
                                    <span class="cbp-ig-icon w3_road"></span>
                                    <h4 class="cbp-ig-title">DORMITORIOS PRINCIPALES
                                    </h4>
                                    <span class="cbp-ig-category"></span>
                                </div>
                            </li>
                            <li>
                                <div class="w3_grid_effect">
                                    <span class="cbp-ig-icon w3_cube"></span>
                                    <h4 class="cbp-ig-title">BALCON CON HERMOSA VISTA</h4>
                                    <span class="cbp-ig-category"></span>
                                </div>
                            </li>
                            <li>
                                <div class="w3_grid_effect">
                                    <span class="cbp-ig-icon w3_users"></span>
                                    <h4 class="cbp-ig-title">GRAN SALON DE COMIDA
                                    </h4>
                                    <span class="cbp-ig-category"></span>
                                </div>
                            </li>
                            <li>
                                <div class="w3_grid_effect">
                                    <span class="cbp-ig-icon w3_ticket"></span>
                                    <h4 class="cbp-ig-title">AMPLIA COBERTURA WIFI</h4>
                                    <span class="cbp-ig-category">
                                </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //banner-bottom -->
            <!-- /about -->
            <div class="about-wthree" id="about">
                <div class="container">
                    <div class="ab-w3l-spa">
                        <h3 class="title-w3-agileits title-black-wthree">Acerca de Nuestro Hostal Doña Clarita
                        </h3>
                        <p class="about-para-w3ls"> Disfruta de tus vaciones en nuestros habitaciones lujosas y disfruta de un ambiente agradable.
                        </p>
                        <img src="img/about.jpg" class="img-responsive" alt="Hair Salon">
                        <div class="w3l-slider-img">
                            <img src="img/a1.jpg" class="img-responsive" alt="Hair Salon">
                        </div>
                        <div class="w3ls-info-about">
                            <h4>Te encantarán todas las comodidades que ofrecemos!</h4>
                            <p>Esperamos que disfrutes. </p>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!-- //about -->
            <!--sevices-->
            <div class="advantages">
                <div class="container">
                    <div class="advantages-main">
                        <h3 class="title-w3-agileits">Nuestros Servicios
                        </h3>
                        <div class="advantage-bottom">
                            <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
                                <div class="advantage-block ">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                    <h4>Puedes pagar con tarjeta </h4>
                                    <p>Podras pagar con tarjeta de débito o crédito. </p>
                                    <p>Aceptamos boleta o factura para todo tipo de empresa que lo desee. </p>
                                    <p><i class="fa fa-check" aria-hidden="true"></i>Habitación decorada, con aire acondicionado
                                    </p>
                                    <p><i class="fa fa-check" aria-hidden="true"></i>Balcón privado
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
                                <div class="advantage-block">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <h4>Restaurante las 24 Horas</h4>
                                    <p>Contamos con un gran salon para que estes comodo en los momentos que necesites.</p>
                                    <p>Contamos con una gran variedad de comidas.</p>
                                    <p><i class="fa fa-check" aria-hidden="true"></i>24 horas de servicio a la habitación
                                    </p>
                                    <p><i class="fa fa-check" aria-hidden="true"></i>Servicio de conserjería las 24 horas
                                    </p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//sevices-->
            <!-- team -->

            <!-- //gallery -->
            <!-- rooms & rates -->
            <div class="plans-section" id="rooms">
                <div class="container">
                    <h3 class="title-w3-agileits title-black-wthree">Habitaciones y Tarifas
                    </h3>
                    <div class="priceing-table-main">
                        <div class="col-md-3 price-grid">
                            <div class="price-block agile">
                                <div class="price-gd-top">
                                    <img src="img/r1.jpg" alt=" " class="img-responsive" />
                                    <h4>Habitación Simple</h4>
                                </div>
                                <div class="price-gd-bottom">
                                    <div class="price-list">
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>

                                        </ul>
                                    </div>
                                    <div class="price-selet">
                                        <h3><span>$</span>64.990</h3>
                                        <a href="servicios.php?usuario=<?php echo($user); ?>"> Reservar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 price-grid ">
                            <div class="price-block agile">
                                <div class="price-gd-top">
                                    <img src="img/r2.jpg" alt=" " class="img-responsive" />
                                    <h4>Habitación Doble</h4>
                                </div>
                                <div class="price-gd-bottom">
                                    <div class="price-list">
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-selet">
                                        <h3><span>$</span>110.000</h3>
                                        <a href="servicios.php?usuario=<?php echo($user); ?>">Reservar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 price-grid lost">
                            <div class="price-block agile">
                                <div class="price-gd-top">
                                    <img src="img/r3.jpg" alt=" " class="img-responsive" />
                                    <h4>Habitación Simple</h4>
                                </div>
                                <div class="price-gd-bottom">
                                    <div class="price-list">
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-selet">
                                        <h3><span>$</span>64.990</h3>
                                        <a href="servicios.php?usuario=<?php echo($user); ?>">Reservar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 price-grid wthree lost">
                            <div class="price-block agile">
                                <div class="price-gd-top ">
                                    <img src="img/r4.jpg" alt=" " class="img-responsive" />
                                    <h4>Habitación Doble</h4>
                                </div>
                                <div class="price-gd-bottom">
                                    <div class="price-list">
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-selet">
                                        <h3><span>$</span> 110.000</h3>
                                        <a href="servicios.php?usuario=<?php echo($user); ?>">Reservar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>