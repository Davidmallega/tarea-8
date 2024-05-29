<?php
include_once 'conexion_maria_auxiliadora.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];

    if ($id) {
        $sql = "DELETE FROM asistencia WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            error_log('Prepare failed: ' . $conn->error);
            echo json_encode(['success' => false, 'error' => $conn->error]);
            exit;
        }

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            error_log('Execute failed: ' . $stmt->error);
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'ID no proporcionado']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}

$conn->close();
?>



