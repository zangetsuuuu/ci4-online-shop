<?php

namespace App\Models\Auth\Customer;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'customers';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password', 'gender', 'phone_number', 'address'];

    public function validation()
    {
        return [
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
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
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
                ]
            ],
            'phone_number' => [
                'rules' => 'required|is_unique[customers.phone_number]|min_length[10]',
                'errors' => [
                    'required' => 'Nomor HP tidak boleh kosong!',
                    'is_unique' => 'Nomor HP sudah digunakan!',
                    'min_length' => 'Nomor HP minimal 11 digit!'
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
    }
}
