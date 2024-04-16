<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Customers extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Pelanggan | ADMIN'
        ];

        return view('admin/customers/index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Pelanggan | ADMIN'
        ];

        return view('admin/customers/detail', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Pelanggan | ADMIN'
        ];

        return view('admin/customers/edit', $data);
    }
}
