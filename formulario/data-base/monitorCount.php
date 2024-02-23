<?php 
include('DBConnection.php');

// Cuenta usuarios
$sql_count_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$result_count_usuarios = mysqli_query($conexion, $sql_count_usuarios);

// Cuenta presentadores
$sql_count_presentadores = "SELECT COUNT(*) AS total_presentadores FROM panel_cientifico";
$result_count_presentadores = mysqli_query($conexion, $sql_count_presentadores);

if($result_count_usuarios && $result_count_presentadores) {
    $row_count_usuarios = mysqli_fetch_assoc($result_count_usuarios);
    $row_count_presentadores = mysqli_fetch_assoc($result_count_presentadores);

    $total_usuarios = $row_count_usuarios['total_usuarios'];
    $total_presentadores = $row_count_presentadores['total_presentadores'];

    $total_inscriptos = $total_usuarios + $total_presentadores;
}
?>