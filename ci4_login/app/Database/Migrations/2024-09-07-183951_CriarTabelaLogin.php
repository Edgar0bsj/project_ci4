<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaLogin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usuario' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'type' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_usuario', true);
        $this->forge->createTable('login');
    }

    public function down()
    {
        $this->forge->dropTable('login');
    }
}
