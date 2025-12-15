<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Espectáculo</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/eliminar_espectaculo.css'); ?>">
</head>

<body>
<main class="confirmacion-container">
    <div class="confirmacion-card peligro">
        <h1>Eliminar espectáculo</h1>
        <p>El espectáculo será eliminado de forma permanente.</p>

        <div class="acciones">
            <a href="<?= site_url('admin/eliminar_espectaculo'); ?>" class="btn confirmar">Eliminar</a>
            <a href="<?= current_url(); ?>" class="btn cancelar">Cancelar</a>
        </div>
    </div>
</main>
</body>
</html>
