<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {

        $data = [
            'user' => 'admin',
            'senha'    => md5('123'),     
            ];

        $this->db->table('usuarios')->insert($data);
    }
}
