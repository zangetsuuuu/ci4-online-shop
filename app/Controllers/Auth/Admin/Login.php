<?php

namespace App\Controllers\Auth\Admin;

use App\Controllers\BaseController;
use App\Models\Auth\Admin\LoginModel;

class Login extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    
    public function viewForm()
    {
        $data = [
            'title' => 'Login | ADMIN',
            'validation' => session()->getFlashdata('validation'),
        ];

        return view('auth/admin/login', $data);
    }

    public function loginToAccount()
    {
        $config = $this->loginModel->validation();

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $admin = $this->loginModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $this->setAdminSession($admin);

            if ($this->request->getVar('remember')) {
                $key = 'remember_' . $admin['id'];
                $value = $admin['id'] . ':' . $admin['password'];
                setcookie($key, $value, time() + (86400 * 30), '/');
            }

            return redirect()->to('admin/dashboard');
        }

        session()->setFlashdata('error', 'Username atau password salah!');
        return redirect()->back()->withInput();
    }


    private function setAdminSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'fullname' => $admin['fullname'],
            'username' => $admin['username'],
            'email' => $admin['email'],
            'role' => $admin['role'],
            'isLoggedIn' => true
        ];

        session()->set($data);
    }
}
