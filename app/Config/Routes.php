<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/page_error' . random_bytes(10), 'HomeController::pageError');
$routes->get('/', 'HomeController::index', ['filter' => 'login']);

$routes->get('/asset', 'AssetController::index', ['filter' => 'role:Administrator']);
$routes->get('/pdfComputer', 'AssetController::pdfComputer', ['filter' => 'role:Administrator']);
$routes->get('/asset/computer/read', 'AssetController::readComputer', ['filter' => 'role:Administrator']);
$routes->post('/asset/computer/save', 'AssetController::saveComputer', ['filter' => 'role:Administrator']);
$routes->get('/asset/computer/edit/(:num)', 'AssetController::editComputer/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/computer/detail/(:num)', 'AssetController::detailComputer/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/computer/update', 'AssetController::updateComputer', ['filter' => 'role:Administrator']);
$routes->delete('/asset/computer/delete/(:num)', 'AssetController::deleteComputer/$1', ['filter' => 'role:Administrator']);

$routes->get('/asset/printer/read', 'AssetController::readPrinter', ['filter' => 'role:Administrator']);
$routes->post('/asset/printer/save', 'AssetController::savePrinter', ['filter' => 'role:Administrator']);
$routes->get('/asset/printer/edit/(:num)', 'AssetController::editPrinter/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/printer/update', 'AssetController::updatePrinter', ['filter' => 'role:Administrator']);
$routes->delete('/asset/printer/delete/(:num)', 'AssetController::deletePrinter/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/printer/detail/(:num)', 'AssetController::detailPrinter/$1', ['filter' => 'role:Administrator']);

$routes->get('/asset/proyektor/read', 'AssetController::readProyektor', ['filter' => 'role:Administrator']);
$routes->post('/asset/proyektor/save', 'AssetController::saveProyektor', ['filter' => 'role:Administrator']);
$routes->get('/asset/proyektor/edit/(:num)', 'AssetController::editProyektor/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/proyektor/update', 'AssetController::updateProyektor', ['filter' => 'role:Administrator']);
$routes->delete('/asset/proyektor/delete/(:num)', 'AssetController::deleteProyektor/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/proyektor/detail/(:num)', 'AssetController::detailProyektor/$1', ['filter' => 'role:Administrator']);

$routes->get('/asset/other/read', 'AssetController::readOther', ['filter' => 'role:Administrator']);
$routes->post('/asset/other/save', 'AssetController::saveOther', ['filter' => 'role:Administrator']);
$routes->get('/asset/other/detail/(:num)', 'AssetController::detailOther/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/other/edit/(:num)', 'AssetController::editOther/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/other/update', 'AssetController::updateOther', ['filter' => 'role:Administrator']);
$routes->delete('/asset/other/delete/(:num)', 'AssetController::deleteOther/$1', ['filter' => 'role:Administrator']);

$routes->get('/task', 'TaskController::index', ['filter' => 'role:Administrator']);
$routes->get('/task/read', 'TaskController::readTask', ['filter' => 'role:Administrator']);
$routes->post('/task/save', 'TaskController::saveTask', ['filter' => 'role:Administrator']);
$routes->get('/task/detail/(:num)', 'TaskController::detailTask/$1', ['filter' => 'role:Administrator']);
$routes->get('/task/edit/(:num)', 'TaskController::editTask/$1', ['filter' => 'role:Administrator']);
$routes->post('/task/update', 'TaskController::updateTask', ['filter' => 'role:Administrator']);
$routes->delete('/task/delete/(:num)', 'TaskController::deleteTask/$1', ['filter' => 'role:Administrator']);

$routes->get('/departemen', 'DepartemenController::index', ['filter' => 'role:Administrator']);
$routes->get('/departemen/read', 'DepartemenController::readDepartemen', ['filter' => 'role:Administrator']);
$routes->post('/departemen/save', 'DepartemenController::saveDepartemen', ['filter' => 'role:Administrator']);
$routes->get('/departemen/detail/(:num)', 'DepartemenController::detailDepartemen/$1', ['filter' => 'role:Administrator']);
$routes->get('/departemen/edit/(:num)', 'DepartemenController::editDepartemen/$1', ['filter' => 'role:Administrator']);
$routes->post('/departemen/update', 'DepartemenController::updateDepartemen', ['filter' => 'role:Administrator']);
$routes->delete('/departemen/delete/(:num)', 'DepartemenController::deleteDepartemen/$1', ['filter' => 'role:Administrator']);

$routes->get('/stok', 'StokController::index', ['filter' => 'role:Administrator']);
$routes->get('/stok/read', 'StokController::readStok', ['filter' => 'role:Administrator']);
$routes->post('/stok/save', 'StokController::saveStok', ['filter' => 'role:Administrator']);
$routes->get('/stok/detail/(:num)', 'StokController::detailStok/$1', ['filter' => 'role:Administrator']);
$routes->get('/stok/edit/(:num)', 'StokController::editStok/$1', ['filter' => 'role:Administrator']);
$routes->post('/stok/update', 'StokController::updateStok', ['filter' => 'role:Administrator']);
$routes->delete('/stok/delete/(:num)', 'StokController::deleteStok/$1', ['filter' => 'role:Administrator']);
