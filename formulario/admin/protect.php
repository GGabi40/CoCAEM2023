<?php

if (!isset($_SESSION)) {
    session_start();
}

// Verificar si el usuario ya ha iniciado sesión y si es un administrador
if (!isset($_SESSION['tipo_de_cuenta']) || $_SESSION['tipo_de_cuenta'] !== '1') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'adminCocaem' && $password === 'Sabri2023') {
            // Si las credenciales son válidas, iniciar sesión y redirigir a dashboard
            $_SESSION['tipo_de_cuenta'] = '1';
            header("location: dashboard.php");
            exit;
        } else {
            // Si las credenciales son incorrectas, mostrar mensaje de error
            echo "Credenciales incorrectas. Por favor, intente nuevamente o <a href='../index.php'>vuelva a la página principal</a>.";
        }
    }
    
    ?>
    <h2>Ingrese sus credenciales para acceder:</h2>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <?php
    exit;
}

?>
