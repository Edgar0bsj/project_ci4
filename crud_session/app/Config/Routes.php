<?php

use CodeIgniter\Router\RouteCollection;
/**
* --------------------------------------------------------------------------
* rotas com parâmetro
* --------------------------------------------------------------------------
* pages/mostrar/(:any) => para qualquer segmento de URL (números, letras, etc.).
* pages/mostrar/(:num) => rota para números.
*------
* Pages::mostrar/$1 => $1 diz que vai receber um parâmetro
* Pages::mostrar/$1/$2 => $1, $2 diz que vai receber dois parâmetro
*
**/

/**
 * @var RouteCollection $routes
 */
$routes->get('noticias', 'Noticias::index');
$routes->get('noticias/(:segment)', 'Noticias::item/$1');
$routes->get('/', 'Pages::mostrar');
$routes->get('(:any)', 'Pages::mostrar/$1');

