<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->obtenerTodos();
        return view('usuarios/lista', $data);
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function crear()
    {
        return view('usuarios/agregarusuario');
    }

    /**
     * Procesa los datos enviados desde el formulario de creación.
     */
    public function guardar()
    {
        $model = new UsuarioModel();
        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'apellido'  => $this->request->getPost('apellido'),
            'email'     => $this->request->getPost('email'),
            'usuario'   => $this->request->getPost('usuario'),
            'pass'      => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'perfil_id' => $this->request->getPost('perfil_id'),
            'baja'      => $this->request->getPost('baja'),
        ];

        $model->agregarUsuario($data);
        return redirect()->to('/usuario');
    }

    public function editar($id)
    {
        $model = new UsuarioModel();
        $data['usuario'] = $model->obtenerPorId($id);

        if (empty($data['usuario'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado: ' . $id);
        }

        return view('usuarios/editarusuario', $data);
    }

    public function actualizar()
    {
        $model = new UsuarioModel();
        $id = $this->request->getPost('id');

        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'apellido'  => $this->request->getPost('apellido'),
            'email'     => $this->request->getPost('email'),
            'usuario'   => $this->request->getPost('usuario'),
            // Si se ingresa nueva contraseña
            'pass'      => $this->request->getPost('pass')
                ? password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT)
                : $model->obtenerPorId($id)['pass'],
            'perfil_id' => $this->request->getPost('perfil_id'),
            'baja'      => $this->request->getPost('baja'),
        ];

        $model->actualizarUsuario($id, $data);
        return redirect()->to('/usuario');
    }

    public function borrar($id)
    {
        $model = new UsuarioModel();
        $model->borrarUsuario($id);
        return redirect()->to('/usuario');
    }
}
