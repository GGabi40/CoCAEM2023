document.addEventListener('DOMContentLoaded', function() {
    // Obtener los elementos HTML que contienen los números
    const numeroTotalInscriptos = document.querySelector('.numero-inscriptos-total .numero');
    const numeroInscriptos = document.querySelector('.num-inscriptos .numero');
    const numeroPaneles = document.querySelector('.num-paneles-cientificos .numero');

    // Obtener los valores de los números desde los elementos PHP
    const totalInscriptos = parseInt(numeroTotalInscriptos.innerText);
    const inscriptos = parseInt(numeroInscriptos.innerText);
    const paneles = parseInt(numeroPaneles.innerText);

    // Insertar los valores en los spans ".numero"
    numeroTotalInscriptos.innerText = totalInscriptos;
    numeroInscriptos.innerText = inscriptos;
    numeroPaneles.innerText = paneles;
});
