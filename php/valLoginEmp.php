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
                header("Location: ../pages/administrador/portalAdministrador.php?rutAdministrador=$rut");
            }else{
                header("Location: ../pages/operadorHostal/portalOperador.php?rutOperador=$rut");
            }
        }else{
            header("Location: ../login_Empresa.php");
        }
    }else{
        header("Location: ../login_Empresa.php");
    }
?>