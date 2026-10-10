<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');
$routes->get('/logout', 'Auth::logout');

// ========================================
// PROTECTED MANAGEMENT ROUTES
// ========================================

$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Products
    $routes->get('/products', 'Products::index');
    $routes->get('/products/new', 'Products::new');
    $routes->post('/products/create', 'Products::create');
    $routes->get('/products/edit/(:num)', 'Products::edit/$1');
    $routes->post('/products/update/(:num)', 'Products::update/$1');
    $routes->get('/products/delete/(:num)', 'Products::delete/$1');

    // Sales
    $routes->get('/sales', 'Sales::index');
    $routes->get('/sales/new', 'Sales::new');
    $routes->post('/sales/create', 'Sales::create');

    // Users (Staff)
    $routes->get('/users', 'Users::index');
    $routes->get('/users/new', 'Users::new');
    $routes->post('/users/create', 'Users::create');
    $routes->get('/users/edit/(:num)', 'Users::edit/$1');
    $routes->post('/users/update/(:num)', 'Users::update/$1');

    // Customers
    $routes->get('/customers', 'Customers::index');
    $routes->get('/customers/new', 'Customers::new');
    $routes->post('/customers/create', 'Customers::create');
    $routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
    $routes->post('/customers/update/(:num)', 'Customers::update/$1');    
    $routes->get('/customers/delete/(:num)', 'Customers::delete/$1');
});