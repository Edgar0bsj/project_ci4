<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel; // <<<<---- MODEL

class Inicio extends BaseController
{
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new UserModel(); // <<<<---- MODEL
    }


    public function index()
    {
        $data = [
            'var_users' => $this->usuarios->orderby('id', 'nome')->paginate(3), //aqui foi jogado todo os dados na variavel users
            'pagina' => $this->usuarios->pager, //essa variavel vai recer os links de pagina
        ];

        // findAll()   --trazer todos os regristro
        // paginate(int)  --trazer uma quantidade especifica de registro
        // orderby('id')  --ordena

        return view('Crud/consult', $data); //agora a view recebe os dados
    }

    public function deletar()
    {
        $id = $_GET['id'];
        $data = ['mensagem' => 'Usuário excluído com sucesso!'];

        if ($this->usuarios->delete($id)) {
            echo view('Mensagem/mensagem', $data);
        } else {
            echo 'ERRO!';
        }

    }




}
