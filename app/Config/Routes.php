<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', ['filter' => 'auth'], function($routes) {
$routes->get('', 'UserController::index');
$routes->get('user/', 'UserController::index');
$routes->get('isi_user/', 'UserController::create');
$routes->post('user_store/', 'UserController::store');
$routes->get('edit_user/(:num)', 'UserController::edit/$1');
$routes->post('update_user/(:num)', 'UserController::update/$1');
$routes->get('delete_user/(:num)', 'UserController::delete/$1');
$routes->get('ganti_password', 'AuthController::ganti_password');
$routes->post('proses_ganti_password', 'AuthController::proses_ganti_password');
});


$routes->get('/', 'Page::home');
$routes->get('/search', 'Page::search');
$routes->get('/store', 'Page::store');
$routes->get('/product', 'Page::product_page');
$routes->get('/redirect_store', 'Page::redirect_store');
$routes->get('/cupon_claim', 'Page::cupon_claim');
$routes->get('/redirect_product', 'Page::redirect_product');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->get('register_user', 'AuthController::form_register');
$routes->post('proses_register_user', 'AuthController::proses_register_user');
$routes->get('activate/(:any)', 'AuthController::activate/$1');
$routes->get('lupa_password', 'AuthController::lupa_password');
$routes->post('proses_lupa_password', 'AuthController::proses_lupa_password');
