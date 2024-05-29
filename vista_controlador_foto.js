function actualizarFotoYAsignatura() {
    var select = document.getElementById('rut');
    var foto = select.options[select.selectedIndex].getAttribute('data-foto');
    var asignatura = select.options[select.selectedIndex].getAttribute('data-asignatura');
    var fotoDocente = document.getElementById('foto-docente');
    var leyendaDocente = document.getElementById('leyenda-docente');

    if (foto) {
        fotoDocente.src = foto;
        fotoDocente.style.display = 'block';
        leyendaDocente.textContent = "Asignatura: " + asignatura;
        leyendaDocente.style.display = 'inline';  // Muestra la leyenda
    } else {
        fotoDocente.style.display = 'none';
        leyendaDocente.style.display = 'none';  // Oculta la leyenda
    }
}