<?php
function registrar_docente($conn, $nombre, $apellido, $rut, $asignatura, $foto) {
    $query = "INSERT INTO docentes (nombre, apellido, rut, asignatura, foto) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        throw new mysqli_sql_exception("Falló la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("sssss", $nombre, $apellido, $rut, $asignatura, $foto);
    
    if (!$stmt->execute()) {
        throw new mysqli_sql_exception($stmt->error, $stmt->errno);
    }

    $stmt->close();
    return true;
}
?>
