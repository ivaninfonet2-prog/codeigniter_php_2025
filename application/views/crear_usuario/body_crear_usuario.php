<link rel="stylesheet" href="<?= base_url('activos/css/crear_usuario/body_crear_usuario.css'); ?>">

<main class="main-content"
      style="background-image: url('<?= $fondo ?? '' ?>');">

    <!-- TITULO Y DESCRIPCION -->
    <section class="page-header">
        <h1>Crear usuario</h1>
        <p>
            Completá el formulario para registrar un nuevo usuario en el sistema.
        </p>
    </section>

    <!-- TEXTO INFORMATIVO FUERA DE LA TARJETA -->
    <div class="info-bajo-tarjeta">
        <p>Todos los campos son obligatorios y la contraseña debe ser confirmada.</p>
    </div>

    <!-- TARJETA -->
    <div class="card">

        <!-- TEXTO INFORMATIVO -->
        <div class="card-info">
            La contraseña deberá ser confirmada antes de guardar.
        </div>

        <!-- Mensajes flash -->
        <?php if ($this->session->flashdata('mensaje_exito')): ?>
            <div class="alert success">
                <?= $this->session->flashdata('mensaje_exito'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('mensaje_error')): ?>
            <div class="alert">
                <?= $this->session->flashdata('mensaje_error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuario/crear_usuario'); ?>" method="post">

            <div class="form-grid">

                <!-- Nombre -->
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input type="text"
                           name="nombre"
                           value="<?= set_value('nombre'); ?>"
                           class="<?= form_error('nombre') ? 'error-input' : '' ?>"
                           required>
                    <div class="error-msg"><?= form_error('nombre'); ?></div>
                </div>

                <!-- Apellido -->
                <div class="form-group">
                    <label class="form-label">Apellido</label>
                    <input type="text"
                           name="apellido"
                           value="<?= set_value('apellido'); ?>"
                           class="<?= form_error('apellido') ? 'error-input' : '' ?>"
                           required>
                    <div class="error-msg"><?= form_error('apellido'); ?></div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email"
                           name="email"
                           value="<?= set_value('email'); ?>"
                           class="<?= form_error('email') ? 'error-input' : '' ?>"
                           required>
                    <div class="error-msg"><?= form_error('email'); ?></div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password"
                           name="password"
                           class="<?= form_error('password') ? 'error-input' : '' ?>"
                           required>
                    <div class="error-msg"><?= form_error('password'); ?></div>
                </div>

                <!-- Confirmar Password -->
                <div class="form-group full-width">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password"
                           name="password_confirm"
                           class="<?= form_error('password_confirm') ? 'error-input' : '' ?>"
                           required>
                    <div class="error-msg"><?= form_error('password_confirm'); ?></div>
                </div>

            </div>

            <!-- BOTONES -->
            <div class="botones-finales">
                <button type="submit" class="btn">
                    Crear usuario
                </button>

                <a href="<?= base_url('administrador'); ?>"
                   class="btn btn-danger">
                    Cancelar
                </a>
            </div>

        </form>
    </div>

</main>
