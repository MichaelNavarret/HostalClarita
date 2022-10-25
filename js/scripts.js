/*DESARROLLADO POR MICHAEL NAVARRETE */
/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL PROVEEDORES*/

function verificarRut(){
    var text = document.getElementById('rutBlock').value;
    var largo = text.length;
    var filtro = ' -.abcdefghijlmnopqrstuvwxyz!"#$%&/()=?¡¿°|,;.:-_{[}]<>+' + "'";
    var test = 0;

    for (var i = 0; i < largo; i++){ //Ciclo que recorre el rut.
        for (var j = 0; j < filtro.length; j++){ //Ciclo que recorre el filtro.
            if (text.charAt(i) == filtro.charAt(j)){ //Compara cada caracter del rut para analizar que no se encuentren signos especiales mostrados en el filtro.
                test = 1;
            }
        }
    }

    if (text == ""){ //Revisa que el rut no sea ingresado vacio.
        alert("Por favor digite su rut.")
        document.getElementById('rutBlock').value = 0;
    } else if (largo < 9){ //Revisa que el rut cumpla con el minimo de caracteres.
        alert("Por favor ingrese un rut válido.") 
        document.getElementById('rutBlock').value = 0;
    } else if (test != 0){ //Revisa que no se hayan introducido caracters especiales. Si se introducen, test = 1, por lo que si se mantiene en 0, significa que esta todo OK.
        alert("Por favor ingrese el rut en el formato solicitado");
        document.getElementById('rutBlock').value = 0;
    }
}

/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL CHECK*/


/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL OPERADOR/PROVEEDORES*/

function generarOrden(){
    document.getElementById('ordenCompra').style.display = 'block';
}

function recepcionarOrden(){
    console.log('Probando Conexiones');
    window.location.href='recepcion.html';
}


/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL INFORMES*/

function download(){
    document.getElementById('alerta').style.display = 'block';
    var informe = document.getElementById('informe-name').value;
    if (informe == "01") {
        document.getElementById('infoDown').innerHTML = 'El informe de Registro de ventas será descargado a la brevedad.';
    } else if (informe == "02") {
        console.log("Entrando02");
        document.getElementById('infoDown').innerHTML = 'El informe de Registro de sesion será descargado a la brevedad.';
    }else if (informe == "03"){
        document.getElementById('infoDown').innerHTML = 'El informe de Registro de pedidos será descargado a la brevedad.';
    }else{
        document.getElementById('infoDown').innerHTML = 'El informe de Registro de visitas web será descargado a la brevedad.';
    }
}
