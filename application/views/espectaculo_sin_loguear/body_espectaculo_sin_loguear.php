<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo); ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculo_sin_loguear/body_espectaculo_sin_loguear.css?v=' . time()) ?>">
</head>

<body>

    <!-- Fondo general -->
    <div class="fondo-body" style="background-image: url('<?= htmlspecialchars($fondo) ?>');" aria-hidden="true"></div>

    <!-- Título y descripción principales fuera de la tarjeta -->
    <header class="intro-text">
        <h1><?= htmlspecialchars($espectaculo['nombre']) ?></h1>
        <p><?= htmlspecialchars($espectaculo['descripcion']) ?></p>
    </header>

    <!-- Tarjeta espectáculo -->
    <main class="registro-container">
        <article class="tarjeta-espectaculo">

            <!-- Nombre y descripción dentro de la tarjeta -->
            <section class="espectaculo-info">
                <h2 class="espectaculo-nombre"><?= htmlspecialchars($espectaculo['nombre']) ?></h2>
                <p class="espectaculo-descripcion"><?= htmlspecialchars($espectaculo['descripcion']) ?></p>
            </section>

            <!-- Imagen centrada debajo del título y descripción -->
            <figure class="imagen">
                <img 
                    src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                    alt="Imagen del espectáculo: <?= htmlspecialchars($espectaculo['nombre']) ?>" 
                    class="imagen-espectaculo">
            </figure>

            <!-- Detalles -->
            <section class="detalles" aria-label="Detalles del espectáculo">
                <ul>
                    <li class="fecha"><strong>Fecha:</strong> <?= htmlspecialchars($espectaculo['fecha']) ?></li>
                    <li class="hora"><strong>Hora:</strong> <?= htmlspecialchars($espectaculo['hora']) ?></li>
                    <li class="direccion"><strong>Dirección:</strong> <?= htmlspecialchars($espectaculo['direccion']) ?></li>
                    <li class="precio"><strong>Precio:</strong> $<?= number_format($espectaculo['precio'], 2, ',', '.') ?></li>
                    <li class="disponibles"><strong>Entradas disponibles:</strong> <?= htmlspecialchars($espectaculo['disponibles']) ?></li>
                </ul>
            </section>

            <!-- Estado -->
            <section class="informacion" aria-live="polite">
                <?php if ($espectaculo['disponibles'] > 0): ?>
                    <p class="estado disponible">¡Todavía hay lugares disponibles!</p>
                <?php else: ?>
                    <p class="estado agotado">Entradas agotadas.</p>
                <?php endif; ?>
            </section>

            <!-- Login / Reservas -->
            <section class="reserva-login">
                <p class="texto-login">
                    Para reservar entradas, primero debés iniciar sesión.
                </p>
                <a href="<?= site_url('login') ?>" class="boton-login">
                    Iniciar sesión
                </a>
            </section>

        </article>
    </main>

    <!-- Mapa -->
    <section class="mapa-section">
        <h2 class="mapa-titulo">Ubicación del espectáculo</h2>
        <p class="mapa-descripcion">Encontrá fácilmente el lugar del evento en el mapa para organizar tu llegada.</p>
        <div class="mapa-externa">
            <img src="<?= base_url('activos/imagenes/mapa.jfif') ?>" alt="Mapa del lugar del espectáculo">
        </div>
    </section>

    <!-- Texto debajo del mapa -->
    <p class="texto-debajo-mapa">Este es el lugar donde podrás disfrutar del espectáculo. ¡No te lo pierdas!</p>

</body>
</html>
