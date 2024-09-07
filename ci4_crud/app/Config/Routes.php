<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud\Inicio::index');
$routes->get('deletar/', 'Crud\Inicio::deletar'); //Direcionando para a função deletar
$routes->get('create/', function(){return view('Crud\create');}); //direcionando para pagina
$routes->post('salvar/', 'Crud\Inicio::criarNovoRegistro');
