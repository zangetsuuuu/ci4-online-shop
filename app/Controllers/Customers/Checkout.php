<?php

namespace App\Controllers\Customers;

use App\Controllers\BaseController;

class Checkout extends BaseController
{
    public function cart()
    {
        $data = [
            'title' => 'Checkout'
        ];

        return view('customers/checkout', $data);
    }
}
