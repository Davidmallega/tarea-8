<?php
function registrar_asistencia($conn, $rut, $fecha, $hora_entrada, $hora_salida) {
    $sql = "INSERT INTO asistencia (Fecha, hora_de_entrada, hora_de_salida, rut)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fecha, $hora_entrada, $hora_salida, $rut);
    return $stmt->execute();
}
?>

