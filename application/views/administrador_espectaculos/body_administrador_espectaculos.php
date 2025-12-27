
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></title>

    <link rel="stylesheet" href="<?= base_url('activos/css/administrador_espectaculos/body_administrador_espectaculos.css'); ?>">
</head>
<body>

<main class="main-content" style="background-image: url('<?= $fondo ?>');">

    <!-- ENCABEZADO -->
    <section class="encabezado-seccion">
        <h1 class="titulo-principal">
            <?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?>
        </h1>
        <p class="descripcion-principal">
            Administración de espectáculos disponibles. Desde aquí podés editar, eliminar o revisar la información de cada evento.
        </p>
    </section>

    <!-- Mensaje Flash -->
    <?php if ($this->session->flashdata('mensaje')): ?>
        <div class="alerta" id="mensaje-alerta">
            <?= htmlspecialchars($this->session->flashdata('mensaje'), ENT_QUOTES, 'UTF-8'); ?>
            <span class="cerrar-alerta"
                  onclick="document.getElementById('mensaje-alerta').style.display='none';">
                &times;
            </span>
        </div>
    <?php endif; ?>

    <!-- Listado -->
    <?php if (!empty($espectaculos)): ?>
        <div class="contenedor-tarjetas">
            <?php foreach ($espectaculos as $espectaculo): ?>
                <div class="tarjeta">

                    <img
                        src="<?= !empty($espectaculo['imagen'])
                            ? base_url('activos/imagenes/' . htmlspecialchars($espectaculo['imagen'], ENT_QUOTES, 'UTF-8'))
                            : base_url('activos/imagenes/default.jpg'); ?>"
                        alt="<?= htmlspecialchars($espectaculo['nombre'], ENT_QUOTES, 'UTF-8'); ?>"
                        class="imagen"
                        loading="lazy"
                    >

                    <div class="contenido">
                        <h3><?= htmlspecialchars($espectaculo['nombre'], ENT_QUOTES, 'UTF-8'); ?></h3>

                        <p><strong>Fecha:</strong> <?= date('d/m/Y', strtotime($espectaculo['fecha'])); ?></p>
                        <p><strong>Hora:</strong> <?= date('H:i', strtotime($espectaculo['hora'])); ?></p>
                        <p><strong>Entradas:</strong> <?= htmlspecialchars($espectaculo['disponibles'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Precio:</strong>
                            <?= isset($espectaculo['precio'])
                                ? '$' . htmlspecialchars($espectaculo['precio'], ENT_QUOTES, 'UTF-8')
                                : 'No definido'; ?>
                        </p>

                        <p class="detalle">
                            <?= isset($espectaculo['detalles'])
                                ? htmlspecialchars($espectaculo['detalles'], ENT_QUOTES, 'UTF-8')
                                : 'Sin detalles'; ?>
                        </p>

                        <div class="acciones-tarjeta">
                            <a href="<?= site_url('espectaculos/editar_espectaculo/' . $espectaculo['id_espectaculo']); ?>"
                               class="boton boton-editar">Editar</a>

                            <a href="<?= site_url('espectaculos/eliminar_espectaculo/' . $espectaculo['id_espectaculo']); ?>"
                               class="boton boton-eliminar"
                               onclick="return confirm('¿Eliminar espectáculo y todos sus datos asociados?');">
                               Eliminar
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="mensaje-vacio">No hay espectáculos disponibles en este momento.</p>
    <?php endif; ?>

</main>

<script>
    setTimeout(function () 
    {
        const alerta = document.getElementById('mensaje-alerta');
        if (alerta) alerta.style.display = 'none';
    }, 5000);
</script>

</body>
</html>
