<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Produk | ADMIN'
        ];

        return view('admin/products/index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Detail Produk | ADMIN'
        ];

        return view('admin/products/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk | ADMIN'
        ];

        return view('admin/products/create', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Produk | ADMIN'
        ];

        return view('admin/products/edit', $data);
    }
}
