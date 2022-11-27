<?php
    include ("connection.php");
    $user = $_POST["uname"];
    $clave = $_POST["psw"];
    $consulta = "   SELECT  rutEmpresa RUT,
                            correo EMAIL,
                            clave PASS,
                            nombre NOMBRE,
                            direccion DIRECCION
                    FROM EMPRESA 
                    WHERE correo = '$user';";
    $ejec = sqlsrv_query($conn, $consulta);  
    $i=0;
    while($fila = sqlsrv_fetch_array($ejec)){
        $rut = $fila["RUT"];
        $email = $fila["EMAIL"];
        $pass = $fila["PASS"];
        $name = $fila["NOMBRE"];
        $dir = $fila["DIRECCION"];
        $i++;
    }
    if($i != 0){
        if($pass == $clave){
            header("Location: ../pages/cliente/inicioCliente.php?usuario=$user");
        }else{
            $mensaje="La contraseña ingresada no coincide con el usuario ingresado.";
            header("Location: ../login.php?mensaje=$mensaje");
        }
    }else{
        $mensaje="El usuario ingresado no existe en nuestros registros.";
        header("Location: ../login.php?mensaje=$mensaje");
    }
?>