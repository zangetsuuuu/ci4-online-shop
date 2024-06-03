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
        $key = 'remember_me';
        setcookie($key, '', time() - (86400 * 30), '/');
        return redirect()->to(base_url('login'));
    }
}
