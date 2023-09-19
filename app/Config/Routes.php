<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/asset', 'AssetController::index');
$routes->get('/asset/computer/pdf', 'AssetController::pdfComputer');
$routes->get('/asset/computer/read', 'AssetController::readComputer');
$routes->post('/asset/computer/save', 'AssetController::saveComputer');
$routes->get('/asset/computer/edit/(:num)', 'AssetController::editComputer/$1');
$routes->get('/asset/computer/detail/(:num)', 'AssetController::detailComputer/$1');
$routes->post('/asset/computer/update', 'AssetController::updateComputer');
$routes->delete('/asset/computer/delete/(:num)', 'AssetController::deleteComputer/$1');

$routes->get('/asset/printer/read', 'AssetController::readPrinter');
$routes->post('/asset/printer/save', 'AssetController::savePrinter');
$routes->get('/asset/printer/edit/(:num)', 'AssetController::editPrinter/$1');
$routes->post('/asset/printer/update', 'AssetController::updatePrinter');
$routes->delete('/asset/printer/delete/(:num)', 'AssetController::deletePrinter/$1');
$routes->get('/asset/printer/detail/(:num)', 'AssetController::detailPrinter/$1');

$routes->get('/asset/proyektor/read', 'AssetController::readProyektor');
$routes->post('/asset/proyektor/save', 'AssetController::saveProyektor');
$routes->get('/asset/proyektor/edit/(:num)', 'AssetController::editProyektor/$1');
$routes->post('/asset/proyektor/update', 'AssetController::updateProyektor');
$routes->delete('/asset/proyektor/delete/(:num)', 'AssetController::deleteProyektor/$1');
$routes->get('/asset/proyektor/detail/(:num)', 'AssetController::detailProyektor/$1');
