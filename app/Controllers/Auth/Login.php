<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function admin()
    {
        $data = [
            'title' => 'Login | ADMIN'
        ];

        return view('auth/admin/login', $data);
    }

    public function customers()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('auth/customers/login', $data);
    }
}
