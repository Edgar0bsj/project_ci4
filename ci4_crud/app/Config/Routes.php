<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud\Inicio::index');
$routes->get('deletar/', 'Crud\Inicio::deletar'); //Direcionando para a função deletar
$routes->get('create/', function(){return view('Crud\create');}); //direcionando para pagina
$routes->post('salvar/', 'Crud\Inicio::criarNovoRegistro');
$routes->get('editar/(:num)', 'Crud\Inicio::editar/$1');  //(:num): Captura apenas números.
$routes->post('editar/(:num)/(:any)', 'Crud\Inicio::editar/$1/$2'); //efetuando alteração
