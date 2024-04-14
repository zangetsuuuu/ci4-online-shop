<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');

$routes->get('/admin/dashboard', 'Page::dashboard');
$routes->get('/admin/product', 'Page::adminProduct');
$routes->get('/admin/profile', 'Page::adminProfile');
$routes->get('/admin/change-password', 'Page::adminChangePassword');
$routes->get('/admin/orders', 'Page::adminOrders');
$routes->get('/admin/orders/(:segment)', 'Page::adminOrdersDetail/$1');
$routes->get('/admin/customers', 'Page::customers');
$routes->get('/admin/customers/(:segment)', 'Page::customerDetails/$1');

$routes->get('/home', 'Page::index');
$routes->get('/cart', 'Page::cart');
$routes->get('/orders', 'Page::orders');
$routes->get('/checkout', 'Page::checkout');
$routes->get('/about-us', 'Page::about');
$routes->get('/profile', 'Page::userProfile');
$routes->get('/change-password', 'Page::changePassword');

$routes->get('/admin/product/(:segment)', 'Page::adminProductDetail/$1');
$routes->get('/product/(:segment)', 'Page::productDetail/$1');
