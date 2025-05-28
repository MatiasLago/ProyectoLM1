<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    protected $table = 'usuarios';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'usuario',
        'pass',
        'perfil_id',
        'baja',
    ];

    protected $validationRules = [
        'nombre'   => 'required|min_length[3]',
        'apellido' => 'required|min_length[3]',
        'email'    => 'required|valid_email',
        'usuario'  => 'required|min_length[3]',
        'pass'     => 'required|min_length[6]',
    ];

    public function agregarUsuario(array $data)
    {
        return $this->insert($data);
    }

    public function actualizarUsuario(int $id, array $data): bool
    {
        return (bool) $this->update($id, $data);
    }

    public function borrarUsuario(int $id): bool
    {
        return (bool) $this->delete($id);
    }

    public function obtenerTodos(): array
    {
        return $this->findAll();
    }

    public function obtenerPorId(int $id): ?array
    {
        return $this->find($id);
    }
}