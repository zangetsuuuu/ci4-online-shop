<?php

namespace App\Controllers\Auth\Admin;

use App\Controllers\BaseController;
use App\Models\Auth\Admin\RegisterModel;

class Register extends BaseController
{
    protected $registerModel;

    public function __construct()
    {
        $this->registerModel = new RegisterModel();
    }

    public function viewForm()
    {
        $data = [
            'title' => 'Tambah Admin | ADMIN',
            'validation' => session('validation')
        ];

        return view('auth/admin/register', $data);
    }

    public function registerAdminAccount()
    {
        $config = $this->registerModel->validation();

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $data = [
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'gender' => $this->request->getVar('gender'),
            'phone_number' => $this->request->getVar('phone_number'),
        ];

        $this->registerModel->save($data);

        session()->setFlashdata('Register Success', 'Akun berhasil didaftarkan!');

        return redirect()->to('admin/list');
    }
}
