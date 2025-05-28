<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Listado de Usuarios
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="mb-4">Usuarios Registrados</h1>
    <a href="<?= base_url('usuario/crear') ?>" class="btn btn-primary mb-3">Nuevo Usuario</a>

    <?php if (! empty($usuarios)): ?>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Perfil ID</th>
                <th>Baja</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= esc($u['id']) ?></td>
                <td><?= esc($u['nombre']) ?></td>
                <td><?= esc($u['apellido']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td><?= esc($u['usuario']) ?></td>
                <td><?= esc($u['perfil_id']) ?></td>
                <td><?= esc($u['baja']) ?></td>
                <td>
                    <a href="<?= base_url('usuario/editar/'.$u['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="<?= base_url('usuario/borrar/'.$u['id']) ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('¿Seguro que deseas borrar a <?= esc($u['nombre']) ?>?');">
                       Borrar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-info">
        No hay usuarios registrados.
    </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
