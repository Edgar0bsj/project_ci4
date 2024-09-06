<?php

namespace App\Controllers\Crud;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Inicio extends BaseController
{
    public function index()
    {
        return view('Crud/edit');
    }
}
