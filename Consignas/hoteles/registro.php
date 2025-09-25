<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Hotel y Director</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #0d6efd;   /* Azul profesional */
      --secondary-color: #6c757d; /* Gris neutro */
      --success-color: #198754;   /* Verde */
      --danger-color: #dc3545;    /* Rojo */
      --light-bg: #f8f9fa;        /* Fondo claro */
      --text-color: #212529;      /* Texto oscuro */
    }
    body {
      background-color: var(--light-bg);
      font-family: 'Arial', sans-serif;
      color: var(--text-color);
    }
    .card-header {
      background-color: var(--primary-color);
      color: white;
    }
    .btn-custom {
      background-color: var(--primary-color);
      border: none;
      color: white;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #0b5ed7;
      transform: scale(1.03);
    }
    legend {
      color: var(--primary-color);
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header text-center">
        <h2>Registrar nuevo hotel</h2>
      </div>
      <div class="card-body">
        <form action="registrar_hotel.php" method="POST" class="row g-3">
          
          <!-- Datos del Hotel -->
          <fieldset class="border p-3 rounded">
            <legend>Datos del Hotel</legend>
            
            <div class="mb-3">
              <label class="form-label">Nombre del hotel</label>
              <input type="text" name="nombre_hotel" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Dirección</label>
              <input type="text" name="direccion" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Precio por hora (€)</label>
              <input type="number" step="0.01" name="precio_hora" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Capacidad (número de huecos)</label>
              <input type="number" name="capacidad" class="form-control" required>
            </div>
          </fieldset>

          <!-- Datos del Director -->
          <fieldset class="border p-3 rounded mt-4">
            <legend>Datos del Director</legend>

            <div class="mb-3">
              <label class="form-label">Nombre del director</label>
              <input type="text" name="nombre_director" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email_director" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" name="password_director" class="form-control" required>
              
              <label class="form-label">Confirma contraseña</label>
              <input type="password" name="password_director2" class="form-control" required>
              
            </div>
          </fieldset>

          <!-- Botón -->
          <div class="d-grid">
            <button type="submit" class="btn btn-custom btn-lg">Registrar Hotel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_hotel    = $_POST['nombre_hotel'];
    $direccion       = $_POST['direccion'];
    $precio_hora     = $_POST['precio_hora'];
    $capacidad       = $_POST['capacidad'];

    $nombre_director = $_POST['nombre_director'];
    $email_director  = $_POST['email_director'];
    $password1       = $_POST['password_director'];
    $password2       = $_POST['password_director2'];

    if ($password1 !== $password2) {
        die("Las contraseñas no coinciden");
    }

    $hash = password_hash($password1, PASSWORD_DEFAULT);

    $insert_hotel = $conn->prepare("INSERT INTO hoteles (nombre, direccion, precio_hora, capacidad) VALUES (?, ?, ?, ?)");
    $insert_hotel->bind_param("ssdi", $nombre_hotel, $direccion, $precio_hora, $capacidad);
    
    if ($insert_hotel->execute()) {
        $hotel_id = $conn->insert_id; 

        
        $insert_director = $conn->prepare("INSERT INTO usuarios (nombre, email, password, rol, hotel_id) VALUES (?, ?, ?, ?, ?)");
        $rol = "director";
        $insert_director->bind_param("ssssi", $nombre_director, $email_director, $hash, $rol, $hotel_id);

        if ($insert_director->execute()) {
            echo "Hotel y director registrados con éxito.";
        } else {
            echo "Error al registrar director: " . $conn->error;
        }
    } else {
        echo "Error al registrar hotel: " . $conn->error;
    }
}
?>

