<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['reference','customer_id', 'transaction_id', 'total_price', 'status', 'created_at', 'updated_at'];
    protected $returnType = 'array';

    public function getOrders()
    {
        return $this->where(['customer_id' => session()->get('id')])->findAll();
    }

    public function getOrderDetails($params)
    {
        return $this->where(['reference' => $params])->first();
    }
}