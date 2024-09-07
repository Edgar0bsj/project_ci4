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

    // --------------------VISUALIZAR REGISTROS-------------------------------------

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


    // -------------------------------------------------------------------------
    // --------------------DELETAR REGISTRO-------------------------------------
    public function deletar()
    {
        $id = $_GET['id'];     //Capturando o id
        $data = ['mensagem' => 'Usuário excluído com sucesso!'];

        if ($this->usuarios->delete($id)) {
            echo view('Mensagem/mensagem', $data);
        } else {
            $data['mensagem'] = 'ERRO!';
            echo view('Mensagem/mensagem', $data);
            ;
        }
    }
    // -------------------------------------------------------------------------

    // --------------------NOVO REGISTRO-------------------------------------
    public function criarNovoRegistro()
    {
        //**********Criando uma lista com os dados capturados********* */
        $lista_de_dados = [
            'nome' => $_POST['user_name'],
            'descricao' => $_POST['user_description']
        ];
        //************************************************************* */
        //**************Salvando no Banco de dados********************* */        
        if ($this->usuarios->save($lista_de_dados)) {
            session()->setFlashdata('sucesso', 'Item excluído com sucesso!');

            return view('Mensagem/mensagem',['mensagem'=>'Item adicionado com sucesso!']);
        }
        //************************************************************* */


    }



    // -------------------------------------------------------------------------


}
