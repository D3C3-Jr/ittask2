<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/asset', 'AssetController::index');
$routes->get('/asset/computer/read', 'AssetController::readComputer');
