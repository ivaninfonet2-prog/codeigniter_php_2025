<!-- CSS específico -->
<link rel="stylesheet" href="<?= base_url('activos/css/editar_espectaculo/body_editar.css') ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">

    <!-- ENCABEZADO EXTERNO -->
    <section class="encabezado-editar">
        <h1>Editar espectáculo</h1>
        <p>
            Desde este panel podés modificar la información del espectáculo,
            actualizar sus datos y cambiar la imagen si es necesario.
        </p>
    </section>

    <!-- FORMULARIO -->
    <form action="<?= base_url('espectaculos/editar_espectaculo/'.($espectaculo['id_espectaculo'] ?? '')) ?>"
          method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_espectaculo" value="<?= $espectaculo['id_espectaculo'] ?? '' ?>">
        <input type="hidden" name="imagen_actual" value="<?= $espectaculo['imagen'] ?? '' ?>">

        <!-- TARJETA -->
        <div class="card">

            <h2>Formulario de edición</h2>

            <!-- Mensaje flash -->
            <?php if ($this->session->flashdata('mensaje')): ?>
                <div class="alert">
                    <?= $this->session->flashdata('mensaje'); ?>
                </div>
            <?php endif; ?>

            <label class="form-label">Nombre</label>
            <input type="text" name="nombre"
                   class="form-control <?= form_error('nombre') ? 'error-input' : '' ?>"
                   value="<?= set_value('nombre', $espectaculo['nombre'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('nombre'); ?></div>

            <label class="form-label">Descripción</label>
            <textarea name="descripcion"
                      class="form-control <?= form_error('descripcion') ? 'error-input' : '' ?>"
                      required><?= set_value('descripcion', $espectaculo['descripcion'] ?? '') ?></textarea>
            <div class="error-msg"><?= form_error('descripcion'); ?></div>

            <div class="fila-doble">
                <div>
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha"
                           class="form-control <?= form_error('fecha') ? 'error-input' : '' ?>"
                           value="<?= set_value('fecha', $espectaculo['fecha'] ?? '') ?>" required>
                    <div class="error-msg"><?= form_error('fecha'); ?></div>
                </div>

                <div>
                    <label class="form-label">Hora</label>
                    <input type="time" name="hora"
                           class="form-control <?= form_error('hora') ? 'error-input' : '' ?>"
                           value="<?= set_value('hora', $espectaculo['hora'] ?? '') ?>" required>
                    <div class="error-msg"><?= form_error('hora'); ?></div>
                </div>
            </div>

            <div class="fila-doble">
                <div>
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio"
                           class="form-control <?= form_error('precio') ? 'error-input' : '' ?>"
                           value="<?= set_value('precio', $espectaculo['precio'] ?? '') ?>" required>
                    <div class="error-msg"><?= form_error('precio'); ?></div>
                </div>

                <div>
                    <label class="form-label">Entradas disponibles</label>
                    <input type="number" name="disponibles"
                           class="form-control <?= form_error('disponibles') ? 'error-input' : '' ?>"
                           value="<?= set_value('disponibles', $espectaculo['disponibles'] ?? '') ?>" required>
                    <div class="error-msg"><?= form_error('disponibles'); ?></div>
                </div>
            </div>

            <label class="form-label">Dirección</label>
            <input type="text" name="direccion"
                   class="form-control <?= form_error('direccion') ? 'error-input' : '' ?>"
                   value="<?= set_value('direccion', $espectaculo['direccion'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('direccion'); ?></div>

            <?php if (!empty($espectaculo['imagen']) && file_exists('./activos/imagenes/'.$espectaculo['imagen'])): ?>
                <div class="imagen-actual">
                    <span>Imagen actual</span>
                    <img src="<?= base_url('activos/imagenes/'.$espectaculo['imagen']) ?>" alt="Imagen actual">
                </div>
            <?php endif; ?>

            <label class="form-label">Cambiar imagen</label>
            <input type="file" name="imagen" class="form-control">

        </div>

        <!-- BOTONES DE ACCIÓN (AFUERA DE LA TARJETA) -->
        <div class="acciones-form">
            <a href="javascript:history.back()" class="btn btn-secundario">
                Volver a espectáculos
            </a>

            <button type="submit" class="btn btn-primario">
                Guardar cambios
            </button>

            <a href="<?= base_url('administrador') ?>" class="btn btn-cancelar">
                Cancelar
            </a>
        </div>

    </form>
</main>
