document.getElementById('download-lista-inscriptos').addEventListener('click', function() {
    const table = document.querySelector('#tableInscriptos');

    /* Crea un objeto WorkBook de SheetJS */
    const wb = XLSX.utils.table_to_book(table);

    XLSX.writeFile(wb, "Tabla-Inscriptos.xlsx");

})

document.getElementById('download-lista-paneles').addEventListener('click', function() {
    const tablePanel = document.querySelector('#panelTable');

    /* Crea un objeto WorkBook de SheetJS */
    const wbT = XLSX.utils.table_to_book(tablePanel);

    XLSX.writeFile(wbT, "Tabla-Paneles.xlsx");

})