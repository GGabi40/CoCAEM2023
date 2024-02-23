<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./src/assets/css/style.css">
    <link rel="website icon" href="./src/assets/img/logos/Logo CoCAEM.png">

    <title>CoCAEM 2023 | Formulario de Inscripción</title>
</head>

<body>
    <main class="contain-all">
        <h1>
            Inscripción a “XXXIV Congreso Científico Argentino de Estudiantes de Medicina”
        </h1>

        <div class="contain-login" style="display:flex;justify-content:center; gap: 16px; text-align: center; font-size:1.3rem">
            <div class="login-admin" style="text-align: center;">
                <a href="./admin/index.php" style="background-color: white; border-radius: 8px; padding: 6px;">◀️ Login como Admin</a>
            </div>
            <div class="search-qr">
                <a href="./buscar-mi-QR/index.php" style="background-color: white; border-radius: 8px; padding: 6px;">Buscar mi QR ▶️</a>
            </div>
        </div>

        <section class="formulario">

            <form class="formulario-inscripcion" method="post" enctype="multipart/form-data">
                <label for="name">Nombres: <span class="req" title="Campo Obligatorio">*</span>
                    <input type="text" name="name" id="name" required>
                </label>

                <label for="surname">Apellidos: <span class="req" title="Campo Obligatorio">*</span>
                    <input type="text" name="surname" id="surname" required>
                </label>

                <label for="dni">DNI / Pasaporte: <span class="req" title="Campo Obligatorio">*</span>
                    <input type="text" name="dni" id="dni" maxlength="8" required>
                </label>

                <label for="tel-number">Teléfono: <span class="req" title="Campo Obligatorio">*</span>
                    <input type="number" name="tel-number" minlength="7" id="tel-number" required>
                </label>

                <div id="width-complete">
                    <label for="email">Mail para Contacto: <span class="req" title="Campo Obligatorio">*</span>
                        <input type="email" name="email" id="input--mail" placeholder="Ej.: example@example.com" required>
                    </label>

                    <fieldset>
                        <legend>¿Presentará un Trabajo de Investigación?</legend>
                        <label for="presenta-trabajo">Sí
                            <input type="radio" name="presenta_trabajo" value="presenta" id="presenta-trabajo">
                        </label>
                        <label for="presenta-trabajo">No
                            <input type="radio" name="presenta_trabajo" value="no-presenta" id="presenta-trabajo">
                        </label>

                        <span id="attention"><strong>¡Atención!</strong> Leer <a href="https://bit.ly/2023DownloadByC" target="_blank" rel="noopener noreferrer">Base para la Presentación y Exposición de Trabajos de Investigación</a>.</span>

                        <fieldset class="datos-trabajo">
                            <h2>Trabajo de Investigación</h2>

                            <label for="titulo-trabajo">¿Cuál es el título?
                                <input type="text" name="titulo_trabajo" id="titulo-trabajo" placeholder="Título del Trabajo Científico">
                            </label>

                            <label for="autores-trabajo">¿Quiénes son los Autores?
                                <input type="text" name="autores_trabajo" id="autores-trabajo" placeholder="Apellido/s, Nombre; ...">
                            </label>

                            <label for="asesores-trabajo">¿Quiénes son los Director/es o Asesor/es?
                                <input type="text" name="asesores_trabajo" id="asesores-trabajo" placeholder="Apellido/s, Nombre; ...">
                            </label>

                            <span style="background-color:rgba(120, 0, 137, 0.51);font-size: 1.2rem; border-radius:8px; display:block; padding: 3px;"><strong>¡Recordar!</strong> Esta información será la utilizada para emitir los certificados, por lo cual si existen errores concordantes con errores en su ficha de inscripción, no se realizará la modificación de los mismos.</span>

                        </fieldset>
                    </fieldset>

                    <fieldset class="input-radio--member">
                        <legend>¿Es un miembro de FACES?</legend>

                        <label for="memberFaces">Sí
                            <input type="radio" name="memberFaces" value="miembro-faces" id="member--input">
                        </label>
                        <label for="memberFaces">No
                            <input type="radio" name="memberFaces" value="noMiembro-faces" id="member--input">
                        </label>
                    </fieldset>

                    <fieldset class="input--sociedad">
                        <legend>¿A qué sociedad pertenece?</legend>

                        <select name="sociedad_member" id="select--sociedad" class="member-sociedad">
                            <option value="">Selecciona una opción</option>
                            <option value="acema">ACEMA</option>
                            <option value="aecuba">AECUBA</option>
                            <option value="soccemgm">SoCCEM GM</option>
                            <option value="socemunne">SoCEM UNNE</option>
                            <option value="scemt">SCEMT</option>
                            <option value="seicsunse">SEICS-UNSE</option>
                            <option value="socemcauncaus">SoCEMCA UNCAus</option>
                        </select>
                    </fieldset>

                    <fieldset class="pago-cuotas">
                        <legend>¿Cómo pagarás? <span class="req" title="Campo Obligatorio">*</span></legend>

                        <select name="cuota_completo" id="cuota-completo" required>
                            <option value="">Selecciona una opción</option>
                            <option value="completo">Valor Completo</option>
                            <!-- <option value="cuotas">En Cuotas</option> -->
                        </select>

                        <span id="attentionCuota"><strong>¡Atención! </strong>
                        <br>
                        <strong>1.</strong> Para abonar, entrar al siguiente <a href="https://www.coopmedicasunr.com.ar/eventos/jornadas/143-xxxiv-congreso-cientifico-argentino-de-estudiantes-de-medicina-cocaem" target="_blank" rel="noopener noreferrer">ENLACE</a> y LEER la descripción.
                        <br>
                        <strong>2.</strong> Mandar su comprobante de pago a: <a href="mailto:tesoreriacocaem23@gmail.com" target="_blank" rel="noopener noreferrer">tesoreriacocaem23@gmail.com</a>
                        </span>
                    </fieldset>

                    <input type="submit" value="Enviar" id="submit" style="height: 30px; background-color: white; margin-bottom: 6px;">
                </div>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include("./data-base/register.php");
            }
            ?>

        </section>
    </main>


    <footer id="footer">
        <div class="footer-cocaem">
            <div class="contain-logos">
                <div class="white-bg-logo">
                    <a href="http://cocaem.acresrosario.com" target="_blank" rel="noopener noreferrer">
                        <img src="./src/assets/img/logos/Logo CoCAEM.png" alt="Logo CoCAEM">
                    </a>
                </div>

                <div class="other-logos">
                    <a href="http://acresrosario.com" target="_blank" rel="noopener noreferrer">
                        <img src="./src/assets/img/logos/Logo ACRES.png" alt="Logo ACRES">
                    </a>
                    <a href="http://instagram.com/faces.virtual" target="_blank" rel="noopener noreferrer">
                        <img src="./src/assets/img/logos/Logo FACES.png" alt="Logo FACES">
                    </a>
                    <a href="http://fcm.unr.edu.ar" target="_blank" rel="noopener noreferrer">
                        <img src="./src/assets/img/logos/Logo FCM.png" alt="Logo FCM-UNR">
                    </a>
                </div>
            </div>

            <div class="contain-social-media">
                <div class="ig">
                    <a href="http://instagram.com/cocaem.rosario" target="_blank" rel="noopener noreferrer" id="ig-cocaem">
                        <img src="./src/assets/img/icons/icon instagram.png" alt="Logo instagram">
                        <span>
                            @cocaem.rosario
                        </span>
                    </a>
                </div>

                <div class="maps">
                    <div class="map">
                        <a href="https://www.google.com/maps/search/Santa+Fe+3102+-+C.P+2000+Rosario/@-32.953808,-60.6401331,15z" target="_blank" rel="noopener noreferrer" id="maps-cocaem">
                            <img src="./src/assets/img/icons/icon ubic.png" alt="Ubicación CoCAEM">
                            <span>
                                Santa Fe 3102 - C.P 2000 Rosario
                            </span>
                        </a>
                    </div>
                </div>

                <div class="mail">
                    <a href="mailto:cocaem2023@gmail.com" target="_blank" rel="noopener noreferrer" id="mail-cocaem">
                        <img src="./src/assets/img/icons/icon mail.png" alt="Mail de Contacto">
                        <span>
                            cocaemrosario2023@gmail.com
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="ggabi">
            <p id="ggabi-footer">Desarrollado con <span>♥️</span> por <a href="https://ggabi40.github.io/linktree/" target="_blank">Gabriela
                    B. Carvalho</a>.</p>
        </div>
    </footer>

    <script type="module" src="./index.js"></script>
</body>

</html>