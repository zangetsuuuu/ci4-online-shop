<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index(): string
    {
        $title = 'Home';

        $data = [
            'title' => $title
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
        $title = 'Cart';

        $data = [
            'title' => $title
        ];

        return view('pages/users/cart', $data);
    }

    public function transaction()
    {
        $title = 'Transaction';

        $data = [
            'title' => $title
        ];

        return view('pages/users/transaction', $data);
    }

    public function account()
    {
        $data = [
            'title' => 'Account'
        ];

        return view('pages/users/account', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];

        return view('pages/users/about', $data);
    }
}
