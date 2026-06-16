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

function showUser(str) { //busca dinamicamente con AJAX
    if (str ==""){ //si el carrito esta vacio no busca nada
        document.getElementById("txtHint")
        return;
    }
    else{
        var xmlhttp = new XMLHttpRequest(); //crea el objeto que hace la peticion
        xmlhttp.onreadystatechange = function() { //espera respuesta
        if (this.readyState==4 && this.status ==200) {
            document.getElementById("txtHint").innerHTML = this.responseText; //muestra los datos obtenidps
        } 
    }
    xmlhttp.open("GET", "family.php?q=" +str, true); //envia el texto al archivo family.php
    xmlhttp.send(); //ejecuta la accion
    }
}
function eliminarCarrito(idCarrito){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState==4 && this.status ==200) {
            location.reload(); //recarga 
        }
    }
    xmlhttp.open("POST", "borrar.php", true); //envia a borrar.php
    xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
    );
    xmlhttp.send("idCarrito=" + idCarrito);
}