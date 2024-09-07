<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud\Inicio::index');
$routes->get('deletar/', 'Crud\Inicio::deletar');
