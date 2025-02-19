<?php

namespace App\Controllers\Auth\Customer;

use App\Controllers\BaseController;

use App\Models\Auth\Customer\RegisterModel;

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
            'title' => 'Daftar Akun',
            'validation' => session('validation')
        ];

        return view('auth/customer/register', $data);
    }

    public function saveCustomerData()
    {
        $config = $this->registerModel->validation();

        if (!$this->validate($config)) {
            return redirect()->to(base_url('register'))->withInput()->with('validation', $this->validator->getErrors());
        }

        $data = [
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'gender' => $this->request->getVar('gender'),
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address')
        ];

        $this->registerModel->save($data);

        session()->setFlashdata('Register Success', 'Akun berhasil didaftarkan!');

        return redirect()->to(base_url('login'));
    }
}
