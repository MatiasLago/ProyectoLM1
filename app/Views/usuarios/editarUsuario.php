<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Editar Usuario
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="mb-4">Editar Usuario</h1>

    <?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
    <?php endif ?>

    <form action="<?= site_url('usuario/actualizar') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($usuario['id']) ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre"
                   value="<?= esc($usuario['nombre']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" name="apellido" id="apellido"
                   value="<?= esc($usuario['apellido']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email"
                   value="<?= esc($usuario['email']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" name="usuario" id="usuario"
                   value="<?= esc($usuario['usuario']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">
                Contraseña (dejar en blanco para mantener la actual):
            </label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>

        <div class="mb-3">
            <label for="perfil_id" class="form-label">Perfil (ID):</label>
            <input type="number" name="perfil_id" id="perfil_id"
                   value="<?= esc($usuario['perfil_id']) ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="baja" class="form-label">Baja (S/N):</label>
            <select name="baja" id="baja" class="form-select" required>
                <option value="N" <?= $usuario['baja'] === 'N' ? 'selected' : '' ?>>N</option>
                <option value="S" <?= $usuario['baja'] === 'S' ? 'selected' : '' ?>>S</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="<?= base_url('usuario') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>
