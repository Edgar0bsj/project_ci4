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

    public function login()
    {
        // capturando dados do usuario
        $user = $this->request->getVar('user');
        $senha = $this->request->getVar('senha');
        // -----------------------------


        // Criando variaveis de acesso
        $data['usuarios'] = $this->getUsuarios($user, $senha); // saida:array(id,user,senha)
        $data['session'] = \Config\Services::session();  // saida: array( vazio )
        // -----------------------------



        // verificando se na variável usuario voltou com informacoes do banco de dados
        if (empty($data['usuarios'])) { //se estiver vazio = TRUE
            return redirect('login');

        } else {  // se volta com os dados [id, user, senha]

            $sessionData = [  //variável que irá receber as informaçoes da sessão
                'user' => $user,
                'logged_in' => TRUE 
            ];

            $data['session']->set($sessionData);  //startando a sessão

            return redirect('noticias');
        }
        // -----------------------------
    }

}
