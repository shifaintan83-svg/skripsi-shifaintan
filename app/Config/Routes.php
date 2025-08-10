<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Website::index');
$routes->get('/contact-web', 'Website::contact');
$routes->get('/services-web', 'Website::services');
$routes->get('/myorder-web', 'Website::myorder');
$routes->get('/pesan/(:num)', 'Website::pesan/$1');
$routes->post('/pesan_action', 'Website::pesan_action');
$routes->get('/delete_myorder/(:num)', 'Website::delete_myorder/$1');
$routes->get('/pembayaran/(:num)', 'Website::pembayaran/$1');
$routes->get('/update_pembayaran/(:num)', 'Website::update_pembayaran/$1');




$routes->get('/login', 'Home::index');
$routes->post('/login_action', 'Home::login');
$routes->get('/register', 'Home::register');
$routes->post('/register_action', 'Home::register_action');
$routes->get('/logout', 'Home::logout');


$routes->get('/profilepengguna', 'Pengguna::profile',['filter' => 'authfilter']);
$routes->post('/change_profile', 'Pengguna::change_profile',['filter' => 'authfilter']);
$routes->post('/change_password', 'Pengguna::change_password',['filter' => 'authfilter']);

$routes->get('/pengguna', 'Pengguna::index',['filter' => 'authfilter']);
$routes->get('/add_pengguna', 'Pengguna::create',['filter' => 'authfilter']);
$routes->post('/add_action_pengguna', 'Pengguna::create_action',['filter' => 'authfilter']);
$routes->get('/update_pengguna/(:num)', 'Pengguna::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_pengguna', 'Pengguna::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_pengguna/(:num)', 'Pengguna::delete/$1',['filter' => 'authfilter']);

$routes->get('/level', 'Level::index',['filter' => 'authfilter']);
$routes->get('/add_level', 'Level::create',['filter' => 'authfilter']);
$routes->post('/add_action_level', 'Level::create_action',['filter' => 'authfilter']);
$routes->get('/update_level/(:num)', 'Level::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_level', 'Level::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_level/(:num)', 'Level::delete/$1',['filter' => 'authfilter']);

$routes->get('/pelanggan', 'Pelanggan::index',['filter' => 'authfilter']);
$routes->get('/add_pelanggan', 'Pelanggan::create',['filter' => 'authfilter']);
$routes->post('/add_action_pelanggan', 'Pelanggan::create_action',['filter' => 'authfilter']);
$routes->get('/update_pelanggan/(:num)', 'Pelanggan::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_pelanggan', 'Pelanggan::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_pelanggan/(:num)', 'Pelanggan::delete/$1',['filter' => 'authfilter']);

$routes->get('/tenaga', 'Tenaga::index',['filter' => 'authfilter']);
$routes->get('/add_tenaga', 'Tenaga::create',['filter' => 'authfilter']);
$routes->post('/add_action_tenaga', 'Tenaga::create_action',['filter' => 'authfilter']);
$routes->get('/update_tenaga/(:num)', 'Tenaga::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_tenaga', 'Tenaga::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_tenaga/(:num)', 'Tenaga::delete/$1',['filter' => 'authfilter']);

$routes->get('/layanan', 'Layanan::index',['filter' => 'authfilter']);
$routes->get('/add_layanan', 'Layanan::create',['filter' => 'authfilter']);
$routes->post('/add_action_layanan', 'Layanan::create_action',['filter' => 'authfilter']);
$routes->get('/update_layanan/(:num)', 'Layanan::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_layanan', 'Layanan::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_layanan/(:num)', 'Layanan::delete/$1',['filter' => 'authfilter']);

$routes->get('/pemesanan', 'Pemesanan::index',['filter' => 'authfilter']);
$routes->get('/add_pemesanan', 'Pemesanan::create',['filter' => 'authfilter']);
$routes->post('/add_action_pemesanan', 'Pemesanan::create_action',['filter' => 'authfilter']);
$routes->get('/update_pemesanan/(:num)', 'Pemesanan::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_pemesanan', 'Pemesanan::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_pemesanan/(:num)', 'Pemesanan::delete/$1',['filter' => 'authfilter']);
$routes->get('/catatan', 'Pemesanan::catatan',['filter' => 'authfilter']);
$routes->get('/update_catatan/(:num)', 'Pemesanan::update_catatan/$1',['filter' => 'authfilter']);
$routes->post('/update_catatan_action', 'Pemesanan::update_catatan_action',['filter' => 'authfilter']);
$routes->get('/view_catatan/(:num)', 'Pemesanan::view_catatan/$1',['filter' => 'authfilter']);

$routes->get('/laporan_pemesanan', 'Laporan::index',['filter' => 'authfilter']);
$routes->get('/laporan_pembayaran', 'Laporan::laporan_pembayaran',['filter' => 'authfilter']);
$routes->get('/laporan_penyelesaian', 'Laporan::laporan_penyelesaian',['filter' => 'authfilter']);




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
