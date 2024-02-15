<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('addUser', 'Home::addUser');


$routes->post('addUsers', 'Home::addUsers');




$routes->get('editUser/(:num)', 'Home::editUser/$1');


$routes->post('updateUserData/(:num)', 'Home::updateUserData/$1');



$routes->get('fetchStates/(:num)', 'Home::getStates/$1');

$routes->get('fetchCities/(:num)', 'Home::getCities/$1');


$routes->get('findCountry/(:num)', 'Home::findCountry/$1');

$routes->get('findState/(:num)', 'Home::findState/$1');

$routes->get('findCity/(:num)', 'Home::findCity/$1');



