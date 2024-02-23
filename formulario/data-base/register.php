<?php

include("DBConnection.php");

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include('monitorCount.php');

    // Obtener los datos del formulario
    $fecha_reg = date("d/m/y");
    $nombre = $_POST["name"];
    $apellidos = $_POST["surname"];
    $dni = $_POST["dni"];
    $telefono = $_POST["tel-number"];
    $email = $_POST["email"];
    $presenta_trabajo = $_POST["presenta_trabajo"];
    $titulo_trabajo = $_POST["titulo_trabajo"];
    $autores_trabajo = $_POST["autores_trabajo"];
    $asesores_trabajo = $_POST["asesores_trabajo"];
    $sociedad_member = $_POST["sociedad_member"];
    $cuota_completo = $_POST["cuota_completo"];
    $path = './src/qrCodes/';
    $qr = $path . "qr_" . $apellidos . $dni . ".png";

    // $sql_verificar              = "SELECT dni FROM usuarios WHERE dni = '$dni' OR dni = '$dni' IN (SELECT dni FROM panel_cientifico)";
    // $resultado_verificar        = mysqli_query($conexion, $sql_verificar);

    // // Si el DNI está registrado:
    // if (mysqli_num_rows($resultado_verificar) > 0) {
    //     echo '<span style="font-size: 1.6rem; background-color: red; color:white; display: block; text-align:center; border-radius: 8px; margin-bottom:6px; margin-top: 6px;padding: 6px; font-weight:700">Este DNI ya está registrado como:</span>';
    //     echo "<span style='font-size: 1.6rem; background-color: red; color:white; display: block; text-align:center; border-radius: 8px; padding: 6px; font-weight:400'>$nombre $apellidos</span>";
    // } else {

        if($total_inscriptos >= 1300) {
            echo '<span style="font-size: 1.6rem; background-color: red; color:white; display: block; text-align:center; border-radius: 8px; padding: 6px; font-weight:700">¡Ups! Alcanzamos el número máximo de inscriptos.</span>';
            echo '<span style="font-size: 1.2rem; background-color: red; color:white; display: block; text-align:center; border-radius: 8px; padding: 6px;">Quédese atento a nuestras redes sociales, pronto se abrirá una Lista de Espera.</span>';
            exit;
        } else {
            // Llama libería del QRCode
            require_once './class/phpqrcode/qrlib.php';
    
            // Si presenta trabajo Científico
            if ($presenta_trabajo === "presenta") {
                // Insertar los datos en la tabla panel_cientifico
                $sql_panel = "INSERT INTO panel_cientifico (fecha_reg, nombre, apellidos, dni, telefono, email, presenta_trabajo, titulo_trabajo, autores_trabajo, asesores_trabajo, sociedad_member, cuota_completo, qr)
        VALUES ('$fecha_reg', '$nombre', '$apellidos', '$dni', '$telefono', '$email', '$presenta_trabajo', '$titulo_trabajo', '$autores_trabajo', '$asesores_trabajo', '$sociedad_member', '$cuota_completo', '$qr')";
    
                $resultado_panel = mysqli_query($conexion, $sql_panel);
    
                if ($resultado_panel) {
                    // Los datos se insertaron correctamente en panel_cientifico
                    echo '<span style="font-size: 1.6rem; background-color: greenyellow; display: block; text-align:center; border-radius: 8px; padding: 6px; font-weight:700">Registro exitoso</span>';
    
                    $idUsuario = mysqli_insert_id($conexion);
                    QRcode::png("$idUsuario$apellidos$presenta_trabajo", $qr, 'H', 4, 4);
    
                    // Genera QR
                    echo '<div class="QRgenerator"';
                    echo '<p class="responseQR"></p>';
                    echo '<div id="qrContainer">';
                    echo '<img src="' . $qr . '" alt="Código QR">';
                    echo "<p>Entrada de: <strong>$nombre $apellidos, DNI: $dni.</strong></p>";
                    echo "<p>Expone trabajo: <strong>$titulo_trabajo.</strong></p>";
                    echo '</div>';
                    echo '<span class="important" style="background-color:#774D7A; padding:6px; font-size: 1.2rem; border-radius: 8px; color:white">Guarde este código, con él entrará al evento.</span>';
                    echo '</div>';
                } else {
                    // Ocurrió un error al insertar los datos en panel_cientifico
                    echo "Ha ocurrido un error.";
                }
            } else {
                // Insertar los datos en la tabla de usuarios
                $sql = "INSERT INTO usuarios (fecha_reg, nombre, apellidos, dni, telefono, email, presenta_trabajo, sociedad_member, cuota_completo, qr)
            VALUES ('$fecha_reg', '$nombre', '$apellidos', '$dni', '$telefono', '$email', '$presenta_trabajo', '$sociedad_member', '$cuota_completo', '$qr')";
    
                $resultado_insertar = mysqli_query($conexion, $sql);
    
                if ($resultado_insertar) {
                    echo '<span style="font-size: 1.6rem; background-color: greenyellow; display: block; text-align:center; border-radius: 8px; padding: 6px; font-weight:700">Registro exitoso</span>';
    
                    $idUsuario = mysqli_insert_id($conexion);
                    QRcode::png("$idUsuario$apellidos", $qr, 'H', 4, 4);
    
                    // Genera QR
                    echo '<div class="QRgenerator"';
                    echo '<p class="responseQR"></p>';
                    echo '<div id="qrContainer">';
                    echo '<img src="' . $qr . '" alt="Código QR">';
                    echo "<p>Entrada de: <strong>$nombre $apellidos, $dni</strong></p>";
                    echo '</div>';
                    echo '<span class="important" style="background-color:#774D7A; padding:6px; font-size: 1.2rem; border-radius: 8px; color:white">Guarde este código, con él entrará al evento.</span>';
                    echo '</div>';
                } else {
                    echo "¡Ups! Ha ocurrido un error.";
                }
            }
        }
    // }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
