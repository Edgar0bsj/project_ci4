<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'home da área restrita',
        ];
       return view('admin\Home\index', $data);
    }
}
