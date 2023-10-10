<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/asset', 'AssetController::index');

$routes->get('/pdfComputer', 'AssetController::pdfComputer');
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

$routes->get('/asset/other/read', 'AssetController::readOther');
$routes->post('/asset/other/save', 'AssetController::saveOther');
$routes->get('/asset/other/detail/(:num)', 'AssetController::detailOther/$1');
$routes->get('/asset/other/edit/(:num)', 'AssetController::editOther/$1');
$routes->post('/asset/other/update', 'AssetController::updateOther');
$routes->delete('/asset/other/delete/(:num)', 'AssetController::deleteOther/$1');

$routes->get('/task', 'TaskController::index');
$routes->get('/task/read', 'TaskController::readTask');
$routes->post('/task/save', 'TaskController::saveTask');
$routes->get('/task/detail/(:num)', 'TaskController::detailTask/$1');
$routes->get('/task/edit/(:num)', 'TaskController::editTask/$1');
$routes->post('/task/update', 'TaskController::updateTask');
$routes->delete('/task/delete/(:num)', 'TaskController::deleteTask/$1');

$routes->get('/departemen', 'DepartemenController::index');
$routes->get('/departemen/read', 'DepartemenController::readDepartemen');
$routes->post('/departemen/save', 'DepartemenController::saveDepartemen');
$routes->get('/departemen/detail/(:num)', 'DepartemenController::detailDepartemen/$1');
$routes->get('/departemen/edit/(:num)', 'DepartemenController::editDepartemen/$1');
$routes->post('/departemen/update', 'DepartemenController::updateDepartemen');
$routes->delete('/departemen/delete/(:num)', 'DepartemenController::deleteDepartemen/$1');
