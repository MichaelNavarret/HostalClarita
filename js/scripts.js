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

/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS LISTAR PRODUCTOS*/
function eliminarProducto(){
    return confirm("¿Está seguro que desea eliminar el producto?");
}

function editarProducto(){
    return confirm("¿Está seguro que desea actualizar el producto?");
}


/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL OPERADOR/PROVEEDORES*/

function cerrarMensaje(){
    document.getElementById('mensaje').style.display = 'none';
}

/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL GENERAR RESERVA LOCAL*/
const btnAbrirModal = document.querySelector("#generarReserva");
const btncerrarModal = document.querySelector("#cerrar");
const modal = document.querySelector("#ingresarReserva");

btnAbrirModal.addEventListener("click", ()=>{
    modal.showModal();
});

btncerrarModal.addEventListener("click", ()=>{
    modal.close();
});
