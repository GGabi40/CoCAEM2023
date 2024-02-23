/* formulario */
const form = document.querySelector('.formulario-inscripcion');
const miembroRadio = document.querySelector('input[name="memberFaces"]');
const nombreSociedad = document.querySelector('.member-sociedad');

document.addEventListener('DOMContentLoaded', function () {
    const attentionSpan = document.getElementById('attention');
    const presentaTrabajoRadio = document.querySelector('input[name="presenta_trabajo"]');

    /* Sociedades */
    const espaciodeSociedades = document.querySelector('.input--sociedad');
    espaciodeSociedades.style.display = "none";

    /* Datos Trabajo Científico */
    const datosTrabajoCientifico = document.querySelector('.datos-trabajo');
    datosTrabajoCientifico.style.display = "none";

    form.addEventListener('change', () => {
        // Habilita span de Trabajo Científico
        if (presentaTrabajoRadio.checked) {
            attentionSpan.style.display = 'block';
            datosTrabajoCientifico.style.display = "block";
        } else {
            attentionSpan.style.display = 'none';
            datosTrabajoCientifico.style.display = "none";
        }

        // Habilita select member
        if (miembroRadio.checked) {
            espaciodeSociedades.style.display = "block";
        } else {
            espaciodeSociedades.style.display = "none";
            nombreSociedad.value = "";
        }
    });
});
