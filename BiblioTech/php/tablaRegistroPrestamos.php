<?php


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
        <main>

            
            <div class="container my-4 text-center">
                <h2>Registro de Préstamos</h2>
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID Préstamo</th>
                                <th>RUT Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>ID Libro</th>
                                <th>Título del Libro</th>
                                <th>Fecha Préstamo</th>
                                <th>Fecha Devolución</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            include("conexion.php");

                            $sql = "SELECT p.id_prestamo, p.rut_usuario, p.id_libro, p.fecha_prestamo, p.fecha_devolucion,
                                    u.nombre AS nombre_usuario, u.apellido AS apellido_usuario,
                                    l.titulo AS titulo_libro
                                    FROM registro_prestamo p
                                    JOIN registro_usuario u ON p.rut_usuario = u.rut
                                    JOIN registro_libro l ON p.id_libro = l.id_libro";

                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                // Salida de cada fila
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id_prestamo"] . "</td>";
                                    echo "<td>" . $row["rut_usuario"] . "</td>";
                                    echo "<td>" . $row["nombre_usuario"] . "</td>";
                                    echo "<td>" . $row["apellido_usuario"] . "</td>";
                                    echo "<td>" . $row["id_libro"] . "</td>";
                                    echo "<td>" . $row["titulo_libro"] . "</td>";
                                    echo "<td>" . $row["fecha_prestamo"] . "</td>";
                                    echo "<td>" . $row["fecha_devolucion"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No hay registros de préstamos</td></tr>";
                            }

                            $conexion->close();
                            ?>
                        </tbody>
                    </table>

        </main>

        <footer class="site-footer"> <!-- Footer -->

            <div id="footer-container">

                <div class="footer-top">
                    ©️ 2025 Todos los Derechos Reservados. <br> Descubre la experiencia de la lectura
                    Fisica/digital - Bibliotech
                </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>