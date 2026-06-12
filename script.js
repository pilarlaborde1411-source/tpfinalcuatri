function mostrar(id){ //Define función
    const formulario = document.getElementById(id); //Obtiene el elemento guardado en la variable.
    if(formulario.classList.contains('activo')){ //Pregunta si el formulario tiene clase activo.
        formulario.classList.remove('activo'); //Si tiene la clase activo, se la remueve.
        return;
    }
    document.querySelectorAll('.formulario') //Busca los elementos que tengan clase formulario.
        .forEach(f => f.classList.remove('activo')); //Recorre todos los formularios encontrados y les remueve la clase activo.
    formulario.classList.add('activo'); //Agrega la clase activo al formulario seleccionado.
}