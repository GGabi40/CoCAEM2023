<?php

include('../data-base/DBConnection.php');
include('./logic/session_config.php');

if(isset($_POST['username']) || isset($_POST['password'])) {

    if(strlen($_POST['username']) == 0 || strlen($_POST['password']) == 0) {
        echo "Por favor, llenar todos los espacios.";
    } else {

        $username = $conexion->real_escape_string($_POST['username']);
        $password = $conexion->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM administradores WHERE username = '$username' AND password = '$password'";
        $sql_query = $conexion->query($sql_code) or die("Falha!! :" . $conexion->error);

        $cantidad = $sql_query->num_rows;

        if($cantidad == 1) {
            
            $user = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            if(isset($user['tipo_de_cuenta'])) {
                $_SESSION['tipo_de_cuenta'] = $user['tipo_de_cuenta'];
            }

            header("location: dashboard.php");

        } else {
            header("location: error.html");
        }
    }
}

$conexion->close();
