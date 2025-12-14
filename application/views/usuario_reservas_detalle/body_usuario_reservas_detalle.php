<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>
    <link rel="stylesheet" href="<?php echo base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
    <!-- Nuevo CSS para el aviso -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/usuario_reservas_detalle/aviso_usuario_reservas_detalle.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="contenido">
        <h1 class="titulo">Detalle de la Reserva #<?= $reserva['id_reserva']; ?></h1>

        <div class="detalle-card">
            <p><strong>Espectáculo:</strong> <?= $reserva['nombre_espectaculo']; ?></p>
            <p><strong>Fecha del espectáculo:</strong> <?= $reserva['fecha_espectaculo']; ?></p>
            <p><strong>Cantidad de entradas:</strong> <?= $reserva['cantidad']; ?></p>
            <p><strong>Precio unitario:</strong> $<?= number_format($reserva['precio'], 2, ',', '.'); ?></p>
            <p><strong>Total:</strong> $<?= number_format($reserva['monto_total'], 2, ',', '.'); ?></p>
            <p><strong>Fecha de reserva:</strong> <?= $reserva['fecha_reserva']; ?></p>
            <p><strong>Entradas disponibles actualmente:</strong> <?= $reserva['disponibles']; ?></p>
        </div>

        <?php if ($this->session->flashdata('mensaje_cancelacion')): ?>
            <div class="detalle-card aviso-cancelacion">
                <?= $this->session->flashdata('mensaje_cancelacion'); ?>
            </div>
        <?php else: ?>
            <div class="boton-container">
                <!-- Botón que abre el aviso -->
                <a href="#aviso-cancelacion" class="boton">Cancelar Reserva</a>
            </div>
        <?php endif; ?>
    </main>

    <!-- Aviso de confirmación en HTML -->
    <div id="aviso-cancelacion" class="overlay">
        <div class="popup">
            <h2>Confirmar Cancelación</h2>
            <p>¿Está seguro de que desea cancelar la reserva?</p>
            <div class="acciones">
                <a href="<?= base_url('reservar/cancelar_reserva/'.$reserva['id_reserva']); ?>" class="boton confirmar">Sí, cancelar</a>
                <a href="#" class="boton volver">No, volver</a>
            </div>
        </div>
    </div>

</body>
</html>
