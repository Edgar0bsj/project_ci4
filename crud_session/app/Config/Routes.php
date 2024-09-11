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
$routes->match(['get','post'],'noticias/inserir', 'Noticias::inserir');
$routes->match(['get','post'],'noticias/gravar', 'Noticias::gravar');
// $routes->match(['get','post'],'noticias/gravar', 'Noticias::teste');
$routes->match(['get','post'],'noticias/editar/(:num)', 'Noticias::editar/$1');
$routes->get('noticias', 'Noticias::index');
$routes->get('noticias/(:segment)', 'Noticias::item/$1');
$routes->get('/', 'Pages::mostrar');
$routes->get('(:any)', 'Pages::mostrar/$1');

