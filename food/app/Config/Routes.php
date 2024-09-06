<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'admin\Home::index');
$routes->get('admin/home/', 'admin\Home::index');
$routes->get('admin/usuarios/', 'admin\Usuarios::index');
$routes->get('admin/usuarios/procurar', 'admin\Usuarios::procurar');
