<?php
include_once 'conexion_maria_auxiliadora.php';
include_once 'modelo_consulta_docentes.php';

$docentes = obtener_docentes($conn);

foreach ($docentes as $docente) {
    echo "<option value='" . htmlspecialchars($docente['rut']) . "' data-foto='" . 
    htmlspecialchars($docente['foto']) . "' data-asignatura='" . 
    htmlspecialchars($docente['asignatura']) . "'>" . htmlspecialchars($docente['nombre']) . " " . 
    htmlspecialchars($docente['apellido']) . "</option>";
}
?>


