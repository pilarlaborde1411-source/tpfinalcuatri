function mostrar(id){
    document.querySelectorAll('.formulario')
        .forEach(formulario => {
            formulario.classList.remove('activo');
        });
    document.getElementById(id).classList.add('activo');
}