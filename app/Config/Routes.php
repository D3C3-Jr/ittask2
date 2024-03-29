<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index', ['filter' => 'login']);

$routes->get('/asset', 'AssetController::index', ['filter' => 'role:Administrator']);
$routes->get('/asset/computer/read', 'AssetController::readComputer', ['filter' => 'role:Administrator']);
$routes->post('/asset/computer/save', 'AssetController::saveComputer', ['filter' => 'role:Administrator']);
$routes->get('/asset/computer/edit/(:num)', 'AssetController::editComputer/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/computer/detail/(:num)', 'AssetController::detailComputer/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/computer/update', 'AssetController::updateComputer', ['filter' => 'role:Administrator']);
$routes->delete('/asset/computer/delete/(:num)', 'AssetController::deleteComputer/$1', ['filter' => 'role:Administrator']);
$routes->post('/exportExcelComputer', 'AssetController::exportExcelComputer', ['filter' => 'role:Administrator']);


$routes->get('/asset/printer/read', 'AssetController::readPrinter', ['filter' => 'role:Administrator']);
$routes->post('/asset/printer/save', 'AssetController::savePrinter', ['filter' => 'role:Administrator']);
$routes->get('/asset/printer/edit/(:num)', 'AssetController::editPrinter/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/printer/update', 'AssetController::updatePrinter', ['filter' => 'role:Administrator']);
$routes->delete('/asset/printer/delete/(:num)', 'AssetController::deletePrinter/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/printer/detail/(:num)', 'AssetController::detailPrinter/$1', ['filter' => 'role:Administrator']);
$routes->post('/exportExcelPrinter', 'AssetController::exportExcelPrinter', ['filter' => 'role:Administrator']);

$routes->get('/asset/proyektor/read', 'AssetController::readProyektor', ['filter' => 'role:Administrator']);
$routes->post('/asset/proyektor/save', 'AssetController::saveProyektor', ['filter' => 'role:Administrator']);
$routes->get('/asset/proyektor/edit/(:num)', 'AssetController::editProyektor/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/proyektor/update', 'AssetController::updateProyektor', ['filter' => 'role:Administrator']);
$routes->delete('/asset/proyektor/delete/(:num)', 'AssetController::deleteProyektor/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/proyektor/detail/(:num)', 'AssetController::detailProyektor/$1', ['filter' => 'role:Administrator']);
$routes->post('/exportExcelProyektor', 'AssetController::exportExcelProyektor', ['filter' => 'role:Administrator']);

$routes->get('/asset/other/read', 'AssetController::readOther', ['filter' => 'role:Administrator']);
$routes->post('/asset/other/save', 'AssetController::saveOther', ['filter' => 'role:Administrator']);
$routes->get('/asset/other/detail/(:num)', 'AssetController::detailOther/$1', ['filter' => 'role:Administrator']);
$routes->get('/asset/other/edit/(:num)', 'AssetController::editOther/$1', ['filter' => 'role:Administrator']);
$routes->post('/asset/other/update', 'AssetController::updateOther', ['filter' => 'role:Administrator']);
$routes->delete('/asset/other/delete/(:num)', 'AssetController::deleteOther/$1', ['filter' => 'role:Administrator']);
$routes->post('/exportExcelOther', 'AssetController::exportExcelOther', ['filter' => 'role:Administrator']);

$routes->get('/task', 'TaskController::index', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->get('/task/read', 'TaskController::readTask', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->post('/task/save', 'TaskController::saveTask', ['filter' => 'role:Administrator,Manager, Guest']);
$routes->get('/task/detail/(:num)', 'TaskController::detailTask/$1', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->get('/task/edit/(:num)', 'TaskController::editTask/$1', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->post('/task/update', 'TaskController::updateTask', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->delete('/task/delete/(:num)', 'TaskController::deleteTask/$1', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->post('/exportExcelTask', 'TaskController::exportExcelTask', ['filter' => 'role:Administrator, Manager, Guest']);

$routes->get('/task/readTicketOpen', 'TaskController::readTicketOpen', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->get('/task/readTicketProses', 'TaskController::readTicketProses', ['filter' => 'role:Administrator, Manager, Guest']);


$routes->get('/itrs', 'ItrsController::index', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->get('/itrs/read', 'ItrsController::readItrs', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->post('/itrs/save', 'ItrsController::saveItrs', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->get('/itrs/detail/(:num)', 'ItrsController::detailItrs/$1', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->get('/itrs/edit/(:num)', 'ItrsController::editItrs/$1', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->post('/itrs/update', 'ItrsController::updateItrs', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->delete('/itrs/delete/(:num)', 'ItrsController::deleteItrs/$1', ['filter' => 'role:Administrator, Manager, Guest']);
$routes->post('/exportExcelItrs', 'ItrsController::exportExcelItrs', ['filter' => 'role:Administrator, Manager, Guest']);

$routes->get('/kategori_itrs', 'KategoriItrsController::index', ['filter' => 'role:Administrator']);
$routes->get('/kategori_itrs/read', 'KategoriItrsController::readKategoriItrs', ['filter' => 'role:Administrator']);
$routes->post('/kategori_itrs/save', 'KategoriItrsController::saveKategoriItrs', ['filter' => 'role:Administrator']);
$routes->get('/kategori_itrs/detail/(:num)', 'KategoriItrsController::detailKategoriItrs/$1', ['filter' => 'role:Administrator']);
$routes->get('/kategori_itrs/edit/(:num)', 'KategoriItrsController::editKategoriItrs/$1', ['filter' => 'role:Administrator']);
$routes->post('/kategori_itrs/update', 'KategoriItrsController::updateKategoriItrs', ['filter' => 'role:Administrator']);
$routes->delete('/kategori_itrs/delete/(:num)', 'KategoriItrsController::deleteKategoriItrs/$1', ['filter' => 'role:Administrator']);

$routes->get('/departemen', 'DepartemenController::index', ['filter' => 'role:Administrator']);
$routes->get('/departemen/read', 'DepartemenController::readDepartemen', ['filter' => 'role:Administrator']);
$routes->post('/departemen/save', 'DepartemenController::saveDepartemen', ['filter' => 'role:Administrator']);
$routes->get('/departemen/detail/(:num)', 'DepartemenController::detailDepartemen/$1', ['filter' => 'role:Administrator']);
$routes->get('/departemen/edit/(:num)', 'DepartemenController::editDepartemen/$1', ['filter' => 'role:Administrator']);
$routes->post('/departemen/update', 'DepartemenController::updateDepartemen', ['filter' => 'role:Administrator']);
$routes->delete('/departemen/delete/(:num)', 'DepartemenController::deleteDepartemen/$1', ['filter' => 'role:Administrator']);

$routes->get('/user', 'UserController::index', ['filter' => 'role:Administrator']);
$routes->get('/user/read', 'UserController::readUser', ['filter' => 'role:Administrator']);
$routes->post('/user/save', 'UserController::saveUser', ['filter' => 'role:Administrator']);
$routes->get('/user/detail/(:num)', 'UserController::detailUser/$1', ['filter' => 'role:Administrator']);
$routes->get('/user/edit/(:num)', 'UserController::editUser/$1', ['filter' => 'role:Administrator']);
$routes->post('/user/update', 'UserController::updateUser', ['filter' => 'role:Administrator']);
$routes->delete('/user/delete/(:num)', 'UserController::deleteUser/$1', ['filter' => 'role:Administrator']);

$routes->get('/groupUsers/read', 'UserController::readGroupUsers', ['filter' => 'role:Administrator']);
$routes->post('/groupUsers/save', 'UserController::saveGroupUsers', ['filter' => 'role:Administrator']);
$routes->get('/groupUsers/detail/(:num)', 'UserController::detailGroupUsers/$1', ['filter' => 'role:Administrator']);
$routes->get('/groupUsers/edit/(:num)', 'UserController::editGroupUsers/$1', ['filter' => 'role:Administrator']);
$routes->post('/groupUsers/update', 'UserController::updateGroupUsers', ['filter' => 'role:Administrator']);
$routes->delete('/groupUsers/delete/(:num)', 'UserController::deleteGroupUsers/$1', ['filter' => 'role:Administrator']);
$routes->get('/user/listUser', 'UserController::listUser', ['filter' => 'role:Administrator']);

$routes->get('/stok', 'StokController::index', ['filter' => 'role:Administrator']);
$routes->get('/stok/read', 'StokController::readStok', ['filter' => 'role:Administrator']);
$routes->post('/stok/save', 'StokController::saveStok', ['filter' => 'role:Administrator']);
$routes->get('/stok/detail/(:num)', 'StokController::detailStok/$1', ['filter' => 'role:Administrator']);
$routes->get('/stok/edit/(:num)', 'StokController::editStok/$1', ['filter' => 'role:Administrator']);
$routes->post('/stok/update', 'StokController::updateStok', ['filter' => 'role:Administrator']);
$routes->delete('/stok/delete/(:num)', 'StokController::deleteStok/$1', ['filter' => 'role:Administrator']);
$routes->post('/exportExcelStok', 'StokController::exportExcel', ['filter' => 'role:Administrator']);

$routes->get('/lisensi', 'LisensiController::index', ['filter' => 'role:Administrator']);
$routes->get('/lisensi/read', 'LisensiController::readLisensi', ['filter' => 'role:Administrator']);
$routes->post('/lisensi/save', 'LisensiController::saveLisensi', ['filter' => 'role:Administrator']);
$routes->get('/lisensi/detail/(:num)', 'LisensiController::detailLisensi/$1', ['filter' => 'role:Administrator']);
$routes->get('/lisensi/edit/(:num)', 'LisensiController::editLisensi/$1', ['filter' => 'role:Administrator']);
$routes->post('/lisensi/update', 'LisensiController::updateLisensi', ['filter' => 'role:Administrator']);
$routes->delete('/lisensi/delete/(:num)', 'LisensiController::deleteLisensi/$1', ['filter' => 'role:Administrator']);
$routes->post('/exportExcelLisensi', 'LisensiController::exportExcel', ['filter' => 'role:Administrator']);
