<?php
    include("../../php/connection.php");
    $idReserva = $_GET["idReserva"];
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
    <script src="js/scripts.js"></script>


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
                        <h3 class="panel-title"><b>Detalle reserva </b> </h3>
                    </div>
                    <div class="panel-body">
                        <div class ="panelInfo" id="empresa">
                            <h3>Información Cliente</h3>
                            <?php
                                $consultaDatos = "  SELECT  nombre NOMBRE,
                                                            rutEmpresa RUT,
                                                            correo EMAIL,
                                                            FORMAT(numero, '+569 #########') TELEFONO
                                                    FROM EMPRESA
                                                    WHERE correo = '$user';
                                                    ";
                                $ejectuar = sqlsrv_query($conn, $consultaDatos);
                                $i=0;
                                while($fila=sqlsrv_fetch_array($ejectuar)){
                                    $name = $fila["NOMBRE"];
                                    $rut = $fila["RUT"];
                                    $correo = $fila["EMAIL"];
                                    $numero = $fila["TELEFONO"];
                                    $i++;
                                    ?>
                                    <div class="campos">
                                        <p class ="nombreCampo" >Nombre Cliente</p>
                                        <p><?php echo($name); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo">Rut </p>
                                        <p><?php echo($rut); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo">Correo </p>
                                        <p><?php echo($correo); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo">Teléfono</p>
                                        <p><?php echo($numero); ?></p>
                                    </div>
                                    <?php
                                }
                            ?>
                            <h3>Información Huespedes</h3>
                            <?php
                                $consultaHuesped = "SELECT	H.nombre HUESPED,
                                                            R.ninos NINOS
                                                    FROM HUESPED AS H
                                                    JOIN Reserva AS R ON H.idReserva = R.idReserva
                                                    WHERE H.idReserva = $idReserva;";
                                $ejec2 = sqlsrv_query($conn, $consultaHuesped);
                                $h=0;
                                while($fila = sqlsrv_fetch_array($ejec2)){
                                    $huesped = $fila["HUESPED"];
                                    $ninos = $fila["NINOS"];
                                    ?>
                                    <div class="campos">
                                        <p class ="nombreCampo">Nombre Huesped <?php echo($h+1) ?></p>
                                        <p><?php echo($huesped); ?></p>
                                    </div>
                                    <?php
                                    $h++;
                                }
                            ?>
                            <div class="campos">
                                <p class ="nombreCampo">Cantidad Niños</p>
                                <p><?php echo($ninos); ?></p>
                            </div>
                        </div>
                        <div class ="panelInfo">
                            <h3>Información Reserva</h3>
                            <?php
                                $consulta = "SELECT	CONVERT(VARCHAR,fechaReserva,111) FRESERVA,
                                                    CONVERT(VARCHAR,fechaInicio,111) FINICIO,
                                                    CONVERT(VARCHAR,fechaTermino,111) FTERMINO,
                                                    ES.idEstado IDESTADO,
                                                    ES.nombre ESTADO,
                                                    FORMAT(R.costoTotal,'$ ### ###') COSTO,
                                                    R.ninos NINOS
                                            FROM RESERVA AS R
                                            JOIN EstadoReserva AS ER ON R.idReserva = ER.idReserva
                                            JOIN Estado ES ON ER.idEstado = ES.idEstado
                                            WHERE R.idReserva = $idReserva;";
                                $ejec = sqlsrv_query($conn, $consulta);
                                $i=0;
                                while($fila = sqlsrv_fetch_array($ejec)){
                                    $fReserva = $fila["FRESERVA"];
                                    $fInicio = $fila["FINICIO"];
                                    $fTermino = $fila["FTERMINO"];
                                    $idEstado = $fila["IDESTADO"];
                                    $estado = $fila["ESTADO"];
                                    $costo = $fila["COSTO"];
                                    $ninos = $fila["NINOS"];
                                    if($h==1){
                                        $tipo="Individual";
                                        $idTipo=1;
                                    }else{
                                        $tipo="Grupal";
                                        $idTipo=2;
                                    }
                                    $i++;
                                    ?>
                                    <div class="campos">
                                        <p class ="nombreCampo">Fecha Reserva</p>
                                        <p><?php echo($fReserva); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo">Fecha Inicio</p>
                                        <p ><?php echo($fInicio); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo">Fecha Termino</p>
                                        <p><?php echo($fTermino); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo">Tipo Habitacion</p>
                                        <p><?php echo($tipo); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo"> Estado</p>
                                        <p><?php echo($estado); ?></p>
                                    </div>
                                    <div class="campos">
                                        <p class ="nombreCampo"> Costo Total</p>
                                        <p><?php echo($costo); ?></p>
                                    </div>
                                    <?php
                                        if($idEstado == 1 || $idEstado == 5){
                                            if($idEstado == 5){
                                                ?>
                                                <div  id="btnPagar">
                                                    <a href="pagos.php?reserva=<?php echo($idReserva); ?>&usuario=<?php echo($user); ?>&tipo=<?php echo($idTipo); ?>&recibo=BOLETA" >Pagar Reserva</a>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div  id="btnCancelar">
                                                <a href="cancelarReserva.php?idReserva=<?php echo($idReserva); ?>&usuario=<?php echo($user); ?>" onclick="return cancelarReserva()">Cancelar Reserva</a>
                                            </div>

                                            <?php
                                        }
                                    ?>

                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>