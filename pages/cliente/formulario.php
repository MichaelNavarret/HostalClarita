<?php
    $user = $_GET["usuario"];
    $tipo = $_GET["tipo"];
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
    <!--<script src="js/formulario.js"></script>-->
    <link type="text/css" rel="stylesheet" href="CSS/formulario.css">
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
            <br>
            <br>
            <br>
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Reserva Habitacion   <?php
                                                                            if($tipo == 1){
                                                                                echo("Individual");
                                                                            }else{
                                                                                echo("Grupal");
                                                                            }
                                                                        ?>
                                                                        </b> </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="signupForm" method="post" action="php/reserva.php">

                            <!-- NO ES NECESARIO, YA QUE AL HACER LOGIN, SE CUENTA CON ESTOS DATOS.
                            <div class="form-group">
                                <label for="fullname" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Ingresa tu nombre completo" id="fullname" name="fullname" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="alejandro@gmail.com" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Teléfono / Móvil" id="number" name="number" class="form-control">
                                </div>
                            </div>
                            -->
                            <?php 
                                if($tipo == 1){
                                    ?>
                                    
                                    <div class="form-group">
                                        <label for="number" class="col-sm-2 control-label">Nombre Huesped</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="nombreHuesped" placeholder="Número de adultos" name="nombreHuesped" class="form-control" required>
                                        </div>
                                    </div>

                                    <?php
                                }else{
                                    $i = 0;
                                    while ($i != 3){
                                    ?>
                                    
                                    <div class="form-group">
                                        <label for="number" class="col-sm-2 control-label">Huesped <?php echo($i+1) ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="nombreHuesped" placeholder="Número de adultos" name="nombreHuesped<?php echo($i+1) ?>" class="form-control">
                                        </div>
                                    </div>

                                    <?php
                                        $i++;
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="number" class="col-sm-2 control-label">Número de niños</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" max="6" id="children" placeholder="Máximo de niño permitidos 2 por huesped" name="children" class="form-control">
                                        </div>
                                        </div>
                                    <?php
                                }
                            ?>

                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">Fecha de registro</label>
                                <div class="col-sm-10">
                                    <input type="date" min="2022-10-25" id="checkin" name="checkin" class="gui-input" placeholder="mm/dd/yyyy" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">Fecha de salida</label>
                                <div class="col-sm-10">
                                    <input type="date" min="2022-10-25" id="checkout" name="checkout" class="gui-input" placeholder="mm/dd/yyyy" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="raddiobutton">
                                        <label> <input type="checkbox" id="agree" name="agree" value="agree">Términos y condiciones.</label>
                                    </div>
                                    <em id="agree-error" class="help-block"></em>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="radio" id="factura" name="recibo" value="FACTURA">
                                    <label for="html">Factura</label><br>
                                    <input type="radio" id="boleta" name="recibo" value="BOLETA">
                                    <label for="css">Boleta</label><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="hidden" name="user" value="<?php echo($user); ?>">
                                    <input type="hidden" name="tipo" value="<?php echo($tipo); ?>">
                                    <input type="submit" class="btn btn-primary" value="Enviar" />
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>