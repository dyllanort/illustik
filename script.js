document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", ajustarVista);


const formularioLogin = document.querySelector(".formulario__login");
const formularioRegister = document.querySelector(".formulario__register");
const contenedorLoginRegister = document.querySelector(".contenedor__login-register");
const cajaTraseraLogin = document.querySelector(".caja__trasera-login");
const cajaTraseraRegister = document.querySelector(".caja__trasera-register");


function ajustarVista() {
    if (window.innerWidth > 850) {
        cajaTraseraRegister.style.display = "block";
        cajaTraseraLogin.style.display = "block";
        cajaTraseraRegister.style.opacity = "1";
    } else {
        cajaTraseraRegister.style.display = "block";
        cajaTraseraRegister.style.opacity = "1";
        cajaTraseraLogin.style.display = "none";
        formularioLogin.style.display = "block";
        contenedorLoginRegister.style.left = "0px";
    }
}

ajustarVista();

function iniciarSesion() {
    if (window.innerWidth > 850) {
        mostrarFormulario("login");
    } else {
        mostrarFormularioMovil("login");
    }
}


function register() {
    if (window.innerWidth > 850) {
        mostrarFormulario("register");
    } else {
        mostrarFormularioMovil("register");
    }
}


function mostrarFormulario(tipo) {
    if (tipo === "login") {
        formularioRegister.style.display = "none";
        formularioLogin.style.display = "block";
        contenedorLoginRegister.style.left = "10px";
        cajaTraseraRegister.style.opacity = "1";
        cajaTraseraLogin.style.opacity = "0";
    } else if (tipo === "register") {
        formularioLogin.style.display = "none";
        formularioRegister.style.display = "block";
        contenedorLoginRegister.style.left = "410px";
        cajaTraseraRegister.style.opacity = "0";
        cajaTraseraLogin.style.opacity = "1";
    }
}


function mostrarFormularioMovil(tipo) {
    if (tipo === "login") {
        formularioRegister.style.display = "none";
        formularioLogin.style.display = "block";
        contenedorLoginRegister.style.left = "0px";
        cajaTraseraRegister.style.display = "block";
        cajaTraseraLogin.style.display = "none";
    } else if (tipo === "register") {
        formularioLogin.style.display = "none";
        formularioRegister.style.display = "block";
        contenedorLoginRegister.style.left = "0px";
        cajaTraseraRegister.style.display = "none";
        cajaTraseraLogin.style.display = "block";
        cajaTraseraLogin.style.opacity = "1";
    }
}

// Función para alternar la visibilidad del menú
function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show');  // Alterna la clase 'show' para mostrar/ocultar el menú
}