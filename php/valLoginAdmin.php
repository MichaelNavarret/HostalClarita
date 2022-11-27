<?php
    include ("connection.php");
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];
    echo("usuario: " . $uname . "pass: " . $psw);
    $consulta ="SELECT	rutUsuario RUT,
                        clave CLAVE,
                        tipoUsuario TIPO
                FROM USUARIO
                WHERE rutUsuario = '$uname';";
    $ejecutar = sqlsrv_query($conn, $consulta);
    $i=0;
    while($fila = sqlsrv_fetch_array($ejecutar)){
        $rut = $fila["RUT"];
        $clave = $fila["CLAVE"];
        $tipo = $fila["TIPO"];
        $i++;
    }
    
    if($i != 0){ //Valida que el usuario exista
        if($clave == $psw){ //Valida que coincida con su contraseña.
            if($tipo == 'PRO'){ //Valida si es Proveedor u Operador.
                $mensaje="Este no es el portal por donde se debe acceder con este tipo de cuenta. Dirigase a <a href='login_Empresa.php'> aquí </a>";
                header("Location: ../loginAdministrador.php?mensaje=$mensaje");
            }else if ($tipo == 'ADM'){
                header("Location: ../pages/administrador/portalAdministrador.php?rutAdministrador=$rut");
            }else{
                $mensaje="Este no es el portal por donde se debe acceder con este tipo de cuenta. Dirigase a <a href='login_Empresa.php'> aquí </a>";
                header("Location: ../loginAdministrador.php?mensaje=$mensaje");
            }
        }else{
            $mensaje="La contraseña ingresada no coincide con el usuario ingresado.";
            header("Location: ../login_Empresa.php?mensaje=$mensaje");
        }
    }else{
        $mensaje="El usuario ingresado no existe en nuestros registros.";
        header("Location: ../login_Empresa.php?mensaje=$mensaje");
    }
?>