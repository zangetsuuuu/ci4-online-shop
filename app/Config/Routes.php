<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/home', 'Page::index');
$routes->get('/cart', 'Page::cart');
$routes->get('/account', 'Page::account');

$routes->get('/register', 'User::register');
$routes->get('/login', 'User::login');
