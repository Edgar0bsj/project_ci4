<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel; // <<<<---- MODEL

class Inicio extends BaseController
{
    private $usuarios;

    public function __construct(){
        $this->usuarios = new UserModel(); // <<<<---- MODEL
    }


    public function index()
    {
        $data = [
            'var_users' => $this->usuarios->findAll(), //aqui foi jogado todo os dados na variavel users
        ];

        return view('Crud/consult', $data); //agora a view recebe os dados
    }
}
