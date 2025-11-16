
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titulo) ? $titulo : 'UNLa Tienda'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/vista_header.css'); ?>">
</head>
<body class="d-flex flex-column min-vh-100">

<header class="main-header">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo UNLa" class="logo-img me-2">
                <span class="site-title">UNLa Tienda</span>
            </a>

            <!-- Botón hamburguesa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú -->
            <div class="collapse navbar-collapse justify-content-end nav-menu" id="menuPrincipal">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('registrar'); ?>">Registrar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
