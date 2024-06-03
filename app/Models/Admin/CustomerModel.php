<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password', 'phone_number', 'address'];

    public function getCustomers()
    {
        return $this->paginate(25, 'customers');
    }

    public function getCustomerById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getCustomerByUsername($username)
    {
        $username = ltrim($username, '@');
        return $this->where(['username' => $username])->first();
    }

    public function getCustomerBySearch($keyword)
    {
        return $this->like('fullname', $keyword)
            ->orLike('username', $keyword)
            ->orLike('email', $keyword)
            ->orLike('gender', $keyword)
            ->orLike('phone_number', $keyword)
            ->orLike('address', $keyword)
            ->paginate(25, 'customers');
    }

    public function getTotalCustomers()
    {
        return $this->countAllResults();
    }
}
