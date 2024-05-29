document.addEventListener('DOMContentLoaded', function() {
    const editarBtns = document.querySelectorAll('.editar-btn');
    const eliminarBtns = document.querySelectorAll('.eliminar-btn');

    // Evento para editar una asistencia
    editarBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = btn.getAttribute('data-id');
            editarAsistencia(id);
        });
    });

    // Evento para eliminar una asistencia
    eliminarBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = btn.getAttribute('data-id');
            eliminarAsistencia(id);
        });
    });

    function editarAsistencia(id) {
        const nuevaHoraEntrada = prompt("Ingrese la nueva hora de entrada (HH:MM:SS):");
        const nuevaHoraSalida = prompt("Ingrese la nueva hora de salida (HH:MM:SS):");

        if (nuevaHoraEntrada && nuevaHoraSalida) {
            fetch(`controlador_editar_asistencia.php?id=${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ hora_de_entrada: nuevaHoraEntrada, hora_de_salida: nuevaHoraSalida })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Asistencia actualizada correctamente");
                    location.reload();
                } else {
                    alert("Error al actualizar la asistencia: " + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function eliminarAsistencia(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta asistencia?")) {
            fetch(`controlador_eliminar_asistencia.php?id=${id}`, {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Asistencia eliminada correctamente");
                    location.reload();
                } else {
                    alert("Error al eliminar la asistencia: " + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
});


