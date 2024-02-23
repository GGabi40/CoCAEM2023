<?php

include("../data-base/DBConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['name'];
  $apellidos = $_POST['surname'];
  $dni = $_POST['dni'];

  $query = "SELECT qr FROM usuarios WHERE nombre = '$nombre' AND apellidos = '$apellidos' AND dni = '$dni'";
  $query_presentador = "SELECT qr FROM panel_cientifico WHERE nombre = '$nombre' AND apellidos = '$apellidos' AND dni = '$dni'";

  $resultado = mysqli_query($conexion, $query);

  // Verificar si se encontró el registro del usuario
  if (mysqli_num_rows($resultado) > 0) {
    // Obtener el código QR del primer registro encontrado
    $registro = mysqli_fetch_assoc($resultado);
    $qr = $registro['qr'];

    // Mostrar el código QR
    echo '<div class="QRgenerator"';
    echo '<div id="qrContainer">';
    echo "<p style='font-size: 1.5rem;'>Código QR de: <strong style='background-color: rgba(255, 255, 0, 0.342); padding: 3px;'>$nombre $apellidos, $dni</strong></p>";
    echo "<img src='../$qr' alt='Código QR'>";
    echo '</div>';
  } else {
    // Se fija en panel_cientifico
    $resultado_presentador = mysqli_query($conexion, $query_presentador);

    if (mysqli_num_rows($resultado_presentador) > 0) {
      $registro_presentador = mysqli_fetch_assoc($resultado_presentador);
      $qr = $registro_presentador['qr'];

      // Mostrar el código QR
      echo '<div class="QRgenerator"';
      echo '<div id="qrContainer">';
      echo "<p style='font-size: 1.5rem;'>Código QR de: <strong style='background-color: rgba(255, 255, 0, 0.342); padding: 3px;'>$nombre $apellidos, $dni</strong></p>";
      echo "<img src='../$qr' alt='Código QR'>";
      echo '</div>';
    } else {
      // No se encontró el registro del usuario
      echo "No se encontró el código QR para los datos ingresados.";
    }
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
}
