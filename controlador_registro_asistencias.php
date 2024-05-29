<?php
include_once 'conexion_maria_auxiliadora.php';
include_once 'modelo_registro_asistencias.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rut = $_POST['rut'];
    $fecha = $_POST['fecha'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_salida = $_POST['hora_salida'];

    $resultado = registrar_asistencia($conn, $rut, $fecha, $hora_entrada, $hora_salida);
    if ($resultado) {
        $message = "Asistencia registrada correctamente.";
        $messageClass = "success";
    } else {
        $message = "Error al registrar la asistencia.";
        $messageClass = "error";
    }
    header("Location: vista_registro_asistencias.php?message=" . urlencode($message) . "&messageClass=" . urlencode($messageClass));
    exit();
}
?>


