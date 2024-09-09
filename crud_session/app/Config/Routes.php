<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pages/mostrar', 'Pages::mostrar');
$routes->get('pages/mostrar/(:segment)', 'Pages::mostrar/$1');
