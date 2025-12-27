<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/crear_espectaculo/body_crear_espectaculo.css') ?>">
</head>

<body>

<main class="main-content" style="background-image: url('<?= $fondo ?>');">

    <!-- TÍTULO PRINCIPAL Y DESCRIPCIÓN -->
    <div class="page-header">
        <h1><?= $titulo ?></h1>
        <p>Complete los datos del espectáculo para agregarlo al sistema. Asegúrese de incluir todos los campos requeridos.</p>
    </div>

    <!-- TARJETA / FORMULARIO -->
    <div class="card">

        <!-- Error de imagen -->
        <?php if ($this->session->flashdata('error_imagen')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error_imagen') ?>
            </div>
        <?php endif; ?>

        <!-- Errores de validación -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <?= form_open_multipart(); ?>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                       value="<?= set_value('nombre') ?>" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" required><?= set_value('descripcion') ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" value="<?= set_value('fecha') ?>" required>
                </div>
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="time" name="hora" value="<?= set_value('hora') ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" step="0.01"
                           value="<?= set_value('precio') ?>" required>
                </div>
                <div class="form-group">
                    <label for="disponibles">Disponibles</label>
                    <input type="number" name="disponibles"
                           value="<?= set_value('disponibles') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion"
                       value="<?= set_value('direccion') ?>" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen">
            </div>

            <!-- BOTONES -->
            <div class="form-buttons">
                <button type="submit" class="btn btn-submit">Crear Espectáculo</button>
                <a href="<?= base_url('administrador') ?>" class="btn btn-cancel">Cancelar</a>
            </div>

        <?= form_close(); ?>
    </div>

</main>

</body>
</html>
