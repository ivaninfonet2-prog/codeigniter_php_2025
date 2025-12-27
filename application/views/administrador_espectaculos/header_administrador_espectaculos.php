<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS Header Administrador Espectáculos -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador_espectaculos/header_administrador_espectaculos.css'); ?>">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- Marca / Logo (Logout forzado al click) -->
        <a href="<?= site_url('login/logout'); ?>" 
           class="brand" 
           title="Cerrar sesión">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" 
                 alt="Logo UNLa" 
                 class="logo-img">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Navegación -->
        <nav class="nav-menu">
            <a href="<?= site_url('administrador'); ?>" 
               class="btn btn-volver">
                Ir al Administrador
            </a>

            <a href="<?= site_url('confirmacion/cerrar_sesion_administrador'); ?>" 
               class="btn btn-cerrar">
                Cerrar Sesión
            </a>
        </nav>

    </div>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Prevención de retroceso + sesión -->
<script>
    if (window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }

    window.onpageshow = function (event)
    {
        if (event.persisted || !<?= json_encode($this->session->userdata('logged_in')); ?>) {
            window.location.replace('<?= site_url("login"); ?>');
        }
    };
</script>

</body>
</html>
