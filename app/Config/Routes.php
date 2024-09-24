<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');

// Supplier Routes
// Routes for Supplier Module
$routes->group('supplier', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'Supplier::index'); // Menampilkan daftar supplier
    $routes->get('create', 'Supplier::create'); // Menampilkan form tambah supplier
    $routes->post('store', 'Supplier::store'); // Menyimpan data supplier baru
    $routes->get('edit/(:num)', 'Supplier::edit/$1'); // Menampilkan form edit supplier
    $routes->match(['post', 'put'], 'update/(:num)', 'Supplier::update/$1'); // Mengupdate data supplier, support POST dan PUT
    $routes->get('delete/(:num)', 'Supplier::delete/$1'); // Menghapus data supplier
    $routes->post('getData', 'Supplier::getData'); // Menampilkan data supplier secara server-side
    $routes->get('getData', 'Supplier::getData'); // Jika menggunakan GET


});

