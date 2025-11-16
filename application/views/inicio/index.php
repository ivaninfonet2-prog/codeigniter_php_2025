<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css para animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/inicio.css'); ?>">
</head>
<body class="inicio-body">

    <!-- Contenedor principal con fondo dinámico -->
    <div class="container-fluid inicio-container full-width"
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('<?php echo $fondo; ?>') no-repeat center center fixed;
                background-size: cover;">

        <!-- Sección del título -->
        <div class="row">
            <div class="col-12 text-center animate__animated animate__fadeInDown">
                <?php $this->load->view('titulo/titulo'); ?>
            </div>
        </div>

        <!-- Sección de espectáculos -->
        <div class="row mt-4 justify-content-center">
            <div class="col-md-10 animate__animated animate__fadeInUp">
                <?php $this->load->view('espectaculos/index_sin_loguear'); ?>
            </div>
        </div>

        <!-- Sección extra decorativa -->
        <div class="row mt-5">
            <div class="col-12 text-center animate__animated animate__zoomIn">
                <h3 class="mensaje-bienvenida">¡Disfrutá de nuestros espectáculos!</h3>
                <p class="mensaje-sub">Explorá la cartelera y viví experiencias únicas.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
