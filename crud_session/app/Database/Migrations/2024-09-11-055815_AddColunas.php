<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColunas extends Migration
{
    public function up()
    {
        $colunas = [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],

        ];
        $this->forge->addColumn('noticias',$colunas);
    }

    public function down()
    {
        $this->forge->dropColumn('noticias', ['created_at', 'updated_at','deleted_at']);
    }
}
