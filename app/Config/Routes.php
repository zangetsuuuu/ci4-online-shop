<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/home', 'Page::index');
$routes->get('/register', 'Page::register');
$routes->get('/login', 'Page::login');
$routes->get('/cart', 'Page::cart');
$routes->get('/orders', 'Page::orders');
$routes->get('/checkout', 'Page::checkout');
$routes->get('/about-us', 'Page::about');
$routes->get('/profile', 'Page::userProfile');
$routes->get('/change-password', 'Page::changePassword');

$routes->get('/product/(:segment)', 'Page::product/$1');
