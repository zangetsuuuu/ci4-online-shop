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
    $routes->get('', 'Auth\Admin\Login::viewForm');
    $routes->get('create', 'Auth\Admin\Register::viewForm');
    $routes->post('save', 'Auth\Admin\Register::saveAdminData');
    $routes->get('change-password', 'Auth\Password::admin');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('list', 'Admin\Admin::viewAdmins');
    $routes->get('search', 'Admin\Admin::searchAdmin');
    $routes->delete('(:num)/delete', 'Admin\Admin::deleteAdmin/$1');

    // Products
    $routes->get('products', 'Admin\Product::viewProducts');
    $routes->get('products/search', 'Admin\Product::searchProduct');
    $routes->get('products/create', 'Admin\Product::viewCreateProduct');
    $routes->post('products/save', 'Admin\Product::saveProduct');
    $routes->get('products/(:segment)', 'Admin\Product::viewProductDetail/$1');
    $routes->get('products/(:segment)/edit', 'Admin\Product::viewEditProduct/$1');
    $routes->post('products/(:num)/update', 'Admin\Product::updateProduct/$1');
    $routes->delete('products/(:num)/delete', 'Admin\Product::deleteProduct/$1');

    // Orders
    $routes->get('orders', 'Admin\Order::viewOrders');
    $routes->get('orders/(:segment)', 'Admin\Order::viewOrderDetail/$1');

    // Customers
    $routes->get('customers', 'Admin\Customer::viewCustomers');
    $routes->get('customers/search', 'Admin\Customer::searchCustomer');
    $routes->get('customers/(:segment)', 'Admin\Customer::viewCustomerDetail/$1');
    $routes->delete('customers/(:num)/delete', 'Admin\Customer::deleteCustomer/$1');
    
    // Profile
    $routes->get('profile', 'Admin\Profile::viewInfo');
    $routes->get('profile/(:segment)/edit', 'Admin\Profile::edit/$1');
    
    $routes->get('(:segment)', 'Admin\Admin::viewAdminDetail/$1');
});

// Customer routes
$routes->group('', function ($routes) {
    $routes->get('login', 'Auth\Customer\Login::viewForm');
    $routes->get('register', 'Auth\Customer\Register::viewForm');
    $routes->post('auth/register', 'Auth\Customer\Register::saveCustomerData');
    $routes->get('change-password', 'Auth\Customer\Password::customers');

    $routes->get('cart', 'Customer\Cart::viewCart');
    $routes->get('products', 'Customer\Product::viewProducts');
    $routes->get('product/(:segment)', 'Customer\Product::viewProductDetail/$1');
    $routes->get('orders', 'Customer\Order::viewOrders');
    $routes->get('order/(:segment)', 'Customer\Order::detail/$1');
    $routes->get('checkout', 'Customer\Checkout::index');
    $routes->get('profile', 'Customer\Profile::index');
    $routes->get('profile/(:segment)/edit', 'Customer\Profile::edit/$1');
});

// Public page route
$routes->get('about-us', 'Customer\Page::about');
