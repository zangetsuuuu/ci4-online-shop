<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function admin()
    {
        session()->remove('id');
        session()->remove('fullname');
        session()->remove('email');
        session()->remove('isLoggedIn');
        setcookie('remember_' . session()->get('id'), '', time() - 3600, '/');
        return redirect()->to('admin');
    }

    public function customer()
    {
        session()->remove('id');
        session()->remove('fullname');
        session()->remove('email');
        session()->remove('isLoggedIn');
        setcookie('remember_' . session()->get('id'), '', time() - 3600, '/');
        return redirect()->to('login');
    }
}