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
                header("Location: ../pages/proveedor/portalProveedores.php?rutProveedor=$rut");
            }else if ($tipo == 'ADM'){
                $mensaje="No cuenta con los permisos necesarios para acceder a esta cuenta.";
                header("Location: ../login_Empresa.php?mensaje=$mensaje");
            }else{
                header("Location: ../pages/operadorHostal/portalOperador.php?rutOperador=$rut");
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