<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cancelar Reserva</title>

    <link rel="stylesheet"
          href="<?= base_url('activos/css/confirmacion/cancelar_reserva.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

<main class="confirmacion-container">

    <div class="confirmacion-card">

        <h1>Cancelar reserva</h1>

        <p>
            Esta acción no se puede deshacer.
            ¿Deseás continuar?
        </p>

        <div class="acciones">

            <!-- CONFIRMA: ejecuta la cancelación real -->
            <a href="<?= site_url('reservar/cancelar_reserva/'.$id_reserva); ?>"
               class="btn confirmar">
                Sí, cancelar
            </a>

            <!--  CANCELA: vuelve al detalle -->
            <a href="<?= site_url('usuario/usuario_reservas_detalle/'.$id_reserva); ?>"
               class="btn cancelar">
                Volver
            </a>

        </div>

    </div>

</main>

</body>
</html>
