<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\Auth\Admin\RegisterModel;

class Register extends BaseController
{
    protected $registerModel;

    public function __construct()
    {
        $this->registerModel = new RegisterModel();
    }

    public function viewAdminForm()
    {
        $data = [
            'title' => 'Daftar Akun | ADMIN',
            'validation' => session()->getFlashdata('validation')
        ];

        return view('auth/admin/register', $data);
    }

    public function saveCustomerData()
    {
        $config = [
            'first_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama depan tidak boleh kosong!'
                ]
            ],
            'last_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama belakang tidak boleh kosong!'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[customers.username]|regex_match[/^\S*$/]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                    'is_unique' => 'Username sudah digunakan!',
                    'regex_match' => 'Username tidak boleh dispasi!'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[customers.email]|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!',
                    'is_unique' => 'Email sudah digunakan!',
                    'valid_email' => 'Format email tidak valid!'
                ]
            ],
            'phone_number' => [
                'rules' => 'required|is_unique[customers.phone_number]',
                'errors' => [
                    'required' => 'Nomor HP tidak boleh kosong!',
                    'is_unique' => 'Nomor HP sudah digunakan!'
                ]
            ],
            'address' => [
                'rules' => 'required|is_unique[customers.address]',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!',
                    'is_unique' => 'Alamat sudah digunakan!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!',
                    'min_length' => 'Password minimal 8 karakter!'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password tidak boleh kosong!',
                    'matches' => 'Konfirmasi password tidak sesuai dengan password!'
                ]
            ]
        ];

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address')
        ];

        $this->registerModel->save($data);

        session()->setFlashdata('Register Success', 'Akun berhasil didaftarkan!');

        return redirect()->to('login');
    }
}
