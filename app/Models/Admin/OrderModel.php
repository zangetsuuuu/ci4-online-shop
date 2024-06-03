<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['reference', 'customer_id', 'transaction_id', 'total_price', 'status', 'created_at', 'updated_at'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getOrders()
    {
        return $this->orderBy('created_at', 'DESC')->paginate(25, 'orders');
    }

    public function getOrdersByStatus($status)
    {
        return $this->where(['status' => $status])->paginate(25, 'orders');
    }

    public function getOrderBySearch($keyword)
    {
        return $this->like('id', $keyword)
            ->orLike('created_at', $keyword)
            ->orLike('status', $keyword)
            ->paginate(25, 'orders');
    }

    public function sortOrders($params)
    {
        if ($params == 'terlama') {
            return $this->orderBy('created_at', 'ASC')->paginate(25, 'orders');
        } else {
            return $this->orderBy('created_at', 'DESC')->paginate(25, 'orders');
        }
    }

    public function getOrderDetails($params)
    {
        return $this->where(['reference' => $params])->first();
    }

    public function getTotalIncome()
    {
        $orders = $this->findAll();

        $totalIncome = 0;
        foreach ($orders as $order) {
            $totalIncome = bcadd($totalIncome, $order['total_price'], 2);
        }

        return $totalIncome;
    }

    public function getTotalOrders($id = false)
    {
        if ($id) {
            return $this->where(['customer_id' => $id])->countAllResults();
        }

        return $this->countAllResults();
    }
}
