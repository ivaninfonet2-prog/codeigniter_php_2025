<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cerrar Sesión</title>
   
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/cerrar_sesion.css'); ?>">
</head>

<body>
<main class="confirmacion-container">
    <div class="confirmacion-card">
        <h1>¿Cerrar sesión?</h1>
        <p>¿Estás seguro de que deseas cerrar tu sesión actual?</p>

        <div class="acciones">
            <a href="<?= site_url('login/logout'); ?>" class="btn confirmar">Sí, cerrar sesión</a>
            <a href="<?= current_url(); ?>" class="btn cancelar">Cancelar</a>
        </div>
    </div>
</main>
</body>
</html>
