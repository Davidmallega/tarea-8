<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Asistencia de Docentes</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="fondo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
</head>
<body>
    <div class="container-reporte">
    <div class="logo-container">
        <img src="img/logo.png" alt="Logo de la empresa">
        </div>
        <h1>Reporte de Asistencia de Docentes</h1>
        <?php include_once 'controlador_reportes_docentes.php'; ?>
        <?php include_once 'controlador_tabla_reportes.php'; ?> <br>
        <button onclick="location.href='index_menu_principal.php'">Volver al inicio </button> 
        <button onclick="location.href='vista_registro_asistencias.php'">Volver a Asistencias </button>
        <button id="print-report">Imprimir Reporte</button><br>
    </div>
        <script src="vista_controlador_reportes.js"></script>
        <script src="vista_controlador_pdf.js"></script>
</body>
</html>


