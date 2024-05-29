<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Docentes</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="fondo.css">
    <link rel="stylesheet" href="mensajes.css">
</head>
<body>
    <div class="container-registro">
        <div class="logo-container">
            <img src="img/logo.png" alt="Logo de la empresa">
        </div>
        <h1>Registro de Docentes</h1>
        <div id="message" class="message 
            <?php echo isset($_GET['messageClass']) ? htmlspecialchars($_GET['messageClass']) : ''; ?>">
            <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : ''; ?>
        </div>
        <form action="controlador_registro_docentes.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" required>

            <label for="asignatura">Asignatura:</label>
            <input type="text" id="asignatura" name="asignatura" required>
            
            <label for="foto">Foto del docente:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
            
            <input type="submit" value="Registrar">
            <br>
            <button type="button" onclick="location.
                href='index_menu_principal.php'">Volver al inicio</button><br>
        </form>
    </div>
    <script src="vista_mensajes_registro_docentes.js"></script>
</body>
</html>
