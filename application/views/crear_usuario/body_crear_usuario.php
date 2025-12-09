<!-- Enlace al CSS específico para esta vista -->
<link rel="stylesheet" href="<?= base_url('activos/css/crear_usuario/body_crear_usuario.css') ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">
    <div class="card">

        <h2>Crear Usuario</h2>

        <!-- Botones de navegación -->
        <div class="botones-arriba">
            <a href="<?= base_url('administrador') ?>" class="btn">Panel Administrador</a>
            <a href="javascript:history.back()" class="btn">Volver</a>
        </div>

        <!-- Mensajes flash -->
        <?php if ($this->session->flashdata('mensaje_exito')): ?>
            <div class="alert success"><?= $this->session->flashdata('mensaje_exito'); ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('mensaje_error')): ?>
            <div class="alert"><?= $this->session->flashdata('mensaje_error'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('usuario/crear_usuario') ?>" method="post">

            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control <?= form_error('nombre') ? 'error-input' : '' ?>" value="<?= set_value('nombre') ?>" required>
            <div class="error-msg"><?= form_error('nombre'); ?></div>

            <label class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control <?= form_error('apellido') ? 'error-input' : '' ?>" value="<?= set_value('apellido') ?>" required>
            <div class="error-msg"><?= form_error('apellido'); ?></div>

            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control <?= form_error('email') ? 'error-input' : '' ?>" value="<?= set_value('email') ?>" required>
            <div class="error-msg"><?= form_error('email'); ?></div>

            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control <?= form_error('password') ? 'error-input' : '' ?>" required>
            <div class="error-msg"><?= form_error('password'); ?></div>

            <label class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirm" class="form-control <?= form_error('password_confirm') ? 'error-input' : '' ?>" required>
            <div class="error-msg"><?= form_error('password_confirm'); ?></div>

            <!-- Botones de acción -->
            <div class="botones-finales">
                <button type="submit" class="btn">Crear Usuario</button>
                <a href="<?= base_url('administrador') ?>" class="btn">Cancelar</a>
            </div>

        </form>
    </div>
</main>
