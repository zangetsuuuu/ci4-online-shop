<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Login | ADMIN'
        ];

        return view('auth/admin/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar'
        ];

        return view('auth/users/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('auth/users/login', $data);
    }
}
