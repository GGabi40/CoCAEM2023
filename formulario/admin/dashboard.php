<?php

include('./protect.php');
include('./monitor.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control | CoCAEM 2023</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./src/css/style_dashboard.css">
    <link rel="website icon" href="./src/img/icon_panel.png">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>

<body>
    <!-- Menu Mobile -->
    <div class="toggle">
        <button id="hit">
            <svg viewBox="0 0 100 80" width="40" height="40">
                <rect width="100" height="20"></rect>
                <rect y="30" width="100" height="20"></rect>
                <rect y="60" width="100" height="20"></rect>
            </svg>
        </button>
    </div>

    <!-- Menu WEB -->
    <header class="header" id="header">
        <!-- Top Header -->
        <div class="top">
            <div class="img-foto">
                <img src="./src/img/Foto perfil cocaem.png" alt="Foto de Perfil CoCAEM">
            </div>
            <h1>¡Bienvenido Admin!</h1>
            <a href="./logic/logout.php">Cerrar sesión</a>

            <nav id="nav">
                <ul>
                    <li><a href="#home" id="top-link">Home <i class="fa fa-home"></i></a></li>
                    <li><a href="#inscriptos" id="inscriptos-link">Inscriptos <i class="fa fa-users"></i></a></li>
                    <li><a href="#panelCientifico" id="panelCientifico-link">Panel Científico <i class="fa fa-user-md"></i></li>
                    <li><a href="#qr" id="qr-link">Lector QR <i class="fa fa-mobile"></i></a></li>
                </ul>
            </nav>
        </div>

        <div class="bottom">
            <span id="desenvolvedBy">Desenvolved by <a href="https://instagram.com/ggabi40" target="_blank" style="color: white; padding: 0">GGabi40</a>.</span>
        </div>

    </header>


    <section class="container all-numbers">
        <div id="home" class="contain-home">
            <h2><i class="fa fa-home"></i> Home</h2>

            <div class="numero-inscriptos-total caja">
                <p class="numero-inscripto-texto">Número de Inscriptos (total):</p>
                <span class="numero">
                    <?php echo $sumaTotal; ?>
                </span>
            </div>

            <div class="contain-numero">
                <div class="num-inscriptos caja">
                    <p class="numero-inscripto-texto">Número de Inscriptos:</p>
                    <span class="numero">
                        <?php echo $total_usuarios; ?>
                    </span>
                    <span style="font-size:1rem">No presentan Trabajo Científico</span>
                </div>
                <div class="num-paneles-cientificos caja">
                    <p class="numero-inscripto-texto">Número de Expositores:</p>
                    <span class="numero">
                        <?php echo $total_presentadores; ?>
                    </span>
                    <span style="font-size:1rem">Presentan Trabajo Científico</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container all-inscriptos">
        <div id="inscriptos">
            <h2><i class="fa fa-users"></i> Inscriptos (<?php echo $total_usuarios; ?>)</h2>

            <article class="contain-filtro-tabla">

                <div class="container-inscriptos">
                    <label for="buscar">Buscar:
                        <input type="text" name="buscar" id="buscar" placeholder="Apellido o DNI">
                    </label>
                    
                    <div class="filtro">
                        <!-- <label for="filtro">Filtrar:
                            <select name="filtro" id="filtro">
                                <option value="">¿Qué desea que se muestre?</option>
                                <option value="todos">Todos</option>
                                <option value="pagado">Pagado</option>
                                <option value="no-pago">No Pagado</option>
                            </select>
                        </label> -->
                        <button id="download-lista-inscriptos"><i class="fa fa-download"></i> Descargar Excel</button>
                    </div>
                    

                    <div class="tabla-inscriptos tabla-centralizada">
                        <div class="table-container">
                            <p style="font-size: 1.2rem;">Lista de inscriptos que <strong>NO</strong> presentan Trabajo Científico.</p>
                            <p style="font-size: 1.2rem;"><strong><?php echo $total_sociedad ?></strong> son miembros de alguna Sociedad.</p>
                            <table class="table-inscriptos" id="tableInscriptos">
                                <thead id="tablaInscriptos">
                                    <tr>
                                        <th>Acreditación</th>
                                        <th>ID</th>
                                        <th>Fecha de Registro</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>DNI</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Sociedad</th>
                                        <th>Método de Pago</th>
                                        <th>QR</th>
                                    </tr>
                                </thead>
    
                                <?php
                                $sql_inscriptos = "SELECT * FROM usuarios";
                                $result_inscriptos = mysqli_query($conexion, $sql_inscriptos);
    
                                while ($inscrito = mysqli_fetch_assoc($result_inscriptos)) {
                                ?>
                                    <tr>
                                        <td class="acredito"><?php echo $inscrito['acredito']; ?></td>
                                        <td><?php echo $inscrito['id']; ?></td>
                                        <td><?php echo $inscrito['fecha_reg']; ?></td>
                                        <td><?php echo $inscrito['nombre']; ?></td>
                                        <td><?php echo $inscrito['apellidos']; ?></td>
                                        <td><?php echo $inscrito['dni']; ?></td>
                                        <td><?php echo $inscrito['telefono']; ?></td>
                                        <td><?php echo $inscrito['email']; ?></td>
                                        <td><?php echo $inscrito['sociedad_member']; ?></td>
                                        <td><?php echo $inscrito['cuota_completo']; ?></td>
                                        <td><?php echo $inscrito['qr']; ?></td>
                                    </tr>
                                <?php
                                }
    
                                mysqli_free_result($result_inscriptos);
                                ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </article>

        </div>
    </section>

    <section class="container all-paneles">
        <div id="panelCientifico">
            <h2><i class="fa fa-user-md"></i> Panel Científico (<?php echo $total_presentadores; ?>)</h2>

            <article class="contain-filtro-tabla">

                <div class="container-inscriptos">
                    <label for="buscar">Buscar:
                        <input type="text" name="buscar" id="buscarPanel" placeholder="Apellido o DNI">
                    </label>
                    
                    <div class="filtro">
                        <button id="download-lista-paneles"><i class="fa fa-download"></i> Descargar Excel</button>
                    </div>
                    

                    <div class="tabla-inscriptos tabla-centralizada">
                        <div class="table-container">
                            <p style="font-size: 1.4rem;">Lista de inscriptos que <strong>PRESENTAN</strong> Trabajo Científico.</p>
                            <p style="font-size: 1.2rem;"><strong><?php echo ($total_sociedad_expositor > 1) ? $total_sociedad_expositor : '0' ?></strong> son miembros de alguna Sociedad.</p>
                            <table class="table-paneles" id="panelTable">
                                <thead id="tablaPaneles">
                                    <tr>
                                        <th>Acreditación</th>
                                        <th>ID</th>
                                        <th>Fecha de Registro</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>DNI</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Título de Trabajo</th>
                                        <th>Asesores de Trabajo</th>
                                        <th>Autores de Trabajo</th>
                                        <th>Sociedad</th>
                                        <th>Método de Pago</th>
                                        <th>QR</th>
                                    </tr>
                                </thead>
    
                                <?php
                                $sql_panel = "SELECT * FROM panel_cientifico";
                                $result_paneles = mysqli_query($conexion, $sql_panel);
    
                                while ($inscritoPanel = mysqli_fetch_assoc($result_paneles)) {
                                ?>
                                    <tr>
                                        <td><?php echo $inscritoPanel['acredito']; ?></td>
                                        <td><?php echo $inscritoPanel['id']; ?></td>
                                        <td><?php echo $inscritoPanel['fecha_reg']; ?></td>
                                        <td><?php echo $inscritoPanel['nombre']; ?></td>
                                        <td><?php echo $inscritoPanel['apellidos']; ?></td>
                                        <td><?php echo $inscritoPanel['dni']; ?></td>
                                        <td><?php echo $inscritoPanel['telefono']; ?></td>
                                        <td><?php echo $inscritoPanel['email']; ?></td>
                                        <td><?php echo $inscritoPanel['titulo_trabajo']; ?></td>
                                        <td><?php echo $inscritoPanel['asesores_trabajo']; ?></td>
                                        <td><?php echo $inscritoPanel['autores_trabajo']; ?></td>
                                        <td><?php echo $inscritoPanel['sociedad_member']; ?></td>
                                        <td><?php echo $inscritoPanel['cuota_completo']; ?></td>
                                        <td><?php echo $inscritoPanel['qr']; ?></td>
                                    </tr>
                                <?php
                                }
    
                                mysqli_free_result($result_paneles);
                                ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </article>

        </div>
    </section>

    <section id="qr" class="container" style="background-color: transparent">
        <video id="previsualizacion"></video>
        <div id="camera"></div>
    </section>


    <script type="module" src="./src/js/index.js"></script>
    <script type="module" src="./src/js/numeroInscriptos.js"></script>
    <script type="module" src="./src/js/filtertable.js"></script>
    <script type="module" src="./src/js/filtertablePanel.js"></script>
    <script type="module" src="./src/js/descargaExcel.js"></script>
    <script type="module" src="./src/js/cameraDOS.js"></script>
</body>

</html>