<!-- CSS personalizado para el body -->
<link rel="stylesheet" href="<?= base_url('activos/css/clientes/body_clientes.css'); ?>">

<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">
    
    <!-- Texto y descripción antes de la tabla -->
    <div class="header-text">
        <h2>Listado de Clientes</h2>
        <p>A continuación se muestran todos los clientes registrados en el sistema, con sus datos de contacto y usuario asociado.</p>
    </div>

    <?php if (!empty($clientes)): ?>
        <div class="table-container">
            <table class="clientes-table">
                <thead>
                    <tr>
                        <th>ID Cliente</th>
                        <th>Usuario ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= $cliente['id_cliente'] ?></td>
                            <td><?= $cliente['usuario_id'] ?></td>
                            <td><?= $cliente['nombre'] ?></td>
                            <td><?= $cliente['dni'] ?></td>
                            <td><?= $cliente['telefono'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <p class="no-datos"><?= isset($mensaje) ? $mensaje : 'No hay datos disponibles.' ?></p>
    <?php endif; ?>
    
</main>
