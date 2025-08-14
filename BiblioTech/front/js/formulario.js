const form = document.getElementById('rentaForm');
const mensajeDiv = document.getElementById('mensaje');

form.addEventListener('submit', function (event) {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const libro = document.getElementById('libro').value.trim();
    const isbn = document.getElementById('isbn').value.trim();
    const fechaRenta = document.getElementById('fechaRenta').value;
    const fechaDevolucion = document.getElementById('fechaDevolucion').value;

    mensajeDiv.innerHTML = '';
    mensajeDiv.style.color = 'red';

    // 1. Validaciones básicas de campos
    if (!nombre || !email || !telefono || !libro || !fechaRenta || !fechaDevolucion) {
        mensajeDiv.textContent = 'Por favor completa todos los campos obligatorios.';
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        mensajeDiv.textContent = 'Por favor ingresa un correo electrónico válido.';
        return;
    }

    const telefonoRegex = /^[0-9]{8,15}$/;
    if (!telefonoRegex.test(telefono)) {
        mensajeDiv.textContent = 'El teléfono debe contener solo números y tener entre 8 y 15 dígitos.';
        return;
    }

    const fechaRentaDate = new Date(fechaRenta);
    const fechaDevolucionDate = new Date(fechaDevolucion);
    if (fechaDevolucionDate <= fechaRentaDate) {
        mensajeDiv.textContent = 'La fecha de devolución debe ser posterior a la fecha de renta.';
        return;
    }

    // 2. Validación de libro y stock (simulación temporal)
    // Esta parte será reemplazada por una consulta SQL más adelante
    const libroExiste = true; // Aquí iría la consulta a la base de datos
    const stockDisponible = true; // Aquí se verificará el stock real

    if (!libroExiste) {
        mensajeDiv.textContent = 'El libro no se encuentra en la biblioteca.';
        return;
    }

    if (!stockDisponible) {
        mensajeDiv.textContent = 'El libro no está disponible actualmente.';
        return;
    }

    // 3. Si pasa todas las validaciones
    mensajeDiv.style.color = 'green';
    mensajeDiv.textContent = `¡Libro "${libro}" rentado exitosamente!`;
    form.reset();
});
