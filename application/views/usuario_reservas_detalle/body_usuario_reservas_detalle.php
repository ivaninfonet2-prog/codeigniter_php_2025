<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>

    <!-- CSS ÚNICO necesario -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
</head>

<?php
$mensaje = $this->session->flashdata('mensaje');

$precio_unitario = number_format($reserva['precio'], 2, ',', '.');
$total_abonado   = number_format($reserva['monto_total'], 2, ',', '.');
?>

<body style="background-image: url('<?= $fondo; ?>');">

<main class="contenido">

    <!-- ENCABEZADO -->
    <section class="intro">
        <h1 class="titulo">Detalle de la Reserva</h1>
        <p class="subtitulo">
            Reserva Nº <?= $reserva['id_reserva']; ?> · Revisá toda la información
        </p>
    </section>

    <!-- CONTENEDOR -->
    <section class="detalle-wrapper">

        <!-- DETALLE -->
        <div class="detalle-card">

            <div class="fila">
                <span>Espectáculo</span>
                <strong><?= $reserva['nombre_espectaculo']; ?></strong>
            </div>

            <div class="fila">
                <span>Fecha del espectáculo</span>
                <strong><?= $reserva['fecha_espectaculo']; ?></strong>
            </div>

            <div class="fila">
                <span>Cantidad de entradas</span>
                <strong><?= $reserva['cantidad']; ?></strong>
            </div>

            <div class="fila">
                <span>Precio unitario</span>
                <strong>$<?= $precio_unitario; ?></strong>
            </div>

            <div class="total">
                Total abonado: $<?= $total_abonado; ?>
            </div>

            <div class="fila">
                <span>Fecha de reserva</span>
                <strong><?= $reserva['fecha_reserva']; ?></strong>
            </div>

            <div class="fila">
                <span>Entradas disponibles</span>
                <strong><?= $reserva['disponibles']; ?></strong>
            </div>

        </div>

        <!-- MENSAJE O ACCIONES -->
        <?php if ($mensaje): ?>

            <div class="aviso-cancelacion">
                <?= $mensaje; ?>
            </div>

        <?php else: ?>

            <div class="acciones">
                <a href="<?= site_url('confirmacion/cancelar_reserva/' . $reserva['id_reserva']); ?>"
                   class="boton cancelar">
                    Cancelar reserva
                </a>

                <a href="<?= site_url('usuario/usuario_reservas'); ?>"
                   class="boton volver">
                    Volver a reservas
                </a>
            </div>

        <?php endif; ?>

    </section>

</main>

</body>
</html>
