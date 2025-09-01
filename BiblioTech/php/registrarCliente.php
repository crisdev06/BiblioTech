<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['regNombre'];
    $apellido = $_POST['regApellido'];
    $telefono = $_POST['regTelefono'];
    $regEmail = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    // Hashear la contraseña antes de almacenarla, forma segura.
    //$password = password_hash($_POST['regPassword'], PASSWORD_BCRYPT);


    $sql = "INSERT INTO registro_usuarios (nombre, apellido, telefono, correo, contrasena) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $telefono, $regEmail, $password);

    if ($stmt->execute()) {
         echo "<script>
        alert('Registro agregado con éxito');
        window.location.href = '../index.html';
            </script>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>
