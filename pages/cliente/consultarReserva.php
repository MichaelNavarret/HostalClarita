<?php
    include("../../php/connection.php");
    $user = $_GET["usuario"];
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
    <link type="text/css" rel="stylesheet" href="CSS/consultarReserva.css">
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
            <br>
            <br>
            <br>
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Consultar Reservas </b> </h3>
                    </div>
                    <div class="panel-body">
                        <table class ="reservas">
                            <tr class ="cabecera">
                                <td id="primero">Código Reserva</td>
                                <td>Fecha Reserva</td>
                                <td>Fecha Inicio Reserva</td>
                                <td>Fecha Termino Reserva</td>
                                <td>Estado Reserva</td>
                                <td>Costo</td>
                                <td id="final">Ver Detalles</td>
                            </tr>
                            <?php 
                                $consultaRservas = "    SELECT  R.idReserva ID,
                                                                CONVERT(VARCHAR,R.fechaReserva,111) FECHARESERVA,
                                                                CONVERT(VARCHAR,R.fechaInicio,111) FECHAINICIO,
                                                                CONVERT(VARCHAR,R.fechaTermino,111) FECHATERMINO,
                                                                FORMAT(R.costoTotal, '$ ### ###') COSTO,
                                                                ES.nombre ESTADO
                                                        FROM RESERVA AS R
                                                        JOIN EstadoReserva AS ER ON R.idReserva = ER.idReserva
                                                        JOIN Estado ES ON ER.idEstado = ES.idEstado
                                                        WHERE usuario = '$user'
                                                        ORDER BY ID DESC ;";
                                $ejec = sqlsrv_query($conn, $consultaRservas);
                                $i=0;
                                while($fila = sqlsrv_fetch_array($ejec)){
                                    $id = $fila["ID"];
                                    $fReserva= $fila["FECHARESERVA"];
                                    $fInicio= $fila["FECHAINICIO"];
                                    $fTermino= $fila["FECHATERMINO"];
                                    $costo= $fila["COSTO"];
                                    $estado = $fila["ESTADO"];
                                    $i++;
                                    ?>
                                    <tr class="contenido">
                                        <td><?php echo($id); ?></td>
                                        <td><?php echo($fReserva); ?></td>
                                        <td><?php echo($fInicio); ?></td>
                                        <td><?php echo($fTermino); ?></td>
                                        <td><?php echo($estado); ?></td>
                                        <td><?php echo($costo); ?></td>
                                        <td><a href="detalleReserva.php?idReserva=<?php echo($id) ?>&usuario=<?php echo($user) ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="green" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>