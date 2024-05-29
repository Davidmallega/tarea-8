<?php
function obtener_reportes_docentes($conn) {
    $sql = "SELECT a.id, a.Fecha, a.hora_de_entrada, a.hora_de_salida, d.nombre, d.apellido, d.rut, d.foto 
            FROM asistencia a
            JOIN docentes d ON a.rut = d.rut";
    $result = $conn->query($sql);

    $reportes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reportes[] = $row;
        }
    }
    return $reportes;
}
?>

