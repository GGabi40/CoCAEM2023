<?php

$host = 'localhost'; // Dirección del servidor de la base de datos
$usuario = 'root'; // Nombre de usuario de la base de datos
$contraseña = ''; // Contraseña de la base de datos
$base_de_datos = 'cocaem'; // Nombre de la base de datos

$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die("¡Ups! Ha ocurrido un error.");
}

?>