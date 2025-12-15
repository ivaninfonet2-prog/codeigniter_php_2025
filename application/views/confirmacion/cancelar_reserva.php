<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cancelar Reserva</title>
   
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/cancelar_reserva.css'); ?>">
</head>

<body>
<main class="confirmacion-container">
    <div class="confirmacion-card">
        <h1>Cancelar reserva</h1>
        <p>Esta acción no se puede deshacer. ¿Deseás continuar?</p>

        <div class="acciones">
            <a href="<?= site_url('reservar/confirmar_cancelacion'); ?>" class="btn confirmar">Sí, cancelar</a>
            <a href="<?= current_url(); ?>" class="btn cancelar">Volver</a>
        </div>
    </div>
</main>
</body>
</html>
