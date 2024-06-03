<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auto route
$routes->setAutoRoute(true);

// Admin routes
$routes->get('admin', 'Auth\Admin\Login::viewForm');
$routes->post('admin/auth/register', 'Auth\Admin\Register::registerAdminAccount');
$routes->post('admin/auth/login', 'Auth\Admin\Login::loginToAccount');
$routes->post('admin/auth/logout', 'Auth\Logout::admin');
$routes->get('admin/email', 'Customer\Payment::sendNotification');

$routes->group('admin', ['filter' => 'auth-admin'], function ($routes) {
    $routes->get('change-password', 'Auth\Password::admin');
    $routes->get('dashboard', 'Admin\Dashboard::viewDashboard');
    $routes->get('list', 'Admin\Admin::viewAdmins');
    $routes->get('search', 'Admin\Admin::searchAdmin');
    $routes->delete('(:num)/delete', 'Admin\Admin::deleteAdmin/$1');

    // Add admin
    $routes->get('add', 'Auth\Admin\Register::viewForm');

    // Products
    $routes->get('products', 'Admin\Product::viewProducts');
    $routes->get('product/search', 'Admin\Product::searchProduct');
    $routes->get('product/create', 'Admin\Product::viewCreateProduct');
    $routes->post('product/save', 'Admin\Product::saveProduct');
    $routes->get('product/(:segment)', 'Admin\Product::viewProductDetail/$1');
    $routes->get('product/(:segment)/edit', 'Admin\Product::viewEditProduct/$1');
    $routes->post('product/(:num)/update', 'Admin\Product::updateProduct/$1');
    $routes->delete('product/(:num)/delete', 'Admin\Product::deleteProduct/$1');

    // Orders
    $routes->get('orders', 'Admin\Order::viewOrders');
    $routes->get('order/search', 'Admin\Order::searchOrder');
    $routes->get('order/(:segment)', 'Admin\Order::viewOrderDetail/$1');
    $routes->post('order/update_status', 'Admin\Order::updateOrderStatus');

    // Customers
    $routes->get('customers', 'Admin\Customer::viewCustomers');
    $routes->get('customer/search', 'Admin\Customer::searchCustomer');
    $routes->get('customer/(:segment)', 'Admin\Customer::viewCustomerDetail/$1');
    $routes->delete('customer/(:num)/delete', 'Admin\Customer::deleteCustomer/$1');

    // Profile
    $routes->get('profile', 'Admin\Profile::viewInfo');
    $routes->get('profile/edit', 'Admin\Profile::viewEditProfile');
    $routes->post('profile/update', 'Admin\Profile::updateAdminProfile');

    $routes->get('(:segment)', 'Admin\Admin::viewAdminDetail/$1');

    // Reports
    $routes->get('report/product/(:any)', 'Admin\Report::generateProductReport/$1');
    $routes->get('report/order/(:any)', 'Admin\Report::generateOrderReport/$1');
    $routes->get('report/customer/(:any)', 'Admin\Report::generateCustomerReport/$1');
});

// Customer routes
$routes->get('login', 'Auth\Customer\Login::viewForm');
$routes->post('auth/login', 'Auth\Customer\Login::loginToAccount');
$routes->get('register', 'Auth\Customer\Register::viewForm');
$routes->post('auth/register', 'Auth\Customer\Register::saveCustomerData');
$routes->post('auth/logout', 'Auth\Logout::customer');
$routes->get('forgot-password', 'Auth\Password::customers');
$routes->post('auth/send-email', 'Auth\Password::sendEmail');
$routes->get('auth/reset', 'Auth\Password::resetForm');
$routes->post('auth/password/reset', 'Auth\Password::reset');

$routes->group('', ['filter' => 'auth-customer'], function ($routes) {
    // Default route
    $routes->get('/', 'Page::index');

    $routes->get('cart', 'Customer\Cart::viewCart');
    $routes->post('cart/(:num)/update', 'Customer\Cart::updateCartItem/$1');
    $routes->delete('cart/(:num)/delete', 'Customer\Cart::deleteCartItem/$1');
    $routes->get('products', 'Customer\Product::viewProducts');
    $routes->get('product/search', 'Customer\Product::searchProduct');
    $routes->post('product/add-to-cart', 'Customer\Product::addToCart');
    $routes->get('product/(:segment)', 'Customer\Product::viewProductDetail/$1');

    // Orders
    $routes->get('orders', 'Customer\Order::viewOrders');
    $routes->get('order/(:segment)', 'Customer\Order::viewOrderDetail/$1');
    $routes->post('order/(:num)/complete', 'Customer\Order::setOrderComplete/$1');

    // Profile
    $routes->get('profile', 'Customer\Profile::viewProfile');
    $routes->get('profile/edit', 'Customer\Profile::editProfile');
    $routes->post('profile/update', 'Customer\Profile::updateProfile');

    // Payment
    $routes->post('payment/save-transaction', 'Customer\Payment::saveTransaction');
    $routes->post('checkout', 'Customer\Payment::checkout');
    $routes->get('payment/success', 'Customer\Payment::success');
    $routes->get('payment/failed', 'Customer\Payment::failed');
});

// Public page route
$routes->get('about-us', 'Customer\Page::about');

// Forbidden route
$routes->get('forbidden', 'Page::forbidden');
