<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | CoCAEM 2023</title>

    <link rel="website icon" href="../src/assets/img/logos/Logo CoCAEM.png">
    <link rel="stylesheet" href="../src/assets/css/style.css">
</head>
<body style="height: 98vh;">
    <h1>Login Como Admin | CoCAEM 2023 Rosario</h1>

    <div class="contain-login" style="display:flex;justify-content:center; gap: 16px; text-align: center; font-size:1.3rem">
            <div class="login-admin" style="text-align: center;">
                <a href="../index.php" style="background-color: white; border-radius: 8px; padding: 6px;">📑 Inscripción</a>
            </div>
            <div class="search-qr">
                <a href="../buscar-mi-QR/index.php" style="background-color: white; border-radius: 8px; padding: 6px;">Buscar mi QR ▶️</a>
            </div>
        </div>

    <section class="formulario">
        <form action="./login.php" method="POST" class="formulario-inscripcion">
            <label for="username">Username:
                <input type="text" name="username" id="username" autocomplete="off" required>
            </label>
    
            <label for="password">Password
                <input type="password" name="password" id="password" autocomplete="off" required>
                <button type="button" id="toggleButton" onclick="togglePasswordVisibility()">Mostrar/Ocultar</button>
            </label>
    
            <div id="width-complete" style="display: flex; justify-content:center;">
                <input type="submit" id="submit" value="Login" style="height: 26px;">
            </div>
        </form>
    </section>

    <script>
        function togglePasswordVisibility() {
            let passwordInput = document.getElementById('password');

            if(passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>