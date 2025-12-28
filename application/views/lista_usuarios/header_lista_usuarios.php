<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS Header -->
    <link rel="stylesheet" href="<?= base_url('activos/css/lista_usuarios/header_lista_usuarios.css'); ?>">

    <!-- Bootstrap (opcional, no interfiere) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- LOGO + TÍTULO (LOGOUT FORZADO) -->
        <a href="<?= site_url('login/logout'); ?>" class="brand" title="Cerrar sesión">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo UNLa" class="logo-img">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- MENÚ -->
        <nav class="nav-menu">
            <a href="<?= site_url('administrador'); ?>" class="btn btn-volver">
                Ir al Administrador
            </a>

            <a href="<?= site_url('confirmacion/cerrar_sesion_administrador'); ?>" class="btn btn-cerrar">
                Cerrar Sesión
            </a>
        </nav>

    </div>
</header>

<main>
    <!-- Contenido de la vista -->
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Seguridad: bloqueo back + sesión -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    window.onpageshow = function (event) {
        if (event.persisted || !<?= json_encode($this->session->userdata('logged_in')); ?>) {
            window.location.replace('<?= site_url("login"); ?>');
        }
    };
</script>

</body>
</html>
