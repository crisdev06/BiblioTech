<?php
$host = "localhost";
$usuario = "root";
$password = "";  
$base_datos = "bibliotech";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Forzar errores como excepciones

try {
    $conexion = new mysqli($host, $usuario, $password, $base_datos);
    $conexion->set_charset("utf8"); // Opcional, para soportar tildes/ñ
    
} catch (mysqli_sql_exception $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
?>
