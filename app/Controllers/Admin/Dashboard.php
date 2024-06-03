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
            'Dibatalkan' => 'badge-red',
            'Menunggu Diproses' => 'badge-gray',
            'Diproses' => 'badge-yellow',
            'Siap Diambil' => 'badge-blue',
            'Selesai' => 'badge-green'
        ];

        $orders = $this->orderModel->getOrders();

        $currentPage = $this->request->getVar('page_orders') ? $this->request->getVar('page_orders') : 1;

        $orderDetails = [];
        foreach ($orders as $order) {
            $customer = $this->customerModel->withDeleted()->getCustomerById($order['customer_id']);
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
            'orders' => $orderDetails,
            'pager' => $this->orderModel->pager,
            'currentPage' => $currentPage
       ];

        return view('admin/dashboard', $data);
    }
}
