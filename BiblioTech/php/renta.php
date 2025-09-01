<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libro = $_POST['libro'];
    $fechaRenta = $_POST['fechaRenta'];
    $fechaDevolucion = $_POST['fechaDevolucion'];

    $sql = "INSERT INTO prestamos_libros (libro, fechaRenta, fechaDevolucion) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $libro, $fechaRenta, $fechaDevolucion);

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



