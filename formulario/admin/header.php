<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true || $_SESSION['tipo_de_cuenta'] !== 1) {
    // Si no se ha iniciado sesión, redirigir al inicio de sesión
    header('Location: error.html');
    exit;
}
?>
