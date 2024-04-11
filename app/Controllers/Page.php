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

    public function register()
    {
        $data = [
            'title' => 'Daftar'
        ];

        return view('auth/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('auth/login', $data);
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

    public function product()
    {
        $data = [
            'title' => 'Detail Produk'
        ];

        return view('product/product-detail', $data);
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ganti Password'
        ];

        return view('users/change-password', $data);
    }
}
