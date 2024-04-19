<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['first_name', 'last_name', 'username', 'email', 'password', 'phone_number', 'address'];

    public function getCustomers()
    {
        return $this->findAll();
    }

    public function getCustomerByUsername($username)
    {
        $username = ltrim($username, '@');
        return $this->where(['username' => $username])->first();
    }

    public function getCustomerBySearch($keyword)
    {
        return $this->where("CONCAT(first_name, ' ', last_name, ' ', username, ' ', email, ' ', phone_number, ' ', address) LIKE '%$keyword%'", null, true)
            ->findAll();
    }
}
