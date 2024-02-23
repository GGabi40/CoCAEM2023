<?php

include('../data-base/DBConnection.php');

/* Cuenta usuarios: */
$sql_count_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$result_count_usuarios = mysqli_query($conexion, $sql_count_usuarios);

$row_usuarios = mysqli_fetch_assoc($result_count_usuarios);
$total_usuarios = $row_usuarios['total_usuarios'];

/* Cuenta presentadores: */
$sql_count_presentadores = "SELECT COUNT(*) AS total_presentadores FROM panel_cientifico";
$result_count_presentadores = mysqli_query($conexion, $sql_count_presentadores);

$row_presentadores = mysqli_fetch_assoc($result_count_presentadores);
$total_presentadores = $row_presentadores['total_presentadores'];

/* Calculo total: */

$sumaTotal = $total_presentadores + $total_usuarios;

/* Cuenta usuarios con Sociedad Científica USUARIOS */
$sql_count_sociedad = "SELECT COUNT(*) AS total_sociedad FROM usuarios WHERE sociedad_member IS NOT NULL AND sociedad_member <> ''";
$result_count_sociedad = mysqli_query($conexion, $sql_count_sociedad);

$row_sociedad = mysqli_fetch_assoc($result_count_sociedad);
$total_sociedad = $row_sociedad['total_sociedad'];

/* Cuenta usuarios con Sociedad Científica EXPOSITORES */

$sql_count_sociedad_expositor = "SELECT COUNT(*) AS total_sociedad FROM panel_cientifico WHERE sociedad_member IS NOT NULL AND sociedad_member <> ''";
$result_count_sociedad_expositor = mysqli_query($conexion, $sql_count_sociedad_expositor);

$row_sociedad = mysqli_fetch_assoc($result_count_sociedad_expositor);
$total_sociedad_expositor = $row_sociedad['total_sociedad_expositor'];

?>