<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['registroTitulo'];
    $autor = $_POST['registroAutor'];
    $editorial = $_POST['registroEditorial'];
    $anioPublicacion = $_POST['registroAnioPublicacion'];
    $stock = $_POST['registroStock'];

    $sql = "INSERT INTO registro_libros (titulo, autor, editorial, anio_publicacion, stock) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssii", $titulo, $autor, $editorial, $anioPublicacion, $stock);

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