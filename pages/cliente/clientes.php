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
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">



    <link type="text/css" rel="stylesheet" href="CSS/clientes.css">
    <link rel="icon" href="img/dona.ico">
    <link rel="stylesheet" href="icon.css">


</head>

<body onload="slider()">

    <section>

        <ul class="menu">
            <li><img class="imgwe" src="img/dona.png"></li>
            <li><a href="../../login.php">INGRESAR</a></li>
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



            <!--NOSOTROS-->
            <br>
            <br>
            <section id="gtco-welcome" class="section">
                <div class="container">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-sm-5 img-bg d-flex shadow align-items-center justify-content-center justify-content-md-end img-2" style="background-image: url(img/hotel.jpg);">

                            </div>
                            <div class="col-sm-7 py-5 pl-md-0 pl-4">
                                <div class="heading-section pl-lg-5 ml-md-5">
                                    <span class="subheading">
                                        Nosotros
                                    </span>
                                    <h2>
                                        Hostal Doña Clarita
                                    </h2>
                                </div>
                                <div class="pl-lg-5 ml-md-5">
                                    <p>Somos una Hostal que nace con la idea de ofrecer a sus clientes que viajan por placer o negocios, un ambiente cómodo y acogedor que hará su estancia agradable y de confort con atención personalizada. </p>
                                    <p>MISIÓN </p>
                                    <p>Proveer un servicio integral en hotelería, implementando normas de calidad, siendo nuestra prioridad la satisfacción de servicio personalizado a nuestros clientes, en un ambiente familiar, cómodo tranquilo y seguro.
                                    </p>
                                    <p>VISIÓN </p>
                                    <p>Ser una empresa hotelera reconocida a nivel internacional, llenando las expectativas de clientes que busquen descanso placentero al finalizar sus jornadas laborales o diversión.</p>
                                    <p>VALORES</p>
                                    <p>Confianza, Servicio, Seguridad, Honradez. </p>
                                    <p>Nos preocupamos por su bienestar cuidando siempre el medio ambiente</p>
                                    <h3 class="mt-5">Áreas</h3>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#" class="thumb-menu">
                                                <img class="img-fluid img-cover" src="img/hostal2.jpg" />

                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#" class="thumb-menu">
                                                <img class="img-fluid img-cover" src="img/habitacion.jpg" />

                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#" class="thumb-menu">
                                                <img class="img-fluid img-cover" src="img/hostal3.jpg" />

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
    </div>
    </div>
    </div>
    </div>



</body>

</html>