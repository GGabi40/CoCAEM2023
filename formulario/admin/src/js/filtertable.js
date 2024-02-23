const inputFiltrarInscriptos = document.getElementById('buscar');
const tablaInscriptos = document.querySelector('.table-inscriptos');

inputFiltrarInscriptos.addEventListener('keyup', buscarInscripto);

function buscarInscripto() {
    const searchText = inputFiltrarInscriptos.value.toLowerCase();
    const rows = tablaInscriptos.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        let found = false;

        cells.forEach(cell => {
            const cellText = cell.textContent.toLowerCase();
            if (cellText.includes(searchText)) {
                found = true;
            }
        });

        if (found) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}