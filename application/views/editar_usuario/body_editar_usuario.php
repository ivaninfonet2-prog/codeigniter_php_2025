<link rel="stylesheet" href="<?= base_url('activos/css/editar_usuario/body_editar_usuario.css') ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">

    <div class="card">

        <h2>Editar Usuario</h2>

        <!-- Botones superiores -->
        <div class="botones-arriba">
            <a href="<?= base_url('administrador') ?>" class="btn">Panel Administrador</a>
            <a href="javascript:history.back()" class="btn">Volver</a>
        </div>

        <!-- Mensaje de éxito -->
        <?php if ($this->session->flashdata('mensaje_exito')): ?>
            <div class="alert success">
                <?= $this->session->flashdata('mensaje_exito'); ?><br><br>
                <a href="javascript:history.back()" class="btn btn-success">Volver a la vista anterior</a>
            </div>
        <?php endif; ?>

        <!-- Mensaje de error -->
        <?php if ($this->session->flashdata('mensaje')): ?>
            <div class="alert"><?= $this->session->flashdata('mensaje'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('usuario/editar_usuario/' . ($usuario->id_usuario ?? '')) ?>" method="post">

            <input type="hidden" name="id_usuario" value="<?= $usuario->id_usuario ?? '' ?>">

            <!-- Nombre -->
            <label class="form-label">Nombre</label>
            <input type="text" 
                   name="nombre" 
                   class="form-control <?= form_error('nombre') ? 'error-input' : '' ?>" 
                   value="<?= set_value('nombre', $usuario->nombre ?? '') ?>" required>
            <div class="error-msg"><?= form_error('nombre'); ?></div>

            <!-- Apellido -->
            <label class="form-label">Apellido</label>
            <input type="text" 
                   name="apellido" 
                   class="form-control <?= form_error('apellido') ? 'error-input' : '' ?>" 
                   value="<?= set_value('apellido', $usuario->apellido ?? '') ?>" required>
            <div class="error-msg"><?= form_error('apellido'); ?></div>

            <!-- Correo electrónico -->
            <label class="form-label">Correo electrónico</label>
            <input type="email" 
                   name="email" 
                   class="form-control <?= form_error('email') ? 'error-input' : '' ?>" 
                   value="<?= set_value('email', $usuario->nombre_usuario ?? '') ?>" required>
            <div class="error-msg"><?= form_error('email'); ?></div>

            <!-- Contraseña opcional -->
            <label class="form-label">Cambiar contraseña (opcional)</label>
            <input type="password" 
                   name="password" 
                   class="form-control <?= form_error('password') ? 'error-input' : '' ?>">
            <div class="error-msg"><?= form_error('password'); ?></div>

            <!-- Botones finales -->
            <div class="botones-finales">
                <button type="submit" class="btn">Guardar cambios</button>
                <a href="<?= base_url('administrador') ?>" class="btn">Cancelar</a>
            </div>

        </form>
    </div>

</main>
