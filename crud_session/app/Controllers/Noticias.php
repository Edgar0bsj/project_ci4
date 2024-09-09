<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiaModel;

class Noticias extends BaseController
{
    private $model;
    public function __construct(){
        $this->model = new NoticiaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Últimas notícias',
            'noticias' => $this->getNoticias(),
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
    protected function getNoticias($id = false){
        if($id === false){
            return $this->model->findAll();
        } else {
            return $this->model->asArray()
            ->where(['id' => $id]) 
            -> first();
        }
    }

    public function item($id= NULL){
        $data =['noticias' => $this->getNoticias($id),];

        if(empty($data['noticias'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com o ID: '.$id);
        }
        $data['title'] = $data['noticias']['titulo'];

        echo view('templates/header', $data);
        echo view('pages/noticia', $data);
        echo view('templates/footer');
    }






}
