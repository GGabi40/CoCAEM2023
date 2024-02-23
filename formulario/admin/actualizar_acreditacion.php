<?php 
include('../data-base/DBConnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el código QR leído del formulario o la solicitud POST
    $qrData = $_POST['qrData'];

    // Realiza una consulta SQL para buscar un inscrito con el código QR coincidente
    $sql = "SELECT id, apellidos FROM usuarios WHERE qr = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $qrData);
        if ($stmt->execute()) {
            $stmt->bind_result($inscritoId, $inscritoApellidos);

            if ($stmt->fetch()) {
                // Se encontró un inscrito con el código QR coincidente
                // Actualiza el campo 'acredito' en la base de datos
                $updateSql = "UPDATE usuarios SET acredito = 'OK' WHERE id = ?";
                if ($updateStmt = $mysqli->prepare($updateSql)) {
                    $updateStmt->bind_param("i", $inscritoId);
                    if ($updateStmt->execute()) {
                        // La actualización fue exitosa
                        $response = ['success' => true, 'apellidos' => 'Acreditación marcada como OK para ' . $inscritoApellidos];
                    } else {
                        // Error al actualizar la base de datos
                        $response = ['success' => false, 'message' => 'Error al actualizar la acreditación en la base de datos'];
                    }
                    $updateStmt->close();
                } else {
                    // Error en la consulta de actualización
                    $response = ['success' => false, 'message' => 'Error en la consulta de actualización'];
                }
            } else {
                // No se encontró un inscrito con el código QR coincidente
                $response = ['success' => false, 'message' => 'No se encontró un inscrito con el código QR leído'];
            }
            $stmt->close();
        } else {
            // Error al ejecutar la consulta
            $response = ['success' => false, 'message' => 'Error al ejecutar la consulta'];
        }
    } else {
        // Error en la consulta SQL
        $response = ['success' => false, 'message' => 'Error en la consulta SQL'];
    }

    echo json_encode($response);
}
?>