<?php

namespace App\Controllers;

class User extends BaseController
{
    public function register()
    {
        $data = [
            'title' => 'Sign Up'
        ];

        return view('pages/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('pages/login', $data);
    }
}
