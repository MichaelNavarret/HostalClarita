
/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS PORTAL SCRIPTS LISTAR PROVEEDORES*/
function eliminarProveedor(){
    return confirm("¿Está seguro que desea eliminar al Proveedor? Una vez aceptado, no se podrán regresar los cambios.");
}
function editarProveedor(){
    return confirm("¿Está seguro que desea editar al Proveedor? Una vez aceptado, no se podrán regresar los cambios.");
}

const btnAbrirAgregar = document.querySelector("#btnAgregar");
const btnCerrarAgregar = document.querySelector("#cerrar");
const modal2 = document.querySelector("#popUpAgregar");
console.log(btnAbrirAgregar);


btnAbrirAgregar.addEventListener("click", ()=>{
    modal2.showModal();
});

btnCerrarAgregar.addEventListener("click", ()=>{
    modal2.close();
});
