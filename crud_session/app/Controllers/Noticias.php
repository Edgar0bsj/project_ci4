<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiaModel;

class Noticias extends BaseController
{
    private $model;
    public function __construct()
    {
        $this->model = new NoticiaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Últimas notícias',
            'noticias' => $this->getNoticias(),
            'session' => \Config\Services::session()
        ];


        echo view('templates/header', $data);
        echo view('pages/noticias', $data);
        echo view('templates/footer');
    }

    /**
     * --------------------------------------------------------------------------
     * getNoticias lógica
     * --------------------------------------------------------------------------
     *   asArray(): Converte o resultado em um array em vez de um objeto.
     *
     *   where(['id' => $id]): Adiciona uma condição WHERE que filtra os registros onde o campo id é igual ao valor da  *   variável $id.
     *
     *   first(): Retorna o primeiro resultado encontrado.
     *
     *   findAll(): Busca todos os registros.
     *   findAll($limite, $offset): Busca um número limitado de registros a partir de um ponto específico.
     *
     **/
    protected function getNoticias($id = false)
    {
        if ($id === false) {
            return $this->model->findAll();
        } else {
            return $this->model->asArray()
                ->where(['id' => $id])
                ->first();
        }
    }

    public function item($id = NULL)
    {
        $data = [
            'session' => \Config\Services::session(),
            'noticias' => $this->getNoticias($id),
        ];


        if (empty($data['noticias'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com o ID: ' . $id);
        }
        $data['title'] = $data['noticias']['titulo'];

        echo view('templates/header', $data);
        echo view('pages/noticia', $data);
        echo view('templates/footer');

    }


    public function inserir()
    {
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }



        helper('form'); //regras de formulário estão aqui
        $data = ['title' => 'Inserir Notícias'];

        echo view('templates/header', $data);
        echo view('pages/noticias_gravar');
        echo view('templates/footer');
    }
    public function editar($id = NULL)
    {
        $data = [
            'title' => 'Editar Notícias',
            'noticias' => $this->getNoticias($id),
            'session' => \Config\Services::session()
        ];

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        if (empty($data['noticias'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com o ID: ' . $id);
        }
        // return dd($data);
        echo view('templates/header', $data);
        echo view('pages/noticias_gravar', $data);
        echo view('templates/footer');

    }



    public function gravar($edit_id = null)
    {
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        helper('form');

        if (
            $this->validate([
                'titulo' => ['label' => 'Título', 'rules' => 'required|min_length[3]|max_length[100]'],
                'autor' => ['label' => 'Autor', 'rules' => 'required|min_length[3]|max_length[100]'],
                'descricao' => ['label' => 'Descrição', 'rules' => 'required|min_length[3]']
            ])
        ) {

            $this->model->save([
                'id' => $this->request->getVar('id'),
                'titulo' => $this->request->getVar('titulo'),
                'autor' => $this->request->getVar('autor'),
                'descricao' => $this->request->getVar('descricao'),
            ]);


            return redirect('noticias');

        } else {
            $data['title'] = 'Erro ao Gravar a Notícia';
            echo view('templates/header', $data);
            echo view('pages/noticias_gravar');
            echo view('templates/footer');
        }
    }
    public function excluir($id = NULL){
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }
        
        $this->model->delete($id);

        return redirect('noticias');
    
    }

    public function logout(){
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect('login');
    }


}
