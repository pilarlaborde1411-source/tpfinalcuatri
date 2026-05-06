let contador = 0;

const contadorHTML = document.getElementById("contador");
const btnReiniciar = document.getElementById("btnReiniciar");

// Selecciona TODOS los botones con class="btnSumar"
const botonesSumar = document.querySelectorAll(".btnSumar");

botonesSumar.forEach(boton => {
  boton.addEventListener("click", function () {
    contador++;
    contadorHTML.innerText = `Contador: ${contador}`;
    
  });
});

btnReiniciar.addEventListener("click", function () {
  contador = 0;
  contadorHTML.innerText = `Contador: ${contador}`;
});
function comprar() {alert("¡se agregó al carrito!")}