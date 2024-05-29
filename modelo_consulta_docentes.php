<?php
function obtener_docentes($conn) {
    $sql = "SELECT id, nombre, apellido, rut, asignatura, foto FROM docentes ORDER BY nombre, apellido";
    $result = $conn->query($sql);
    
    $docentes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $docentes[] = $row;
        }
    }
    return $docentes;
}
?>


