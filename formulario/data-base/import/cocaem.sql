CREATE TABLE panel_cientifico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_reg DATE,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    dni VARCHAR(255),
    telefono VARCHAR(255),
    email VARCHAR(255),
    presenta_trabajo VARCHAR(255),
    titulo_trabajo VARCHAR(255),
    autores_trabajo VARCHAR(255),
    asesores_trabajo VARCHAR(255),
    sociedad_member VARCHAR(255),
    cuota_completo VARCHAR(255),
    qr VARCHAR(255)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_reg DATE,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    dni VARCHAR(255),
    telefono VARCHAR(255),
    email VARCHAR(255),
    presenta_trabajo VARCHAR(255),
    sociedad_member VARCHAR(255),
    cuota_completo VARCHAR(255),
    qr VARCHAR(255)
);
