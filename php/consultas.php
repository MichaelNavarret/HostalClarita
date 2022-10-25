<link rel="stylesheet" href="/../css/bootstrap.min.css">
<style>
    #titulo{
        text-align: center;
    }
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
            consulta_Orden($rut);
        }
        

    }


    function consulta_Orden($rut){
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
                        <td>$id</td>
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

    function detalle_Orden($id){
        global $conn;
        $consulta0 = "  SELECT OPH.nombre + ' ' + OPH.apellidoPat + ' ' + OPH.apellidoMat Operador,
                        CONVERT(VARCHAR,OP.fechaGenOrden,111) Fecha
                    
                        FROM OrdenPedido AS OP
                        JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                        JOIN Producto AS P ON OPP.idProducto = P.idProducto
                        JOIN OperadorHostal AS OPH ON OP.rutOperador = OPH.rutOperador
                        WHERE OP.idOrdenPedido = $id
                        GROUP BY OP.idOrdenPedido,
                                OPH.nombre + ' ' + OPH.apellidoPat + ' ' + OPH.apellidoMat,
                                CONVERT(VARCHAR,OP.fechaGenOrden,111);";
        $ejecutar0 = sqlsrv_query($conn, $consulta0);
        $j = 0;
        while($fila0 = sqlsrv_fetch_array($ejecutar0) ){
            $operador = $fila0['Operador'];
            $fecha = $fila0['Fecha'];
            $j++;
        }

        echo("
            <div class = 'contenedor'>
                <h1 id ='titulo'> Operador: $operador </h1>
                <h2> Fecha: $fecha </h2>");

        echo("
        <div class ='contenedor'>
            <table>
                <tr class = 'cabecera'>
                    <td><strong> Producto </strong></td>
                    <td><strong> Valor </strong></td>
                    <td><strong> Cantidad </strong></td>
                    <td><strong> Sub Total </strong></td>
                </tr>");
        $consulta = "   SELECT  P.nombre Producto,
                                FORMAT( P.valor,'$ ### ### ###') Valor,
                                OPP.cantidad Cantidad,
                                FORMAT((p.valor*cantidad),'$ ### ### ###') SubTotal
                        from OrdenPedido AS OP
                        JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                        JOIN Producto AS P ON OPP.idProducto = P.idProducto
                        JOIN OperadorHostal AS OPH ON OP.rutOperador = OPH.rutOperador
                        WHERE OP.idOrdenPedido = $id;";
        $ejecutar = sqlsrv_query($conn, $consulta);
        $j = 0;
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $producto = $fila['Producto'];
            $valor = $fila['Valor'];
            $cantidad = $fila['Cantidad'];
            $subtotal = $fila['SubTotal'];
            $j++;

            echo ("<tr>
                        <td> $producto </td>
                        <td> $valor </td>
                        <td> $cantidad </td>
                        <td> $subtotal </td>
                 </tr> ");
        }

        $select = " SELECT FORMAT(SUM(p.valor*cantidad), '$ ### ### ###') Total
                    from OrdenPedido AS OP
                    JOIN OrdenPedido_Producto AS OPP ON OP.idOrdenPedido = OPP.idOrdenPedido
                    JOIN Producto AS P ON OPP.idProducto = P.idProducto
                    JOIN OperadorHostal AS OPH ON OP.rutOperador = OPH.rutOperador
                    WHERE OP.idOrdenPedido = $id;";

        $ejecutar = sqlsrv_query($conn, $select);
        $j = 0;
        $total = 0;
        while($fila = sqlsrv_fetch_array($ejecutar)){
            $total = $fila['Total'];
            $j++;
        }
        echo ("
            </table>
        </div>
        <h2> Total a pagar: $total </h2>
        ");    
        
        echo ("</div>");
    }


    // Portal Operador

    function mostrarHabitaciones(){
        global $conn;
        echo("
        <div class ='contenedor'>
            <table>
                <tr class = 'cabecera'>
                    <td><strong> ID Habitacion </strong></td>
                    <td><strong> Tipo </strong></td>
                    <td><strong> Detalle </strong></td>
                    <td><strong> Estado </strong></td>
                    <td><strong> Valor </strong></td>
                </tr>");
        $consulta = "SELECT	H.idHabitacion ID,
                            TP.nombre Tipo,
                            H.detalle Detalle,
                            ES.nombre Estado,
                            FORMAT(TP.valor,'$ ### ### ###') Valor
                    FROM Habitacion AS H
                    JOIN EstadoHabitacion AS ES ON H.idEstadoHabitacion = ES.idEstadoHabitacion
                    JOIN TipoHabitacion AS TP ON H.idTipoHabitacion = TP.idTipoHabitacion;";
        $ejecutar = sqlsrv_query($conn, $consulta);
        $i = 0;
        while($file = sqlsrv_fetch_array($ejecutar)){
            $id = $file['ID'];
            $tipe = $file['Tipo'];
            $detail = $file['Detalle'];
            $state = $file['Estado'];
            $price = $file['Valor'];
            $i++;

            echo ("<tr>
                        <td> $id </td>
                        <td> $tipe </td>
                        <td> $detail </td>
                        <td> $state </td>
                        <td> $price </td>
                 </tr> ");
        }
    
        echo ("
            </table>
            </div>");
    
    }
?>