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
            'title' => 'Login',
            'session' => \Config\Services::session()

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
        $data['session'] = \Config\Services::session();

        if (empty($data['usuarios'])) {
            return redirect('login');
        }else {
            $sessionData = [
                'user' => $user,
                'logged_in' => TRUE //variavel que vai dizer se esta logado ou não
            ];
            $data['session']->set($sessionData);

            return redirect('noticias');
        }
    }

}
