<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UsuariosModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer');
    }

    public function getUsuarios($user, $senha)
    {
        return $this->userModel
            ->asArray()
            ->where(['user' => $user, 'senha' => md5($senha)])
            ->first();

    }

    public function login(){
        $user = $this->request->getVar('user');
        $senha = $this->request->getVar('senha');

        $data['usuarios'] = $this->getUsuarios($user,$senha);

        if (empty($data['usuarios'])) {
            return redirect('login');
        }else {
            return redirect('noticias');
        }
    }

}
