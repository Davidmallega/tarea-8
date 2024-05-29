document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed for PDF');
    const printButton = document.getElementById('print-report');
    if (printButton) {
        console.log('Print button found');
        printButton.addEventListener('click', function() {
            console.log('Print button clicked');
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.setFontSize(12); // Ajustar el tamaño de la tipografía
            doc.text('Reporte de Asistencia de Docentes', 10, 10);

            // Obtener datos de la tabla
            const table = document.getElementById('tablaReportes');
            const rows = table.querySelectorAll('tr');

            const data = [];
            const headers = [];
            rows.forEach((row, rowIndex) => {
                const cells = row.querySelectorAll('td, th');
                const rowData = [];
                cells.forEach((cell, cellIndex) => {
                    if (rowIndex === 0) {
                        // Excluir las columnas de foto y acciones
                        if (cellIndex !== 0 && cellIndex !== cells.length - 1) {
                            headers.push(cell.innerText);
                        }
                    } else {
                        // Excluir las columnas de foto y acciones
                        if (cellIndex !== 0 && cellIndex !== cells.length - 1) {
                            rowData.push(cell.innerText);
                        }
                    }
                });
                if (rowIndex > 0) {
                    data.push(rowData);
                }
            });

            doc.autoTable({
                head: [headers],
                body: data,
                margin: { top: 20 },
                theme: 'striped'
            });

            // Guardar el PDF
            doc.save('reporte_asistencia_docentes.pdf');
        });
    } else {
        console.log('Print button not found');
    }
});

