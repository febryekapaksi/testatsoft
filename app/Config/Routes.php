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
$routes->get('/', 'Home::index',  ['filter' => 'auth']);

$routes->add('auth', 'Auth::index');
$routes->add('auth/login', 'Auth::login');
$routes->add('auth/logout', 'Auth::logout');

$routes->add('user/get', 'User::index',  ['filter' => 'auth']);
$routes->add('user/save', 'User::save',  ['filter' => 'auth']);
$routes->add('user/detail', 'User::detail',  ['filter' => 'auth']);
$routes->add('user/edit', 'User::edit',  ['filter' => 'auth']);
$routes->add('user/delete', 'User::delete',  ['filter' => 'auth']);

$routes->add('kategori/get', 'Kategori::index',  ['filter' => 'auth']);
$routes->add('kategori/add', 'Kategori::add',  ['filter' => 'auth']);
$routes->add('kategori/save', 'Kategori::save',  ['filter' => 'auth']);
$routes->add('kategori/detail', 'Kategori::detail',  ['filter' => 'auth']);
$routes->add('kategori/edit', 'Kategori::edit',  ['filter' => 'auth']);
$routes->add('kategori/delete', 'Kategori::delete',  ['filter' => 'auth']);

$routes->add('berita/get', 'Berita::index',  ['filter' => 'auth']);
$routes->add('berita/add', 'Berita::add',  ['filter' => 'auth']);
$routes->add('berita/save', 'Berita::save',  ['filter' => 'auth']);
$routes->add('berita/kategori', 'Berita::kategori',  ['filter' => 'auth']);
$routes->add('berita/detail', 'Berita::detail',  ['filter' => 'auth']);
$routes->add('berita/edit', 'Berita::edit',  ['filter' => 'auth']);
$routes->add('berita/delete', 'Berita::delete',  ['filter' => 'auth']);

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
