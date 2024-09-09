<?php

use CodeIgniter\Router\RouteCollection;
/**
* --------------------------------------------------------------------------
* rotas com parâmetro
* --------------------------------------------------------------------------
* pages/mostrar/(:segment) => para qualquer segmento de URL (números, letras, etc.).
* pages/mostrar/(:num) => rota para números.
*------
* Pages::mostrar/$1 => $1 diz que vai receber um parâmetro
* Pages::mostrar/$1/$2 => $1, $2 diz que vai receber dois parâmetro
*
**/

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pages/mostrar', 'Pages::mostrar');
$routes->get('pages/mostrar/(:segment)', 'Pages::mostrar/$1');
