<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Profil | ADMIN'
        ];

        return view('admin/profile/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Profil | ADMIN'
        ];

        return view('admin/profile/edit', $data);
    }
}
