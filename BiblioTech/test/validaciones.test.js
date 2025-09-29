// validaciones.test.js
const { validarRut, validarNombre, validarEmail, validarTelefono } = require('./validaciones');

describe('Pruebas unitarias de validación', () => {

    // RUT
    test('RUT válido', () => {
        expect(validarRut('12.345.678-5')).toBe(true);
    });

    test('RUT inválido', () => {
        expect(validarRut('12345678-9')).toBe(false);
    });

    test('RUT vacío', () => {
        expect(validarRut('')).toBe(false);
    });

    test('RUT con caracteres especiales', () => {
        expect(validarRut('12.345.678-!')).toBe(false);
    });

    // Nombre
    test('Nombre válido', () => {
        expect(validarNombre('Pedro')).toBe(true);
    });

    test('Nombre inválido con números', () => {
        expect(validarNombre('Pedro123')).toBe(false);
    });

    test('Nombre vacío', () => {
        expect(validarNombre('')).toBe(false);
    });

    test('Nombre con caracteres especiales', () => {
        expect(validarNombre('Juan@')).toBe(false);
    });

    // Email
    test('Email válido', () => {
        expect(validarEmail('correo@dominio.com')).toBe(true);
    });

    test('Email inválido', () => {
        expect(validarEmail('correo.com')).toBe(false);
    });

    test('Email vacío', () => {
        expect(validarEmail('')).toBe(false);
    });

    // Teléfono
    test('Teléfono válido', () => {
        expect(validarTelefono('912345678')).toBe(true);
    });

    test('Teléfono inválido', () => {
        expect(validarTelefono('812345678')).toBe(false);
    });

    test('Teléfono vacío', () => {
        expect(validarTelefono('')).toBe(false);
    });

    test('Teléfono con letras', () => {
        expect(validarTelefono('9abcdefghi')).toBe(false);
    });

    test('Teléfono muy largo', () => {
        expect(validarTelefono('9123456789')).toBe(false);
    });

});
