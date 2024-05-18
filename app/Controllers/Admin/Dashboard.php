<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\ProductModel;
use App\Models\Admin\CustomerModel;
use App\Models\Admin\OrderModel;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $customerModel;
    protected $orderModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->customerModel = new CustomerModel();
        $this->orderModel = new OrderModel();
    }

    public function viewDashboard()
    {
        $statusColor = [
            'dibatalkan' => 'badge-red',
            'menunggu diproses' => 'badge-gray',
            'diproses' => 'badge-yellow',
            'siap diambil' => 'badge-blue',
            'selesai' => 'badge-green'
        ];

        $orders = $this->orderModel->getOrders();

        $orderDetails = [];
        foreach ($orders as $order) {
            $customer = $this->customerModel->getCustomerById($order['customer_id']);
            $orderDetails[] = [
                'id' => $order['id'],
                'reference' => $order['reference'],
                'customer_id' => $order['customer_id'],
                'customer_name' => $customer['fullname'],
                'transaction_id' => $order['transaction_id'],
                'total_price' => $order['total_price'],
                'created_at' => $order['created_at'],
                'status' => $order['status'],
                'status_color' => $statusColor[$order['status']]
            ];
        }

        $data = [
            'title' => 'Dashboard | ADMIN',
            'totalIncome' => $this->orderModel->getTotalIncome(),
            'totalProducts' => $this->productModel->getTotalProducts(),
            'totalOrders' => $this->orderModel->getTotalOrders(),
            'totalCustomers' => $this->customerModel->getTotalCustomers(),
            'orders' => $orderDetails
       ];

        return view('admin/dashboard', $data);
    }
}
