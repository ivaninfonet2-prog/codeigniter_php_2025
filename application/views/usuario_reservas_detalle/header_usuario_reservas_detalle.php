<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/header_usuario_reservas_detalle.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <a href="<?= site_url('login/logout'); ?>" class="brand" title="Cerrar sesión">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <nav class="nav-menu">
            <a href="<?= site_url('usuario'); ?>" class="btn-login">
                Volver al Usuario
            </a>

            <a href="<?= site_url('confirmacion/cerrar_sesion_usuario'); ?>" class="btn-cerrar">
                Cerrar Sesión
            </a>
        </nav>

    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    window.onpageshow = function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
</script>

</body>
</html>
