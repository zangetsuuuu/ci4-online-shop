<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Pesanan | ADMIN'
        ];

        return view('admin/orders/index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Pesanan | ADMIN'
        ];

        return view('admin/orders/detail', $data);
    }
}
