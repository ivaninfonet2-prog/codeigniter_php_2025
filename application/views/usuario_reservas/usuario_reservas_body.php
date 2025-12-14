<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/usuario_reservas/usuario_reservas_body.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="contenido">
        <h1 class="titulo">  Mis Reservas de Espectáculos</h1>

        <?php if (!empty($reservas)): ?>
            <table class="tabla-reservas">
                <thead>
                    <tr>
                        <th>ID Reserva</th>
                        <th>Espectáculo</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva): ?>
                        <tr>
                            <td><?= $reserva['id_reserva']; ?></td>
                            <td><?= $reserva['nombre_espectaculo']; ?></td>
                            <td><?= $reserva['fecha_espectaculo']; ?></td>
                            <td><?= $reserva['cantidad']; ?></td>
                            <td class="total">$<?= number_format($reserva['monto_total'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="<?= base_url('usuario/usuario_reservas_detalle/'.$reserva['id_reserva']); ?>" class="boton-detalle">Ver detalles</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-reservas">No tienes reservas actualmente.</p>
        <?php endif; ?>
       
    </main>

</body>
</html>
