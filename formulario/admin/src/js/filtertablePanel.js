const inputFiltrarPaneles = document.querySelector('#buscarPanel');
const tablaPaneles = document.querySelector('.table-paneles');

inputFiltrarPaneles.addEventListener('keyup', buscarPaneles);

function buscarPaneles() {
    const searchText = inputFiltrarPaneles.value.toLowerCase();
    const rows = tablaPaneles.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        let found = false;

        cells.forEach(cell => {
            const cellText = cell.textContent.toLowerCase();
            if(cellText.includes(searchText)) {
                found = true;
            }
        });

        if(found) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    })
}