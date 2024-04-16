<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function customers()
    {
        $data = [
            'title' => 'Daftar Akun'
        ];

        return view('auth/customers/register', $data);
    }
}
