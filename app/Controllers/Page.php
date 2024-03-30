<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index(): string
    {
        $title = 'Homepage';

        $data = [
            'title' => $title,
            'label' => 'Home'
        ];

        return view('pages/home', $data);
    }

    public function cart()
    {
        $title = 'Cart';

        $data = [
            'title' => $title,
            'label' => 'My Cart'
        ];

        return view('pages/cart', $data);
    }

    public function account()
    {
        $data = [
            'title' => 'Account',
            'label' => 'My Account'
        ];

        return view('pages/account', $data);
    }
}
