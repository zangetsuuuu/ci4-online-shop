<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'admins';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password', 'gender', 'phone_number', 'avatar'];

    public function getAdminByUsername($username)
    {
        $username = ltrim($username, '@');
        return $this->where(['username' => $username])->first();
    }

    public function validation($usernameRule, $emailRule, $phoneNumberRule)
    {
        return [
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lengkap tidak boleh kosong!'
                ]
            ],
            'username' => [
                'rules' => $usernameRule,
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                    'is_unique' => 'Username sudah digunakan!',
                    'regex_match' => 'Username tidak boleh dispasi!'
                ]
            ],
            'email' => [
                'rules' => $emailRule,
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
                'rules' => $phoneNumberRule,
                'errors' => [
                    'required' => 'Nomor HP tidak boleh kosong!',
                    'is_unique' => 'Nomor HP sudah digunakan!'
                ]
            ],
            'avatar' => [
                'rules' => 'max_size[avatar,1024]|is_image[avatar]|ext_in[avatar,jpg,jpeg,png,webp]|mime_in[avatar,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar terlalu besar (maksimum 1MB)!',
                    'is_image' => 'File yang dipilih bukan gambar!',
                    'ext_in' => 'Ekstensi file yang diperbolehkan hanya jpg, jpeg, png dan webp!',
                    'mime_in' => 'Ekstensi file yang diperbolehkan hanya jpg, jpeg, png dan webp!'
                ]
            ]
        ];
    }
}
