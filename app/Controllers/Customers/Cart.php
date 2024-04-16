<?php

namespace App\Controllers\Customers;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Keranjang'
        ];

        return view('customers/cart', $data);
    }
}
