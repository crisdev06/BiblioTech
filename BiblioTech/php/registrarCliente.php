<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rut = $_POST['regRut'];
  $nombre = $_POST['regNombre'];
  $apellido = $_POST['regApellido'];
  $fono = $_POST['regFono'];
  $regEmail = $_POST['regEmail'];
  $password = $_POST['regPassword'];
  // Hashear la contraseña antes de almacenarla, forma segura.
  //$password = password_hash($_POST['regPassword'], PASSWORD_BCRYPT);


  $sql = "INSERT INTO registro_usuario (rut, nombre, apellido, fono, correo, contrasena) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("ssssss", $rut, $nombre, $apellido, $fono, $regEmail, $password);

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
        <h2 class="mb-4 text-center">Formulario de Registro de Clientes</h2>

        <form id="formularioCliente" action="registrarCliente.php" method="POST" class="p-4 border rounded bg-white shadow-sm">
          
        <div class="mb-3">
          <h2>Registrar Cliente</h2>
          <label for="regRut" class="form-label">Rut</label>
          <input type="text" class="form-control" id="Rut" name="regRut" placeholder="Ingrese su rut" required>
        </div>
        
        <div class="mb-3">
            <label for="regNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="regNombre" placeholder="Ingrese su nombre" required>
          </div>

          <div class="mb-3">
            <label for="regApellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="regApellido" placeholder="Ingrese su apellido" required>
          </div>

          <div class="mb-3">
            <label for="regFono" class="form-label">Fono</label>
            <input type="text" class="form-control" id="Telefono" name="regFono" placeholder="Ingrese su telefono" required>
          </div>

          <div class="mb-3">
            <label for="regEmail" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="Email" name="regEmail" placeholder="Ingrese su correo" required>
          </div>

          <div class="mb-3">
            <label for="regPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="Password" name="regPassword" placeholder="Ingrese su contraseña" required>
          </div>

          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

      </div>
    </section>
      <footer class="site-footer"> 

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
    
  </div>
  </footer>

  <script src="../front/js/formularioCliente.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const params = new URLSearchParams(window.location.search);
    if (params.get("registro") === "ok") {
      alert("Registro agregado con éxito");
    }
  </script>

</body>

</html>