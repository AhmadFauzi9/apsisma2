<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers\Mtsa');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/', 'Login::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/prosesadmin', 'Register::prosesadmin');
$routes->get('/logout', 'Login::logout');

$routes->delete('/siswa/(:num)', 'siswa::delete/$1');
$routes->put('/siswa/(:num)', 'siswa::detail/$1');
$routes->put('/siswa/(:num)', 'siswa::edit/$1');
$routes->get('/siswa/profile', 'siswa::profile/$1');
// $routes->get('/siswa/(:any)', 'siswa::userSiswa/$1'); //untuk membatasi akses ketika mengetikkan id/username di method detail dan delete

$routes->delete('/guru/(:num)', 'guru::delete/$1');
$routes->put('/guru/(:num)', 'guru::detail/$1');
$routes->put('/guru/(:num)', 'guru::edit/$1');
$routes->get('/guru/profile', 'guru::profile/$1');
// $routes->get('/guru/(:any)', 'guru::userGuru/$1');

$routes->delete('/admin/(:num)', 'admin::delete/$1');
$routes->put('/admin/(:num)', 'admin::detail/$1');
$routes->put('/admin/(:num)', 'admin::edit/$1');
$routes->get('/admin/profile', 'admin::profile/$1');
// $routes->get('/admin/(:any)', 'admin::userAdmin/$1');

$routes->delete('/kelasbagian/(:num)', 'kelasbagian::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
