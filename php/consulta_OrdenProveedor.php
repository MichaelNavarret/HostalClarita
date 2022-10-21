<link rel="stylesheet" href="/../css/bootstrap.min.css">
<style>
    .alerta{
        width: 60%;
        text-align: center;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 30px;
        background-color: #F58C7A;
        color:white;
        border-radius:15px
    }
    .contenedor{
        border: 1px solid black;
        width: 70%;
        text-align: center;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 30px;
    }

    .contenedor table{
        margin: auto;
    }
    .contenedor table .cabecera{
        background-color: #eee;
    
    }
    .contenedor table tr td{
        border: 1px solid black;
        text-align: center;
        padding: 10px;
    }
</style>

<?php
    $serverName = "DESKTOP-HT5FEQ3"; //serverName\instanceName
    
    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"HostalClarita");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
?>

<?php
    function revisar($rut){
        global $conn;
        $consulta = "SELECT COUNT(*) Pedidos FROM OrdenPedido where rutProveedor = $rut;"; //WHERE rutProveedor = $rut 
        $ejecutar = sqlsrv_query($conn, $consulta);
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $nro_Pedidos = $fila['Pedidos'];
        }
        if($nro_Pedidos == 0){
            echo ("<div class = 'alerta' > No existen pedidos para el rut: $rut </div>");
        }else{
            consulta($rut);
        }
        

    }


    function consulta($rut){
        global $conn;
        echo("
        <div class ='contenedor'>
            <table>
                <tr class = 'cabecera'>
                    <td><strong>Id Orden </strong></td>
                    <td><strong> Fecha </strong></td>
                    <td><strong> Detalle </strong></td>
                </tr>");
        $consulta = "SELECT idOrdenPedido, detalle, CONVERT(VARCHAR, fechaGenOrden, 111) Fecha FROM OrdenPedido WHERE rutProveedor = $rut "; //WHERE rutProveedor = $rut 
        $ejecutar = sqlsrv_query($conn, $consulta);
        $i = 0;
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $id = $fila['idOrdenPedido'];
            $detail = $fila['detalle'];
            $fecha = $fila['Fecha'];
            $i++;

            echo ("<tr>
                        <td><a href = 'infoPedido.html' > $id </a> </td>
                        <td>$fecha</td>
                        <td> $detail </td>
                 </tr> ");
        }
        echo ("
            </table>
        </div>");    
    }

    function prueba($rut){
        echo ("Su rut es $rut");
    }
?>