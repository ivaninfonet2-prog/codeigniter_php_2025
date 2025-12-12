<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/cerrar_sesion/header_cerrar_sesion.css'); ?>">
</head>
<body class="d-flex flex-column min-vh-100">

<header class="main-header">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <!-- Logo a la izquierda -->
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo UNLa" class="logo-img me-2">
                <span class="site-title">UNLa Tienda</span>
            </a>

            <!-- Botón hamburguesa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú a la derecha -->
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto nav-menu">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark me-2" href="<?= base_url(''); ?>">Volver al inicio</a>
                    </li>

                    <!-- Botón de Cerrar sesión -->
                    <li class="nav-item">
                        <a class="btn btn-outline-danger me-2" href="#" data-bs-toggle="modal" data-bs-target="#confirmModal">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Modal de confirmación de cierre de sesión -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar cierre de sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cerrar sesión? Esta acción te desconectará de la plataforma.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="<?= base_url('cerrar_sesion'); ?>" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
