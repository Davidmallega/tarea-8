<?php
include_once 'conexion_maria_auxiliadora.php';
include_once 'modelo_consulta_reportes_docentes.php';

$reportes = obtener_reportes_docentes($conn);


?>

