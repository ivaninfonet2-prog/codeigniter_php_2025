<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
   
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/eliminar_usuario.css'); ?>">
</head>

<body>
<main class="confirmacion-container">
    <div class="confirmacion-card peligro">
        <h1>Eliminar cuenta</h1>
        <p>Esta acción eliminará tu cuenta de forma permanente.</p>

        <div class="acciones">
            <a href="<?= site_url('usuario/eliminar'); ?>" class="btn confirmar">Eliminar</a>
            <a href="<?= current_url(); ?>" class="btn cancelar">Cancelar</a>
        </div>
    </div>
</main>
</body>
</html>
