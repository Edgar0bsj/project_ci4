<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

        /**
     * --------------------------------------------------------------------------
     * public function mostrar
     * --------------------------------------------------------------------------
     *
     * is_file() => verifica se o caminho fornecido corresponde a um arquivo existente no sistema de arquivos.
     * 
     * APPPATH => é uma constante do CodeIgniter que aponta para o diretório app/ do projeto.
     * 
     * 'Views/pages/'.$page.'.php' => é o caminho relativo dentro do diretório de views onde o arquivo da página está localizado.
     * ----------------------------
     * throw => é usada para lançar uma exceção.
     * PageNotFoundException é uma classe de exceção específica do CodeIgniter 4. Ela está localizada no namespace
     * 
     **/
    public function mostrar($page = 'home'){
        if (!is_file(APPPATH.'Views/pages/'.$page.'.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data =[
            'title' => ucfirst($page)
        ];

        echo view('templates/header', $data);
        echo view('pages/'.$page);
        echo view('templates/footer');
    }


}
