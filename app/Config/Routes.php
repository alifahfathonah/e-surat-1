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
$routes->setDefaultController('Auth');
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
$routes->get('/home', 'Home::index');
//Routes Login
$routes->get('/', 'Auth::index');
$routes->add('/auth/verify', 'Auth::cek');
$routes->get('/auth/logout', 'Auth::logout');
//Routes User
$routes->get('data-user', 'User::user');
$routes->get('data-user/add', 'User::add');
$routes->post('data-user/save', 'User::save');
$routes->delete('data-user/(:num)', 'User::delete/$1');
$routes->get('data-user/edit/(:segment)', 'User::edit/$1');
$routes->add('data-user/update/(:segment)', 'User::update/$1');
//Routes Surat Masuk
$routes->get('tambah-surat-masuk', 'SuratMasuk::add');
$routes->post('tambah-surat-masuk/save', 'SuratMasuk::save');
$routes->get('surat-masuk', 'SuratMasuk::data');
$routes->delete('surat-masuk/(:num)', 'SuratMasuk::delete/$1');
$routes->get('surat-masuk/edit/(:segment)', 'SuratMasuk::edit/$1');
$routes->add('surat-masuk/update/(:segment)', 'SuratMasuk::update/$1');
$routes->add('surat-masuk/detail/(:segment)', 'SuratMasuk::detail/$1');
//Routes Surat Keluar
$routes->get('tambah-surat-keluar', 'SuratKeluar::add');
$routes->post('tambah-surat-keluar/save', 'SuratKeluar::save');
$routes->get('surat-keluar', 'SuratKeluar::data');
$routes->delete('surat-keluar/(:num)', 'SuratKeluar::delete/$1');
$routes->get('surat-keluar/edit/(:segment)', 'SuratKeluar::edit/$1');
$routes->add('surat-keluar/update/(:segment)', 'SuratKeluar::update/$1');
$routes->add('surat-keluar/detail/(:segment)', 'SuratKeluar::detail/$1');
$routes->get('surat-keluar/print/(:segment)', 'SuratKeluar::print/$1');
//Routes My Profil
$routes->get('my-profil', 'MyProfil::myprofil');
$routes->get('my-profil/edit/(:segment)', 'MyProfil::edit/$1');
$routes->add('my-profil/update/(:segment)', 'MyProfil::update/$1');
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
