<?php

namespace App\Models\Auth\Customer;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'customers';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['first_name', 'last_name', 'username', 'email', 'password', 'phone_number', 'address'];
}