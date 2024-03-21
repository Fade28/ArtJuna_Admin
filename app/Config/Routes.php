<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->get('/', 'AuthController::index');
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Admin
$routes->get('/Admin', 'Home::index');
//sanggar
$routes->get('/data-Sanggar', 'Home::Sanggar');
$routes->get('/tamsanggar', 'Home::tambahSanggar');
$routes->post('/simsanggar', 'Home::simpanSanggar');
$routes->get('/ubsanggar/(:any)', 'Home::ubahSanggar/$1');
$routes->post('/simubah', 'Home::simubahSanggar');
$routes->post('/hapsanggar', 'Home::hapusSanggar');
//Pengguna
$routes->get('/data-Pengguna', 'Home::Pengguna');
$routes->get('/tampengguna', 'Home::tambahPengguna');
$routes->post('/simpengguna', 'Home::simpanPengguna');
$routes->get('/ubpengguna/(:any)', 'Home::ubahPengguna/$1');
$routes->post('/simubahpengguna', 'Home::simubahPengguna');
$routes->post('/happengguna', 'Home::hapusPengguna');
//Transaksi
$routes->get('/data-Transaksi', 'Home::Transaksi');
//budaya
$routes->get('/Budaya', 'Home::Budaya');
$routes->get('/tambudaya', 'Home::tambahBudaya');
$routes->post('/simbudaya', 'Home::simpanBudaya');
$routes->get('/ubbudaya/(:any)', 'Home::ubahBudaya/$1');
$routes->post('/hapbudaya', 'Home::hapusBudaya');
//settings
$routes->get('/setAdmin', 'Home::setAdmin');
$routes->post('/ubahfotoAdmin', 'Home::ubahFoto');
$routes->post('/ubahprofilAdmin', 'Home::ubahProfil');


//Sanggar
$routes->get('/Sanggar', 'Sanggar::index');
//produk
$routes->get('/Produk', 'Sanggar::produk');
$routes->get('/tamproduk', 'Sanggar::tambahProduk');
$routes->post('/simproduk', 'Sanggar::simpanProduk');
$routes->get('/ubproduk/(:any)', 'Sanggar::ubahProduk/$1');
$routes->post('/happroduk', 'Sanggar::hapusProduk');
//transaksi
$routes->get('/Transaksi', 'Sanggar::transaksi');
$routes->post('/simtransaksi', 'Sanggar::simpanTransaksi');
$routes->get('/ubtrans/(:any)', 'Sanggar::ubahTransaksi/$1');
$routes->post('/haptransaksi', 'Sanggar::hapusTransaksi');
//pesan
$routes->get('/Pesan', 'Sanggar::pesan');
$routes->post('/kirimpesan', 'Sanggar::kirimPesan');
$routes->get('/detailpesan/(:any)', 'Sanggar::detailPesan/$1');
$routes->post('/happesan', 'Sanggar::hapusPesan');
//settings
$routes->get('/setProfil', 'Sanggar::setProfil');
$routes->post('/ubahfoto', 'Sanggar::ubahFoto');
$routes->post('/ubahprofil', 'Sanggar::ubahProfil');

//Function
$routes->post('/upfoto', 'Home::uploadFoto');
$routes->post('/upfotobudaya', 'Home::uploadFotoBudaya');
$routes->post('/upfotoproduk', 'Sanggar::uploadFoto');

//Auth
$routes->get('/masuk', 'AuthController::index');
$routes->get('/logout', 'AuthController::keluar');
$routes->post('/login', 'AuthController::verSanggar');
$routes->get('/daftar', 'AuthController::daftar');
$routes->post('/tamsanggar', 'AuthController::tambahSanggar');

//API
$routes->post('apimasuk', 'API\apiLogin::apimasuk');
$routes->resource('API/apiProduk');
$routes->resource('API/apiSanggar');
$routes->resource('API/apiTransaksi');
$routes->resource('API/apiPesan');
$routes->resource('API/apiPesanDetail');
$routes->resource('API/apiBudaya');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}