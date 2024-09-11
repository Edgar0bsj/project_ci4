<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddConlunImg extends Migration
{
    public function up()
    {
        $coluna =[
            'img' => [
                'type' => 'TEXT',
                'null' => true,
                'default' => true,
            ]
        ];

        $this->forge->addColumn('noticias',$coluna);

    }

    public function down()
    {
        $this->forge->dropColumn('noticias', ['img']);
    }
}
