/*DESARROLLADO POR MICHAEL NAVARRETE */
/*SCRIPTS PORTAL PROVEEDORES*/

function verificarRut(){
    var text = document.getElementById('rutBlock').value;
    console.log(text);
    if (text != "") {
        document.getElementById('pedidos').innerHTML = ("Pedidos asociados al rut: " + text);
        mostrarTabla();
    } else {
        alert("Por favor digite su rut.")
    }
}

function mostrarTabla(){
    document.getElementById('showTable').style.display = 'block';
}

/*SCRIPTS PORTAL CHECK*/

function checkReserva(){
    var text = document.getElementById('rutBlock').value;
    console.log(text);
    if (text != "") {
        mostrarReserva();
    } else {
        alert("Por favor digite el rut del cliente.")
    }
}

function mostrarReserva(){
    document.getElementById('showReserva').style.display = 'block';
}

function checkIn(){
    document.getElementById('succesCheck').style.display = 'block';
    document.getElementById('check').innerHTML = "Se ha aplicado el Check In con éxito a la reserva";
}

function checkOut(){
    document.getElementById('succesCheck').style.display = 'block';
    document.getElementById('check').innerHTML = "Se ha aplicado el Check Out con éxito a la reserva";
}

/*SCRIPTS PORTAL OPERADOR/PROVEEDORES*/

function generarOrden(){
    document.getElementById('ordenCompra').style.display = 'block';
}

function recepcionarOrden(){
    console.log('Probando Conexiones');
    window.location.href='recepcion.html';
}


/*SCRIPTS PORTAL INFORMES*/

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
