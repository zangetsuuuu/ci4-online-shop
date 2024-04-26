<?php

namespace App\Controllers\Auth\Customer;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function viewForm()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('auth/customer/login', $data);
    }
}
