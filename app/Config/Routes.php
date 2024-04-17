<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auto route
$routes->setAutoRoute(true);

// Default route
$routes->get('/', 'Home::index');

// Admin routes
$routes->group('admin', function ($routes) {
    $routes->get('', 'Auth\Login::admin');
    $routes->get('change-password', 'Auth\Password::admin');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Products
    $routes->get('products', 'Admin\Products::viewProduct');
    $routes->get('products/search', 'Admin\Products::searchProduct');
    $routes->get('product/create', 'Admin\Products::viewCreateProduct');
    $routes->post('product/save', 'Admin\Products::saveProduct');
    $routes->get('product/(:segment)', 'Admin\Products::viewDetailProduct/$1');
    $routes->get('product/(:segment)/edit', 'Admin\Products::viewEditProduct/$1');
    $routes->post('product/(:num)/update', 'Admin\Products::updateProduct/$1');
    $routes->delete('product/(:num)/delete', 'Admin\Products::deleteProduct/$1');

    // Orders
    $routes->get('orders', 'Admin\Orders::index');
    $routes->get('order/(:segment)', 'Admin\Orders::detail/$1');

    // Customers
    $routes->get('customers', 'Admin\Customers::index');
    $routes->get('customer/(:segment)', 'Admin\Customers::detail/$1');
    $routes->get('customer/(:segment)/edit', 'Admin\Customers::edit/$1');

    // Profile
    $routes->get('profile', 'Admin\Profile::index');
    $routes->get('profile/(:segment)/edit', 'Admin\Profile::edit/$1');
});

// Customer routes
$routes->group('', function ($routes) {
    $routes->get('login', 'Auth\Login::customers');
    $routes->get('register', 'Auth\Register::customers');
    $routes->get('change-password', 'Auth\Password::customers');

    $routes->get('cart', 'Customers\Cart::index');
    $routes->get('products', 'Customers\Products::index');
    $routes->get('product/(:segment)', 'Customers\Products::detail/$1');
    $routes->get('orders', 'Customers\Orders::index');
    $routes->get('order/(:segment)', 'Customers\Orders::detail/$1');
    $routes->get('checkout', 'Customers\Checkout::index');
    $routes->get('profile', 'Customers\Profile::index');
    $routes->get('profile/(:segment)/edit', 'Customers\Profile::edit/$1');
});

// Public page route
$routes->get('about-us', 'Customer\Page::about');
