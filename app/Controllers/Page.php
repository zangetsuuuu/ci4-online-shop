<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Beranda'
        ];

        return view('users/home', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard | ADMIN'
        ];

        return view('admin/dashboard', $data);
    }

    public function cart()
    {
        $data = [
            'title' => 'Keranjang'
        ];

        return view('users/cart', $data);
    }

    public function orders()
    {
        $data = [
            'title' => 'Pesanan'
        ];

        return view('users/orders', $data);
    }

    public function adminOrders()
    {
        $data = [
            'title' => 'Pesanan | ADMIN'
        ];

        return view('admin/orders', $data);
    }

    public function adminOrdersDetail()
    {
        $data = [
            'title' => 'Detail Pesanan | ADMIN'
        ];

        return view('admin/order-details', $data);
    }

    public function adminProduct()
    {
        $data = [
            'title' => 'Produk | ADMIN'
        ];

        return view('admin/product', $data);
    }

    public function checkout()
    {
        $data = [
            'title' => 'Checkout'
        ];

        return view('users/checkout', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang Kami'
        ];

        return view('about', $data);
    }

    public function userProfile()
    {
        $data = [
            'title' => 'Profil Saya'
        ];

        return view('users/profile', $data);
    }

    public function adminProfile()
    {
        $data = [
            'title' => 'Profil | ADMIN'
        ];

        return view('admin/profile', $data);
    }

    public function adminProductDetail()
    {
        $data = [
            'title' => 'Detail Produk | ADMIN'
        ];

        return view('admin/product-detail', $data);
    }

    public function productDetail()
    {
        $data = [
            'title' => 'Detail Produk'
        ];

        return view('users/product-detail', $data);
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ganti Password'
        ];

        return view('users/change-password', $data);
    }

    public function adminChangePassword()
    {
        $data = [
            'title' => 'Ganti Password | ADMIN'
        ];

        return view('admin/change-password', $data);
    }

    public function customers()
    {
        $data = [
            'title' => 'Daftar Pelanggan | ADMIN'
        ];

        return view('admin/customers', $data);
    }

    public function customerDetails()
    {
        $data = [
            'title' => 'Info Pelanggan | ADMIN'
        ];

        return view('admin/customer-details', $data);
    }
}
