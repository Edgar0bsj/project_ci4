<?php
/**
* --------------------------------------------------------------------------
* DATABSE COMANDOS
* --------------------------------------------------------------------------
*
* make:migration Noticias => CRIA A MIGRAÇÃO
* 
* migrate Noticias => CRIA A TABELA NO BANCO DE DADOS
* 
* migrate:rollback => VOLTA A ULTIMA MIGRAÇÃO
*
* migrate:refresh => VAI REFAZER AS MIGRAÇOES
* --------------------------------------------------------------------------
* ATRIBUTOS SQL
* --------------------------------------------------------------------------
*   type => Define o tipo de dado que a coluna armazenará.
*   constraint => Restringe ou define regras sobre os valores que podem ser armazenados na coluna ou na tabela.
*   unsigned => Indica que a coluna de tipo numérico (geralmente INT ou DECIMAL) só armazenará valores positivos.
*   null => Define se uma coluna pode ou não aceitar valores NULL.
*
**/



namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Noticias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'descricao' => [
                'type' => 'text',
                'null' => TRUE,
            ],
            'autor' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('noticias');

    }

    public function down()
    {
        $this->forge->dropTable('noticias');
    }
}
