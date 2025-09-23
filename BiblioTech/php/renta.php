<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut_usuario = $_POST['rut_usuario'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    // Verificar que el libro tiene stock disponible
    $verificar = $conexion->prepare("SELECT stock FROM registro_libro WHERE id_libro = ?");
    $verificar->bind_param("s", $id_libro);
    $verificar->execute();
    $resultado = $verificar->get_result();
    $libro = $resultado->fetch_assoc();

    if ($libro && $libro['stock'] > 0) {
        // Registrar el préstamo
        $sql = "INSERT INTO registro_prestamo (rut_usuario, id_libro, fecha_prestamo, fecha_devolucion) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $rut_usuario, $id_libro, $fecha_prestamo, $fecha_devolucion);

        if ($stmt->execute()) {         
            // Descontar 1 del stock
            $update = $conexion->prepare("UPDATE registro_libro SET stock = stock - 1 WHERE id_libro = ?");
            $update->bind_param("s", $id_libro);
            $update->execute();

            header("Location: ../index.html?registro=ok");
            exit;
        } else {
            echo "Error al registrar el préstamo: " . $stmt->error;
        }
    } else {
        echo "<script>alert('No hay stock disponible para este libro'); window.location.href='renta.php';</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../front/css/style.css">
    <link rel="stylesheet" href="../front/css/footer.css">
    <link rel="stylesheet" href="../front/css/formularios.css">
    <link rel="stylesheet" href="../front/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



    <title>Bibliotech</title>
</head>

<body>
    <div id="main-container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="http://localhost/BiblioTech/BiblioTech/index.html">BiblioTech</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Formularios
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/Bibliotech/php/registrarCliente.php">Registrar
                                            Clientes</a></li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/Bibliotech/php/registrarLibro.php">Registrar
                                            Libros</a></li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/Bibliotech/php/renta.php">Registro Préstamo de
                                            Libros</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Tablas
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/Bibliotech/php/tablaRegistroClientes.php">Clientes
                                            Registrados</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/Bibliotech/php/tablaRegistroLibros.php">Libros
                                            registrados</a></li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/Bibliotech/php/tablaRegistroPrestamos.php">Préstamo
                                            Registrados</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section class="bg-light">
            <div class="container mt-5">
                <h2 class="mb-4">Formulario de Renta Libros</h2>
                <form id="rentaForm" method="POST" action="renta.php">
                    <h2>Reservar Libro</h2>
                    <button type="button" id="cerrarRenta" class="cerrar-btn"></button>

                    <label for="rut_usuario">RUT del usuario:</label>
                    <input type="text" id="Rut" name="rut_usuario" placeholder="Ingrese el RUT" required>

                    <label for="idLibro">ID del libro:</label>
                    <input type="text" id="idLibro" name="id_libro" placeholder="Ingrese el ID del libro" required>

                    <label for="fechaRenta">Fecha de renta:</label>
                    <input type="date" id="fechaRenta" name="fecha_prestamo" placeholder="Ingrese la fecha de renta" required>

                    <label for="fechaDevolucion">Fecha de devolución:</label>
                    <input type="date" id="fechaDevolucion" name="fecha_devolucion" placeholder="Ingrese la fecha de devolución" required >

                    <button class="enviarForm" type="submit">Rentar libro</button>
                </form>


            </div>
        </section>
        <footer class="site-footer"> <!-- Footer -->

            <div id="footer-container">

                <div class="footer-top">©️ 2025 Todos los Derechos Reservados. <br> Descubre la experiencia de la lectura
                    Fisica/digital - Bibliotech</div>
                <!-- derechos de autor -->

                <ul class="footer-links">
                    <li><a class="link" href="https://github.com/crisdev06/BiblioTech" target="_blank" rel="noreferrer">
                            <!-- 1. icono redes sociales -->
                            <img class="logo" src="../icons/github.png" alt="Logo github">
                        </a>
                    </li>

                    <li><a class="link" href="https://portal.inacap.cl" target="_blank">
                            <!-- 2. icono redes sociales -->
                            <img class="logo" src="../icons/inacap.png" alt="Logo inacap">
                        </a>
                    </li>

                </ul>
            </div>
        </footer>
        <script src="../front/js/formularioRenta.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            const params = new URLSearchParams(window.location.search);
            if (params.get("registro") === "ok") {
                alert("Registro agregado con éxito");
            }
        </script>



</html>