<?php

namespace App\Controllers\Customers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Profil'
        ];

        return view('customers/profile/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Profil'
        ];

        return view('customers/profile/edit', $data);
    }
}
