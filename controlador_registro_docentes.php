<?php
include_once 'conexion_maria_auxiliadora.php';
include_once 'modelo_registro_docentes.php';

$message = '';
$messageClass = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos 
    $conn = $GLOBALS['conn'];
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $asignatura = $_POST['asignatura'];
    // Manejar la subida del archivo
    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fotoTmpPath = $_FILES['foto']['tmp_name'];
        $fotoName = $_FILES['foto']['name'];
        $fotoSize = $_FILES['foto']['size'];
        $fotoType = $_FILES['foto']['type'];
        $fotoNameCmps = explode(".", $fotoName);
        $fotoExtension = strtolower(end($fotoNameCmps));
        $newFotoName = md5(time() . $fotoName) . '.' . $fotoExtension;
        $uploadDir = './uploads/';
        $dest_path = $uploadDir . $newFotoName;

        if(move_uploaded_file($fotoTmpPath, $dest_path)) {
            $foto = $dest_path;
        } else {
            $message = "Error al subir la foto.";
            $messageClass = "error";
            header("Location: vista_registro_docentes.php?message=" .
            urlencode($message) . "&messageClass=" . urlencode($messageClass));
            exit();
        }
    }
    // Registrar docente
    try {
        $resultado = registrar_docente($conn, $nombre, $apellido, $rut, $asignatura, $foto);
        if ($resultado) {
            $message = "Registro exitoso.";
            $messageClass = "success";
        } else {
            $message = "Error al registrar el docente.";
            $messageClass = "error";
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // Código de error para entrada duplicada 
            $message = "No se puede registrar dos personas con el mismo RUT.";
            $messageClass = "error";
        } else {
            $message = "Error al registrar el docente: " . $e->getMessage();
            $messageClass = "error";
        }
    }
    // Redirigir con mensaje
    header("Location: vista_registro_docentes.php?message=" . urlencode($message) . 
    "&messageClass=" . urlencode($messageClass));
    exit();
}
?>




