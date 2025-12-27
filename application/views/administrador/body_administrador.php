<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador/body_administrador.css'); ?>">
</head>

<body>

<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">

    <!-- TEXTO SUPERIOR -->
    <section class="bienvenida-admin">
        <h1>Bienvenido Administrador</h1>
        <p>
            Desde este panel podés gestionar espectáculos, usuarios, ventas y clientes
            del sistema de forma centralizada.
        </p>
    </section>

    <!-- TARJETA -->
    <section class="botones-container">

        <h2 class="panel-title">Panel de Control</h2>

        <p class="panel-descripcion">
            Seleccioná una opción para administrar el contenido del sistema.
        </p>

        <!--  MENSAJE FLASH CORREGIDO -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="mensaje-exito">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="mensaje-error">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- BOTONES -->
        <a href="<?= base_url('administrador/administrador_espectaculos'); ?>" class="boton">Espectáculos</a>
        <a href="<?= base_url('ventas/mostrar_ventas'); ?>" class="boton">Ventas</a>
        <a href="<?= base_url('clientes/mostrar_clientes'); ?>" class="boton">Clientes</a>
        <a href="<?= base_url('administrador/crear_espectaculo'); ?>" class="boton">Agregar Espectáculo</a>
        <a href="<?= base_url('administrador/lista_usuarios'); ?>" class="boton">Usuarios</a>
        <a href="<?= base_url('administrador/crear_usuario'); ?>" class="boton">Agregar Usuario</a>

    </section>

</main>

</body>
</html>
