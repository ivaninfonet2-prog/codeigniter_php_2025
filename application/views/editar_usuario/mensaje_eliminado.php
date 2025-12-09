<link rel="stylesheet" href="<?= base_url('activos/css/editar_usuario/body_editar_usuario.css') ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">

    <div class="card" style="max-width: 400px; text-align:center;">
        <h2>Usuario Eliminado</h2>

        <?php if(!empty($mensaje_exito)): ?>
            <div class="alert success">
                <?= $mensaje_exito; ?>
            </div>
        <?php endif; ?>

        <a href="javascript:history.back()" class="btn btn-success">Volver a la vista anterior</a>
    </div>

</main>
