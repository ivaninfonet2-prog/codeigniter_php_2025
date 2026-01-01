<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS del header con versiónado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/registrar_usuario/header_registrar_usuario.css?v=' . time()); ?>">
</head>

<body>
<header class="main-header">
    <div class="header-container">

        <!-- Logo y título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img
                src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                alt="Logo UNLa Tienda"
                class="logo-img"
            >
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Navegación -->
        <nav class="nav-menu">
            <a href="<?= base_url('login'); ?>" class="btn btn-login">
                Login
            </a>
            <a href="<?= base_url(); ?>" class="btn btn-home">
                Ir al Inicio
            </a>
        </nav>

    </div>
</header>
</body>
</html>
