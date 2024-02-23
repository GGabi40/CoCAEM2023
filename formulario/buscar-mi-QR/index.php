<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="../src/assets/img/logos/Logo CoCAEM.png">
    <link rel="stylesheet" href="../src/assets/css/style.css">

    <title>Buscar mi QR | CoCAEM 2023</title>
</head>

<body style="height: 97vh;">
    <h1 style="margin-top: 2.3rem">Buscar mi QR</h1>

    <div class="contain-login" style="display:flex;justify-content:center; gap: 16px; text-align: center; font-size:1.3rem">
            <div class="search-qr">
                <a href="../index.php" style="background-color: white; border-radius: 8px; padding: 6px;">◀️ Registrarme</a>
            </div>
        </div>

    <section class="formulario">
        <form method="post">
            <h2 style="text-align: center; font-size: 2rem; margin-bottom: 10px">¿Perdió su código QR?</h2>
            <label for="name">Tu nombre:
                <input type="text" name="name" id="nombre" required>
            </label>
            <label for="surname">Tu Apellido:
                <input type="text" name="surname" id="apellido" required>
            </label>
            <label for="dni">Dni / Pasaporte:
                <input type="text" name="dni" id="identidad" required>
            </label>
            <input type="submit" value="Enviar" id="submit" style="height: 30px; background-color: white;">
        </form>

        <?php 
        include("./search.php");
        ?>
    </section>
</body>

</html>