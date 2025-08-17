// ==========================
// Selección de elementos del DOM
// ==========================
const btnMostrarRenta = document.getElementById('btnMostrarRenta');
const btnLogin = document.getElementById('btnLogin');          // Botón para mostrar formulario de inicio de sesión
const btnRegister = document.getElementById('btnRegister');    // Botón para mostrar formulario de registro
const loginForm = document.getElementById('loginForm');        // Formulario de inicio de sesión
const registerForm = document.getElementById('registerForm');  // Formulario de registro
const rentaForm = document.getElementById('rentaForm');        // Formulario de reserva/renta de libros
const cerrarRenta = document.getElementById('cerrarRenta');
const cerrarInicio = document.getElementById('cerrarInicio');
const cerrarRegistro = document.getElementById('cerrarRegistro');
const rentaButton = rentaForm.querySelector('button[type="submit"]'); // Botón de submit del formulario de renta
const mensajeDiv = document.getElementById('mensaje');         // Div donde se mostrarán mensajes (éxito o error)

let usuarioLogueado = false; // Bandera para controlar si el usuario está logueado

function loginExitoso() {
    usuarioLogueado = true;

    // Mostrar el botón para generar renta
    btnMostrarRenta.classList.remove('hidden');
}

// Mostrar el formulario de renta al presionar el botón
btnMostrarRenta.addEventListener('click', () => {
    rentaForm.classList.remove('hidden'); // mostrar el formulario
    btnMostrarRenta.classList.add('hidden'); // ocultar el botón
});
// Cerrar el formulario al presionar la X
cerrarRenta.addEventListener('click', () => {
    rentaForm.classList.add('hidden'); // ocultar el formulario
    btnMostrarRenta.classList.remove('hidden'); // volver a mostrar el botón
});
cerrarInicio.addEventListener('click', () => {
    loginForm.classList.add('hidden'); // ocultar el formulario
});
cerrarRegistro.addEventListener('click', () => {
    registerForm.classList.add('hidden'); // ocultar el formulario
});

// ==========================
// Mostrar formulario de Login
// ==========================
btnLogin.addEventListener('click', () => {
    loginForm.classList.toggle('hidden');     // Alterna visibilidad del formulario de login
    registerForm.classList.add('hidden');     // Oculta el formulario de registro
});

// ==========================
// Mostrar formulario de Registro
// ==========================
btnRegister.addEventListener('click', () => {
    registerForm.classList.toggle('hidden');  // Alterna visibilidad del formulario de registro
    loginForm.classList.add('hidden');        // Oculta el formulario de login
});


// ==========================
// Simular registro de usuario
// ==========================
registerForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Evita recargar la página
    alert('Registro exitoso. Ahora puedes iniciar sesión.');
    registerForm.classList.add('hidden'); // Oculta el formulario de registro
    // Aquí en el futuro guardarás los datos en la BD con Django
});


// ==========================
// Simular inicio de sesión
// ==========================
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    usuarioLogueado = true; // Marcamos al usuario como logueado (simulación)
    alert('Inicio de sesión exitoso. Ahora puedes reservar un libro.');
    loginForm.classList.add('hidden');
    // En el futuro aquí validarás usuario y contraseña desde la base de datos
});


// ==========================
// Validación y envío del formulario de Renta
// ==========================
rentaForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Evita recargar la página al enviar

    // 1. Verificar que el usuario haya iniciado sesión
    if (!usuarioLogueado) {
        mensajeDiv.style.color = 'red';
        mensajeDiv.textContent = 'Debes iniciar sesión antes de reservar un libro.';
        return;
    }

    // 2. Capturar los valores del formulario
    const libro = document.getElementById('libro').value.trim();          // Obligatorio
    const isbn = document.getElementById('isbn').value.trim();            // Opcional
    const fechaRenta = document.getElementById('fechaRenta').value;       // Obligatorio
    const fechaDevolucion = document.getElementById('fechaDevolucion').value; // Obligatorio

    // 3. Limpiar mensajes anteriores
    mensajeDiv.innerHTML = '';
    mensajeDiv.style.color = 'red';

    // 4. Validaciones básicas
    if (!libro || !fechaRenta || !fechaDevolucion) {
        mensajeDiv.textContent = 'Por favor completa todos los campos obligatorios (Libro, Fecha de renta y Fecha de devolución).';
        return;
    }

    const fechaRentaDate = new Date(fechaRenta);
    const fechaDevolucionDate = new Date(fechaDevolucion);
    if (fechaDevolucionDate <= fechaRentaDate) {
        mensajeDiv.textContent = 'La fecha de devolución debe ser posterior a la fecha de renta.';
        return;
    }

    // 5. Validación simulada de existencia del libro y stock
    // En el futuro esto se hará con SQL y Django
    const libroExiste = true;        // Simulación: el libro existe
    const stockDisponible = true;    // Simulación: hay stock disponible

    if (!libroExiste) {
        mensajeDiv.textContent = 'El libro no se encuentra en la biblioteca.';
        return;
    }

    if (!stockDisponible) {
        mensajeDiv.textContent = 'El libro no está disponible actualmente.';
        return;
    }

    // 6. Si todo está correcto → mostrar mensaje de éxito
    mensajeDiv.style.color = 'green';
    mensajeDiv.textContent = `¡Libro "${libro}" rentado exitosamente!`;

    rentaForm.reset(); // Limpiar formulario después de reservar
});
