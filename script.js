function mostrar(id){ //Define función
    const formulario = document.getElementById(id); //Obtiene el elemento guardado en la variable.
    const inicio = document.getElementById('tablaInicio');

    if(id === 'tablaInicio'){
        document.querySelectorAll('.formulario') //Busca los elementos que tengan clase formulario.
            .forEach(f => f.classList.remove('activo')); //Recorre todos los formularios encontrados y les remueve la clase activo.

        inicio.classList.add('activo'); //Agrega la clase activo al formulario seleccionado.
        return;
    }

    if(formulario.classList.contains('activo')){
        formulario.classList.remove('activo');
        inicio.classList.add('activo');
        return;
    }

    document.querySelectorAll('.formulario')
        .forEach(f => f.classList.remove('activo'));

    formulario.classList.add('activo');
}

function eliminarCarrito(idCarrito){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState==4 && this.status ==200) {
        location.reload(); //recarga la pag para actualizar el carrito
        }
    }
    xmlhttp.open("GET", "borrar.php?idCarrito="+idCarrito, true); 
    xmlhttp.send();
}