<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class PasswordModel extends Model
{
    protected $table = 'password_resets';
    protected $allowedFields = ['email', 'token', 'created_at', 'is_expired'];
    public $timestamps = false;

    public function resetValidation()
    {
        return [
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
