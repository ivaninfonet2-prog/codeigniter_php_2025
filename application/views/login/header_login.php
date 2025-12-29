<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS del header de login -->
    <link rel="stylesheet" href="<?= base_url('activos/css/login/header_login.css'); ?>">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- Logo + nombre del sitio -->
        <a href="<?= base_url(); ?>" class="brand">
            <img
                src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                alt="Logo UNLa Tienda"
                class="logo-img"
            >
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Navegación derecha -->
        <nav class="nav-menu">
            <a href="<?= base_url(); ?>" class="btn btn-login">
                Volver al Inicio
            </a>
        </nav>

    </div>
</header>

</body>
</html>
