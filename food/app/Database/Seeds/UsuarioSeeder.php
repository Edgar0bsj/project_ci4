<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use app\Models\UsuarioModel;

class UsuarioSeeder extends Seeder
{
    public function run()
    {

        $usuarioModel = new \App\Models\UsuarioModel;
        $usuario = [
            "nome"=> "Marcelo vilela de jesus",
            "email"=> "Marcelinho@gmail.com",
            "cpf"=> "033.112.290-10",
            "telefone"=> "21 - 9999-9999",

        ];
        
        $usuarioModel->protect(false)->insert($usuario);



        $usuario = [
            "nome"=> "Edgar barbosa da silva",
            "email"=> "Edgartestando@gmail.com",
            "cpf"=> "851.351.340-77",
            "telefone"=> "21 - 9546-3548",
    
        ];
    
        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}
