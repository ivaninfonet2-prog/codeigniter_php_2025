<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas/usuario_reservas_header.css'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- Logo + título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Menú de navegación -->
        <nav class="nav-menu">
            <a href="<?= base_url('usuario'); ?>" class="btn btn-login">
                Volver al Usuario
            </a>

            <a href="<?= base_url('confirmacion/cerrar_sesion_usuario'); ?>" class="btn btn-cerrar">
                Cerrar Sesión
            </a>
        </nav>

    </div>
</header>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
