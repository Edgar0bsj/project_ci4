<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaCrud extends Migration
{
    public function up()
    {
        $this->forge->addField([ //criando tabela
            'id'=>[
                'type'=> 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome'=>[
                'type'=> 'VARCHAR',
                'constraint'=> '128',
            ],
            'descricao'=>[
                'type'=> 'VARCHAR',
                'constraint'=> '300',
            ],
            'ativo'=>[
                'type'=> 'BOOLEAN',
                'null'=> false,
                'default' => false,
            ]
        ]);

        $this->forge->addPrimaryKey('id') -> addUniqueKey('nome');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
