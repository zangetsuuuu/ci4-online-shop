<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];

        return view('pages/users/home', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register'
        ];

        return view('pages/users/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('pages/users/login', $data);
    }

    public function cart()
    {
        $data = [
            'title' => 'Cart'
        ];

        return view('pages/users/cart', $data);
    }

    public function orders()
    {
        $data = [
            'title' => 'Orders'
        ];

        return view('pages/users/orders', $data);
    }

    public function checkout()
    {
        $data = [
            'title' => 'Checkout'
        ];

        return view('pages/users/checkout', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];

        return view('pages/users/about', $data);
    }

    public function userProfile()
    {
        $data = [
            'title' => 'My Profile'
        ];

        return view('pages/users/profile', $data);
    }
}
