<?php

namespace App\Models\Auth\Admin;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'admins';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password', 'gender', 'phone_number', 'avatar'];

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
                'rules' => 'required|is_unique[admins.username]|regex_match[/^\S*$/]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                    'is_unique' => 'Username sudah digunakan!',
                    'regex_match' => 'Username tidak boleh dispasi!'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[admins.email]|valid_email',
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
                'rules' => 'required|is_unique[admins.phone_number]',
                'errors' => [
                    'required' => 'Nomor HP tidak boleh kosong!',
                    'is_unique' => 'Nomor HP sudah digunakan!'
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
