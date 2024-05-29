<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asistencias</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="fondo.css">
    <link rel="stylesheet" href="mensajes.css"> 
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="img/logo.png" alt="Logo de la empresa">
        </div>
        <h1>Registro de Asistencias de Docentes</h1>
        <div id="message" class="message <?php echo isset($_GET['messageClass']) ? htmlspecialchars($_GET['messageClass']) : ''; ?>">
            <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : ''; ?>
        </div>
        <form action="controlador_registro_asistencias.php" method="post">
            <label for="rut">Seleccionar Docente:</label>
            <select name="rut" id="rut" required onchange="actualizarFotoYAsignatura()">
                <option value="">Seleccionar Docente</option>
                <?php include 'controlador_consulta_docentes.php'; ?>
            </select>
            <div id="foto-leyenda-container" class="foto-leyenda-container">
                <img id="foto-docente" src="" alt="Foto del docente" style="display: none; width: 80px; height: 100px; border-radius: 20px;">
                <span id="leyenda-docente" class="leyenda-docente" style="display: none;">Asignatura: </span>
            </div>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <label for="hora_entrada">Hora de Entrada:</label>
            <input type="time" id="hora_entrada" name="hora_entrada" required>
            <label for="hora_salida">Hora de Salida:</label>
            <input type="time" id="hora_salida" name="hora_salida" required>
            <input type="submit" class="btn-registrar" value="Registrar Asistencia">
            <button type="button" class="btn-reportes" onclick="location.href='vista_reportes_docentes.php'">Reportes</button>
            <button type="button" class="btn-volver" onclick="location.href='index_menu_principal.php'">Volver al inicio</button>
        </form>
    </div>
    
    <script src="vista_mensajes_registro_docentes.js"></script>
    <script src="vista_controlador_foto.js"></script>
    
</body>
</html>

