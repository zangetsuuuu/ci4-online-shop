<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password', 'gender', 'phone_number'];

    public function getAdmins()
    {
        return $this->findAll();
    }

    public function getAdminById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getAdminByUsername($username)
    {
        $username = ltrim($username, '@');
        return $this->where(['username' => $username])->first();
    }

    public function getAdminBySearch($keyword)
    {
        return $this->like('fullname', $keyword)
            ->orLike('username', $keyword)
            ->orLike('email', $keyword)
            ->orLike('gender', $keyword)
            ->orLike('phone_number', $keyword)
            ->findAll();
    }
}
