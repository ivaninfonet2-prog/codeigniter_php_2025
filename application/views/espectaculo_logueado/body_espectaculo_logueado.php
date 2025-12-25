<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $espectaculo['nombre']; ?></title>

    <link rel="stylesheet"
          href="<?= base_url('activos/css/espectaculo_logueado/body_espectaculo_logueado.css?v=' . time()); ?>">
</head>

<body>

<!-- Fondo -->
<div class="fondo-body" style="background-image: url('<?= $fondo ?>');"></div>

<main class="container">

    <!-- TEXTO SUPERIOR (fuera de la tarjeta) -->
    <section class="intro">
        <h2>Detalle del espectáculo</h2>
        <p>
            Conocé toda la información del evento, disponibilidad de entradas
            y realizá tu reserva de forma rápida y segura.
        </p>
    </section>

    <!-- TARJETA -->
    <section class="card">

        <h1 class="titulo"><?= $espectaculo['nombre']; ?></h1>

        <!-- Imagen -->
        <div class="imagen-wrapper">
            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>"
                 alt="<?= $espectaculo['nombre'] ?>"
                 class="imagen">
        </div>

        <!-- Descripción -->
        <p class="descripcion"><?= $espectaculo['descripcion']; ?></p>

        <!-- Detalles -->
        <section class="detalles">
            <h3>Detalles del evento</h3>
            <ul>
                <li><strong>Fecha:</strong> <?= $espectaculo['fecha']; ?></li>
                <li><strong>Hora:</strong> <?= $espectaculo['hora']; ?></li>
                <li><strong>Dirección:</strong> <?= $espectaculo['direccion']; ?></li>
            </ul>
        </section>

        <!-- Entradas -->
        <p class="entradas">
            Entradas disponibles:
            <strong><?= $espectaculo['disponibles']; ?></strong>
        </p>

        <?php if (!empty($mensaje)): ?>
            <div class="mensaje"><?= $mensaje; ?></div>
        <?php endif; ?>

        <!-- Reserva -->
        <?php if ($espectaculo['disponibles'] > 0): ?>
            <form method="post"
                  action="<?= site_url('reservar/procesar/' . $espectaculo['id_espectaculo']); ?>"
                  class="formulario">

                <label for="cantidad_entradas">Cantidad de entradas</label>
                <input type="number"
                       name="cantidad_entradas"
                       id="cantidad_entradas"
                       min="1"
                       max="<?= $espectaculo['disponibles']; ?>"
                       required>

                <div class="botones">
                    <button type="submit" class="btn reservar">Reservar</button>
                    <a href="<?= site_url('usuario/usuario_espectaculos') ?>" class="btn volver">Ir a Espectaculos</a>
                </div>
            </form>
        <?php else: ?>
            <div class="error">Entradas agotadas.</div>
            <div class="botones">
                <a href="<?= site_url('usuario/usuario_espectaculos') ?>" class="btn volver">Ir a Espectaculos</a>
            </div>
        <?php endif; ?>

    </section>
</main>

</body>
</html>
