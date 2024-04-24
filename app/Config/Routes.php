<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('crud', 'CrudController::index');

$routes->get('/task1', 'task1::index');

$routes->setAutoRoute(true);
