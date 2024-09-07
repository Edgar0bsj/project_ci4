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

            return view('Mensagem/mensagem',['mensagem'=>'Item adicionado com sucesso!']);
        }else {
            return view('Mensagem/mensagem',['mensagem'=>'Erro!']);
        }
        //************************************************************* */
    }

    public function editar($id, $edit=false){ // Em routes capturamos o valor da variavel
        if ($edit==false) { //parametro retornando false ira pro formulário

            // resultado do find(ID) é uma lista com todas as coluna referente ao ID
            $user = $this->usuarios->find($id); 
            return view('Crud/edit',$user); //passando os dados para view
            //lembrando que a variavel $user é uma lista

        }elseif ($edit==true) { //parametro retornando true irá efetua a alteração

                // 'user_nome' => $this->request->getGetPost('name'),
                // 'user_descrip' => $this->request->getGetPost('description'),


            $user_db = $this->usuarios->find($id);
            $user_db['nome'] = $this->request->getGetPost('name');
            $user_db['descricao'] = $this->request->getGetPost('description');

            $this->usuarios->save($user_db);
            return view('Mensagem/mensagem',['mensagem'=>$user_db['nome'].' alterado com sucesso!']);

            
        } else{
            return view('Mensagem/mensagem',['mensagem'=>'Erro!']);
        }

    }


    // -------------------------------------------------------------------------


}
