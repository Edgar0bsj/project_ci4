<?php
/**
* --------------------------------------------------------------------------
*   SEEDS ANOTAÇOES
* --------------------------------------------------------------------------
* cmd => php spark make:seeder Noticia
*
* cmd => php spark db:seed noticia
*
**/

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Noticia extends Seeder
{
    public function run()
    {
        $data = [
            'titulo' => 'Titulo da notícia 1',
            'descricao' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quidem assumenda accusamus sapiente enim est accusantium ea dolorem, cum magnam aliquam blanditiis voluptatibus quo adipisci illum dolore doloribus voluptatem qui.',
            'autor' => 'Ermeson Carvalho',

        ];

        $this->db->table('noticias')->insert($data);

    }
}
