<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_libro = strtoupper($_POST['registroId_libro']);
    $titulo = $_POST['registroTitulo'];
    $autor = $_POST['registroAutor'];
    $editorial = $_POST['registroEditorial'];
    $anioPublicacion = $_POST['registroAnioPublicacion'];
    $stock = $_POST['registroStock'];


    $sql = "INSERT INTO registro_libro (id_libro, titulo, autor, editorial, anio_publicacion, stock) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssii", $id_libro, $titulo, $autor, $editorial, $anioPublicacion, $stock);

    if ($stmt->execute()) {
        header("Location: ../index.html?registro=ok");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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
                                            href="http://localhost/BiblioTech/BiblioTech/php/registrarCliente.php">Registrar
                                            Clientes</a></li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/BiblioTech/php/registrarLibro.php">Registrar
                                            Libros</a></li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/BiblioTech/php/renta.php">Registro Préstamo de
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
                                            href="http://localhost/BiblioTech/BiblioTech/php/tablaRegistroClientes.php">Clientes
                                            Registrados</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/BiblioTech/php/tablaRegistroLibros.php">Libros
                                            registrados</a></li>
                                    <li><a class="dropdown-item"
                                            href="http://localhost/BiblioTech/BiblioTech/php/tablaRegistroPrestamos.php">Préstamo
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
                <h2 class="mb-4 text-center">Formulario de Registro de Libros</h2>
                <!-- Formulario de registro de LIBROS-->
                <form id="registrarlibro" method="POST" action="registrarLibro.php">
                    <h2>Agregar Libro</h2>

                    <button type="button" id="cerrarInicio" class="cerrar-btn"></button>

                    <label for="id_libro">ID del libro</label>
                    <input type="text" name="registroId_libro" id="idLibro" placeholder="Ingrese Id del libro" required>

                    <label for="titulo">Título</label>
                    <input type="text" name="registroTitulo" id="Titulo" placeholder="Ingrese el título del libro" required>

                    <label for="autor">Autor</label>
                    <input type="text" name="registroAutor" id="Autor" placeholder="Ingrese el autor" required>

                    <label for="editorial">Editorial</label>
                    <input type="text" name="registroEditorial" id="Editorial" placeholder="Ingrese la Editorial" required>

                    <label for="anioPublicacion">Año de publicación</label>
                    <input type="number" name="registroAnioPublicacion" id="Publicacion" placeholder="Ingrese el año de publicacion" required>

                    <label for="stock">Stock</label>
                    <input type="number" name="registroStock" id="Stock" placeholder="Ingrese Stock" required>

                    <button class="enviarForm" type="submit">Ingresar</button>
                </form>
        </section>

        <footer class="site-footer"> <!-- Footer -->

            <div id="footer-container">
                <div class="footer-top">©️ 2025 Todos los Derechos Reservados. <br> Descubre la experiencia de la lectura
                    Física/digital - Bibliotech</div>
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
    </div>
    <script src="../front/js/formularioLibro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const params = new URLSearchParams(window.location.search);
        if (params.get("registro") === "ok") {
            alert("Registro agregado con éxito");
        }
    </script>

</body>

</html>