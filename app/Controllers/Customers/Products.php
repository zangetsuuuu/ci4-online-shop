<?php

namespace App\Controllers\Customers;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Produk'
        ];

        return view('customers/products/index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Produk'
        ];

        return view('customers/products/detail', $data);
    }
}
