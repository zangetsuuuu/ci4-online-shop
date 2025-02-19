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
        $id = session()->get('id');
        return $this->where('customer_id', $id)->orderBy('created_at', 'DESC')->paginate(25, 'orders');
    }

    public function getOrderDetails($params)
    {
        return $this->where(['reference' => $params])->first();
    }

    public function getOrdersByStatus($status)
    {
        $id = session()->get('id');
        return $this->where('customer_id', $id)->where(['status' => $status])->paginate(25, 'orders');
    }

    public function sortOrders($params)
    {
        $id = session()->get('id');

        if ($params == 'terlama') {
            return $this->where(['customer_id' => $id])->orderBy('created_at', 'ASC')->paginate(25, 'orders');
        } else {
            return $this->where(['customer_id' => $id])->orderBy('created_at', 'DESC')->paginate(25, 'orders');
        }
    }

    public function getTotalOrders()
    {
        $id = session()->get('id');
        return $this->where(['customer_id' => $id])->countAllResults();
    }
}