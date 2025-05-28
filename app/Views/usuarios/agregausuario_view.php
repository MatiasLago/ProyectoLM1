<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Agregar Usuario
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="mb-4">Agregar Nuevo Usuario</h1>

    <?php if(isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
    <?php endif; ?>

    <form action="<?= site_url('usuario/guardar') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= set_value('nombre') ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?= set_value('apellido') ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" value="<?= set_value('email') ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="<?= set_value('usuario') ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">Contraseña:</label>
            <input type="password" name="pass" id="pass" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="perfil_id" class="form-label">Perfil (ID):</label>
            <input type="number" name="perfil_id" id="perfil_id" value="<?= set_value('perfil_id') ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="baja" class="form-label">Baja (S/N):</label>
            <select name="baja" id="baja" class="form-select" required>
                <option value="N" <?= set_select('baja','N', true) ?>>N</option>
                <option value="S" <?= set_select('baja','S') ?>>S</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Usuario</button>
        <a href="<?= base_url('usuario') ?>" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>
