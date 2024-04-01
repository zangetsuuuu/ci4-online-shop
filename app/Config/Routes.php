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
$routes->get('/transaction', 'Page::transaction');
$routes->get('/account', 'Page::account');
$routes->get('/about-us', 'Page::about');
