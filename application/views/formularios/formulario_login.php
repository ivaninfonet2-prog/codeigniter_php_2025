
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($titulo) ? $titulo : 'UNLa Tienda'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/formularios/formulario_login.css'); ?>">
</head>
<body>

    <!-- Imagen de fondo dinámica -->
    <div class="background-layer" style="background-image: url('<?php echo $fondo_login; ?>');"></div>

    <main class="login-container">
        <form action="<?php echo base_url('login/validar'); ?>" method="post" class="login-form">
            <h2 class="text-center mb-4"><?php echo $titulo; ?></h2>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>

            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>

        <div class="text-center mt-3">
            <a href="<?php echo site_url('principio/index'); ?>" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </main>

</body>
</html>
