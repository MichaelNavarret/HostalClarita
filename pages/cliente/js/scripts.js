function cancelarReserva(){
    return confirm("¿Está seguro que desea cancelar su reserva? Tenga en cuenta que una vez hecho, no se habrá vuelta atrás.");
}

/*----------------------------------------------------------------------------------------------------------------------------SCRIPTS COMEDOR*/
const btnAbrirModal = document.querySelector("#verHorario");
const btncerrarModal = document.querySelector("#cerrar");
const modal = document.querySelector("#consultarComedor");
console.log(btnAbrirModal);
console.log(btncerrarModal);
console.log(modal);
btnAbrirModal.addEventListener("click", ()=>{
    modal.showModal();
});

btncerrarModal.addEventListener("click", ()=>{
    modal.close();
});
