export default function maps() {
    // Inicializa el mapa
    var map = L.map('map').setView([-32.945451, -60.661824], 15);

    // Agrega una capa de mapas base
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Define las ubicaciones de las referencias
    var referencias = [
        { nombre: 'Facultad de Ciencias Médicas', latitud: -32.93990556, longitud: -60.6650722, zoom: 15 },
        { nombre: 'Vía Vieja and Mercado del Patio', latitud: -32.940147, longitud: -60.667772, zoom: 15 },
        { nombre: 'Terminal de Omnibus "Mariano Moreno"', latitud: -32.9394, longitud: -60.6714, zoom: 17 },
        { nombre: 'Esquina de Córdoba y Av. Francia', latitud: -32.941449, longitud: -60.665640, zoom: 17 },
        { nombre: 'Hospital PÚBLICO del Centenario', latitud: -32.938040, longitud: -60.664917, zoom: 17 },
        { nombre: 'Sanatorio PARQUE', latitud: -32.943661, longitud: -60.653784, zoom: 17 },
        { nombre: 'Sanatorio de la Mujer', latitud: -32.945660, longitud: -60.657832, zoom: 17 },
    ];

    // Agrega marcadores para cada referencia
    referencias.forEach(function (referencia) {
        L.marker([referencia.latitud, referencia.longitud]).addTo(map)
            .bindPopup(referencia.nombre)
            .openPopup()
            .on('click', function (e) {
                map.setView([referencia.latitud, referencia.longitud], referencia.zoom);
            });
    });
}