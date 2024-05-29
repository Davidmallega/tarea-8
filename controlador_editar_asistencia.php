<?php
include_once 'conexion_maria_auxiliadora.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents('php://input'), true);

    if ($id && isset($data['hora_de_entrada']) && isset($data['hora_de_salida'])) {
        $sql = "UPDATE asistencia SET hora_de_entrada = ?, hora_de_salida = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            error_log('Prepare failed: ' . $conn->error);
            echo json_encode(['success' => false, 'error' => $conn->error]);
            exit;
        }

        $stmt->bind_param("ssi", $data['hora_de_entrada'], $data['hora_de_salida'], $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            error_log('Execute failed: ' . $stmt->error);
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Datos no proporcionados o incompletos']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}

$conn->close();
?>


