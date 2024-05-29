<?php
include_once 'conexion_maria_auxiliadora.php';
include_once 'modelo_consulta_reportes_docentes.php';

$reportes = obtener_reportes_docentes($conn);

if (count($reportes) > 0): ?>
    <table id="tablaReportes" border="1">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>RUT</th>
                <th>Fecha</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportes as $reporte): ?>
                <tr>
                <td><img class="foto-docente" src="<?php echo htmlspecialchars($reporte['foto']); 
                ?>" alt="Foto de <?php echo htmlspecialchars($reporte['nombre']); 
                ?>" width="80" height="100"></td>
                <td><?php echo $reporte['nombre']; ?></td>
                <td><?php echo $reporte['apellido']; ?></td>
                <td><?php echo $reporte['rut']; ?></td>
                <td><?php echo $reporte['Fecha']; ?></td>
                <td><?php echo $reporte['hora_de_entrada']; ?></td>
                <td><?php echo $reporte['hora_de_salida']; ?></td>
                <td>
                        <button class="editar-btn" data-id="<?php echo $reporte['id']; ?>">Editar</button>
                        <button class="eliminar-btn" data-id="<?php echo $reporte['id']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron registros de asistencia.</p>
<?php endif; ?>

