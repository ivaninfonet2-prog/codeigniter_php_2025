<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>

    <!-- Enlace al CSS específico del body -->
    <link rel="stylesheet" href="<?= base_url('activos/css/clientes/body_clientes.css'); ?>">
</head>
<body>
    <main class="inicio-container" style="background-image: url('<?= $fondo ?>');">

        <!-- Encabezado -->
        <header class="header-text">
            <h2>Listado de Clientes</h2>
            <p>A continuación se muestran todos los clientes registrados en el sistema</p>
        </header>

        <?php if (!empty($clientes)): ?>
            <section class="table-container">
                <table class="clientes-table">
                    <thead>
                        <tr>
                            <th>ID Cliente</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente['id_cliente']; ?></td>
                                <td><?= $cliente['email']; ?></td>
                                <td><?= $cliente['nombre']; ?></td>
                                <td><?= $cliente['dni']; ?></td>
                                <td><?= $cliente['telefono']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php else: ?>
            <p class="no-datos"><?= $mensaje ?? 'No hay datos disponibles.' ?></p>
        <?php endif; ?>

        <!-- Texto adicional fuera de la tarjeta -->
        <p class="info-adicional">Si necesitas más información, no dudes en ponerte en contacto con nosotros.</p>

    </main>
</body>
</html>
