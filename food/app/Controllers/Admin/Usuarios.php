<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{

    private $usuarioModel; //criando variavel para trabalhar com database

    public function __construct(){
        $this -> usuarioModel = new \App\Models\UsuarioModel(); //instanciando a váriavel criada
    }


    public function index()
    {
        $data = [
            'titulo'=> 'Listando os usuários',
            'usuarios'=> $usuario = $this->usuarioModel->findAll(0,-1), //pegando todos os registro,pode ser usado com o ->orderBy('nome', 'ASC') para ordenar
        ];


        

        return view('Admin/Usuarios/index', $data);
    }

    public function procurar() {

        if(!$this->request->isAJAX()){
            exit('Página não encontrada');
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach($usuarios as $usuario){
            $data['id'] = $usuario->id;
            $data['value'] = $usuario->nome;

            $retorno[] = $data;

        }

        return $this->response->setJSON($retorno);


        print_r($this->request->getGet());
        exit;
    }
    

    public function show($id = null){
        $usuario = $this->buscarUsuarioOu404($id);


        dd($usuario);



    }
    private function buscarUsuarioOu404(int $id = null){
        if(!$id || !$usuario = $this->usuarioModel->where('id',$id)->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
        }

        return $usuario;
    }


}
