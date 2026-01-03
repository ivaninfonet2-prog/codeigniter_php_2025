<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($titulo) ? $titulo : 'Lista de Usuarios' ?></title>

    <!-- Enlace al archivo CSS específico -->
    <link rel="stylesheet" href="<?= base_url('activos/css/lista_usuarios/body_lista_usuarios.css'); ?>">
</head>
<body>

<main class="inicio-container" style="background-image: url('<?= isset($fondo) ? $fondo : '' ?>');">

    <!-- Encabezado -->
    <section class="encabezado">
        <h2 class="titulo"><?= isset($titulo) ? $titulo : 'Lista de Usuarios' ?></h2>
        <p class="descripcion">
            Administración de usuarios registrados en el sistema.
            Desde aquí podés editar o eliminar usuarios existentes.
        </p>
    </section>

    <!-- Contenedor tabla -->
    <section class="tabla-wrapper">
        <div class="tabla-container">
            <table class="tabla-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario->id_usuario) ?></td>
                            <td><?= htmlspecialchars($usuario->nombre) ?></td>
                            <td><?= htmlspecialchars($usuario->apellido) ?></td>
                            <td><?= htmlspecialchars($usuario->nombre_usuario) ?></td>
                            <td><?= htmlspecialchars($usuario->dni) ?></td>
                            <td class="acciones">
                                <a href="<?= base_url('usuario/editar_usuario/'.$usuario->id_usuario) ?>" class="boton editar">
                                    Editar
                                </a>
                                <a href="<?= base_url('usuario/eliminar_usuario/'.$usuario->id_usuario) ?>"
                                   class="boton eliminar"
                                   onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="sin-datos">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Texto adicional fuera de la tarjeta -->
    <section class="informacion-adicional">
        <p>Aquí puedes gestionar todos los usuarios. Si deseas más detalles o funciones adicionales, por favor, consulta la sección correspondiente en el menú.</p>
    </section>

</main>

</body>
</html>
