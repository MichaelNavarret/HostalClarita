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
    <!--<script src="js/contacto.js"></script>-->
    <link type="text/css" rel="stylesheet" href="CSS/contacto.css">
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
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Contáctanos</b> </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="signupForm" method="post">

                            <div class="form-group">
                                <label for="fullname" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Ingresa tu nombre" id="fullname" name="fullname" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Ingresa tu correo electrónico" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Ej: 955555555" id="number" name="number" class="form-control">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="comments" class="col-sm-2 control-label">Comentarios</label>
                                <div class="col-sm-10">
                                    <textarea name="comments" placeholder="Ingresa un comentario de al menos 50 caracteres" id="comments" cols="40" rows="5" class="form-control"></textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary" value="Enviar" id="enviar" name="enviar"/>
                                </div>
                            </div>
                            <?php
                                include("../../php/connection.php");
                                
                                if(isset($_POST['enviar'])){
                                    
                                    $nombre=$_POST["fullname"];
                                    $email = $_POST["email"];
                                    $telefono = $_POST["number"];
                                    $mensaje = $_POST["comments"];
                                    $consulta=" INSERT INTO MENSAJE (nombreRemitente, emailRemitente, numeroRemitente, mensaje) 
                                                VALUES ('$nombre', '$email', '$telefono', '$mensaje');";
                                    sqlsrv_query($conn, $consulta);
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>