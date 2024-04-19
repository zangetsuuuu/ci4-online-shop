<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function viewCart()
    {
        $data = [
            'title' => 'Keranjang'
        ];

        return view('customer/cart', $data);
    }
}
