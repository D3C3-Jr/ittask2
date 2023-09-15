<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/asset', 'AssetController::index');
$routes->get('/asset/computer/read', 'AssetController::readComputer');
$routes->post('/asset/computer/save', 'AssetController::saveComputer');
$routes->get('/asset/computer/edit/(:num)', 'AssetController::editComputer/$1');
$routes->post('/asset/computer/update', 'AssetController::updateComputer');
$routes->delete('/asset/computer/delete/(:num)', 'AssetController::deleteComputer/$1');
