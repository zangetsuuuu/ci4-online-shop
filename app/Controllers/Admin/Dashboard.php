<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard | ADMIN'
        ];

        return view('admin/dashboard', $data);
    }
}
