<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function admin()
    {
        session()->destroy();
        return redirect()->to(base_url('admin'));
    }

    public function customer()
    {
        session()->destroy();
        setcookie('remember_' . session()->get('id'), '', time() - 3600, '/');
        return redirect()->to(base_url('login'));
    }
}