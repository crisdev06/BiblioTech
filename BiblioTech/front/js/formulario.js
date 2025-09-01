// ==========================
// Selección de elementos del DOM
// ==========================
const btnMostrarRenta = document.getElementById('btnMostrarRenta');
const btnRegistrarLibro = document.getElementById('btnRegistrarLibro');          // Botón para mostrar formulario de inicio de sesión
const btnRegister = document.getElementById('btnRegister');    // Botón para mostrar formulario de registro
const registrarLibro = document.getElementById('registrarlibro');// Formulario registro libro
const registerForm = document.getElementById('registerForm');  // Formulario de registro
const rentaForm = document.getElementById('rentaForm');        // Formulario de reserva/renta de libros
const cerrarRenta = document.getElementById('cerrarRenta');
const cerrarInicio = document.getElementById('cerrarInicio');
const cerrarRegistro = document.getElementById('cerrarRegistro');
const rentaButton = rentaForm.querySelector('button[type="submit"]'); // Botón de submit del formulario de renta
const mensajeDiv = document.getElementById('mensaje');         // Div donde se mostrarán mensajes (éxito o error)




// Cerrar el formulario al presionar la X
cerrarRenta.addEventListener('click', () => {
    rentaForm.classList.add('hidden'); // ocultar el formulario
    btnMostrarRenta.classList.remove('hidden'); // volver a mostrar el botón
});
cerrarInicio.addEventListener('click', () => {
    registrarLibro.classList.add('hidden'); // ocultar el formulario
    btnRegistrarLibro.classList.remove('hidden');
});
cerrarRegistro.addEventListener('click', () => {
    registerForm.classList.add('hidden'); // ocultar el formulario
    btnRegister.classList.remove('hidden');
});
// Mostrar el formulario de renta al presionar el botón
btnMostrarRenta.addEventListener('click', () => {
    rentaForm.classList.remove('hidden'); // mostrar el formulario
    btnMostrarRenta.classList.add('hidden'); // ocultar el botón
});

// ==========================
// Mostrar formulario de Login
// ==========================
btnRegistrarLibro.addEventListener('click', () => {
    registrarLibro.classList.toggle('hidden');     // Alterna visibilidad del formulario de login
    btnRegistrarLibro.classList.add('hidden');     // Oculta el formulario de registro
});

// ==========================
// Mostrar formulario de Registro
// ==========================
btnRegister.addEventListener('click', () => {
    registerForm.classList.toggle('hidden');  // Alterna visibilidad del formulario de registro
    btnRegister.classList.add('hidden');        // Oculta el formulario de login
});
// Validar nombre: solo letras
document.getElementById("regNombre").addEventListener("input", function () {
    this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
});
// Validar libro: solo letras
document.getElementById("libro").addEventListener("input", function () {
    this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
});

// Validar teléfono: solo números y máximo 9 dígitos
document.getElementById("regTelefono").addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ""); // solo números
    if (this.value.length > 9) {
        this.value = this.value.slice(0, 9); // cortar a 9
    }
});

// Validar email: mostrar error mientras escribe
document.getElementById("loginEmail").addEventListener("input", function () {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(this.value)) {
        this.setCustomValidity("Correo no válido. Ej: ejemplo@correo.com");
    } else {
        this.setCustomValidity(""); // válido
    }
});



// ==========================
// Validación y envío del formulario de Renta
// ==========================
rentaForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Evita recargar la página al enviar


    // 1. Capturar los valores del formulario
    const libro = document.getElementById('libro').value.trim();          // Obligatorio
    const isbn = document.getElementById('isbn').value.trim();            // Opcional
    const fechaRenta = document.getElementById('fechaRenta').value;       // Obligatorio
    const fechaDevolucion = document.getElementById('fechaDevolucion').value; // Obligatorio

    // 2. Limpiar mensajes anteriores
    mensajeDiv.innerHTML = '';
    mensajeDiv.style.color = 'red';

    // 3. Validaciones básicas
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

    // 6. Si todo está correcto → mostrar mensaje de éxito
    mensajeDiv.style.color = 'green';
    mensajeDiv.textContent = `¡Libro "${libro}" rentado exitosamente!`;

    rentaForm.reset(); // Limpiar formulario después de reservar
});
