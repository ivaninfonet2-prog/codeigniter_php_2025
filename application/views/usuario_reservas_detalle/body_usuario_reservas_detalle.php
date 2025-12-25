<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>

    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/aviso_usuario_reservas_detalle.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="contenido">

        <!-- BLOQUE SUPERIOR -->
        <section class="intro">
            <h1 class="titulo">Detalle de la Reserva</h1>
            <p class="subtitulo">
                Reserva Nº <?= $reserva['id_reserva']; ?> · Revisá toda la información
            </p>
        </section>

        <!-- CONTENEDOR CENTRAL -->
        <section class="detalle-wrapper">

            <!-- TARJETA DETALLE -->
            <div class="detalle-card">
                <p><span>Espectáculo:</span> <?= $reserva['nombre_espectaculo']; ?></p>
                <p><span>Fecha del espectáculo:</span> <?= $reserva['fecha_espectaculo']; ?></p>
                <p><span>Cantidad de entradas:</span> <?= $reserva['cantidad']; ?></p>
                <p><span>Precio unitario:</span> $<?= number_format($reserva['precio'], 2, ',', '.'); ?></p>

                <p class="total">
                    <span>Total abonado:</span>
                    $<?= number_format($reserva['monto_total'], 2, ',', '.'); ?>
                </p>

                <p><span>Fecha de reserva:</span> <?= $reserva['fecha_reserva']; ?></p>
                <p><span>Entradas disponibles:</span> <?= $reserva['disponibles']; ?></p>
            </div>

            <!-- ACCIONES -->
            <?php if ($this->session->flashdata('mensaje_cancelacion')): ?>
                <div class="detalle-card aviso-cancelacion">
                    <?= $this->session->flashdata('mensaje_cancelacion'); ?>
                </div>
            <?php else: ?>
                <div class="acciones">
                    <a href="#aviso-cancelacion" class="boton cancelar">
                        Cancelar reserva
                    </a>

                    <a href="<?= site_url('usuario/usuario_reservas') ?>" class="boton volver">
                        Volver a reservas
                    </a>
                </div>
            <?php endif; ?>

        </section>

    </main>

    <!-- POPUP -->
    <div id="aviso-cancelacion" class="overlay">
        <div class="popup">
            <h2>Confirmar cancelación</h2>
            <p>¿Deseás cancelar esta reserva? Esta acción no se puede deshacer.</p>

            <div class="acciones-popup">
                <a href="<?= base_url('reservar/cancelar_reserva/'.$reserva['id_reserva']); ?>" class="boton confirmar">
                    Sí, cancelar
                </a>
                <a href="#" class="boton volver">
                    No, volver
                </a>
            </div>
        </div>
    </div>

</body>
</html>
