<?php

namespace App\Models\Auth\Admin;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admins';
    protected $returnType = 'array';
    protected $allowedFields = ['fullname', 'username', 'email', 'password', 'phone_number'];

    public function validation()
    {
        return [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!'
                ]
            ]
        ];
    }
}
