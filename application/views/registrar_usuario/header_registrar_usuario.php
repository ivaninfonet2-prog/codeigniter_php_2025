<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/registrar_usuario/header_registrar_usuario.css'); ?>">
</head>
<body>

<header class="main-header">

    <div class="header-container">

        <!-- Logo y título del sitio -->
        <a href="<?= base_url(); ?>" class="brand">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo UNLa Tienda">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Botones de navegación -->
        <nav class="nav-menu">
            <a href="<?= base_url('login'); ?>" class="btn btn-login">Login</a>
            <a href="<?= base_url(); ?>" class="btn btn-home">Ir al Inicio</a>
        </nav>

    </div>

</header>

</body>
</html>
