<?php

namespace App\Controllers\Customers;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Pesanan'
        ];

        return view('customers/orders/index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Pesanan'
        ];

        return view('customers/orders/detail', $data);
    }
}
