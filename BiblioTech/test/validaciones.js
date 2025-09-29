 function validarNombre(valor) {
        // acepta letras y acentos
        const regex = /^[a-zA-ZÁÉÍÓÚáéíóúÑñ]+$/; 
        return regex.test(valor);
    }

function validarEmail(email) {
    const regex = /^\S+@\S+\.\S+$/;
    return regex.test(email);
}

function validarTelefono(valor) {
        // Solo números y que empiece con 9, longitud de 9 dígitos
        return /^9\d{8}$/.test(valor);
    }


function validarRut(rutCompleto) {
    // Limpiar puntos y guión
    let rut = rutCompleto.replace(/\./g, '').replace('-', '');
    
    // Separar cuerpo y dígito verificador
    let cuerpo = rut.slice(0, -1);
    let dv = rut.slice(-1).toUpperCase();

    // Revisar que cuerpo sea numérico
    if (!/^\d+$/.test(cuerpo)) return false;

    // Calcular dígito verificador
    let suma = 0;
    let multiplo = 2;

    for (let i = cuerpo.length - 1; i >= 0; i--) {
        suma += parseInt(cuerpo.charAt(i)) * multiplo;
        multiplo = multiplo < 7 ? multiplo + 1 : 2;
    }

    let dvEsperado = 11 - (suma % 11);
    if (dvEsperado === 11) dvEsperado = '0';
    else if (dvEsperado === 10) dvEsperado = 'K';
    else dvEsperado = dvEsperado.toString();

    return dv === dvEsperado;
}
function validarIdLibro(id) {
 
    return /^LBR\d{3}$/.test(id.toUpperCase());
} 

module.exports = { validarRut, validarNombre, validarEmail, validarTelefono, validarIdLibro };