<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\OrderModel;
use App\Models\Admin\OrderItemModel;
use App\Models\Admin\ProductModel;
use App\Models\Customer\TransactionModel;
use App\Models\Admin\CustomerModel;

class Order extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;
    protected $productModel;
    protected $transactionModel;
    protected $customerModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->customerModel = new CustomerModel();
    }

    public function viewOrders()
    {
        $data = [
            'title' => 'Daftar Pesanan | ADMIN'
        ];

        return view('admin/order/index', $data);
    }

    public function viewOrderDetail($params)
    {
        $statusColor = [
            'dibatalkan' => 'badge-red',
            'menunggu diproses' => 'badge-gray',
            'diproses' => 'badge-yellow',
            'siap diambil' => 'badge-blue',
            'selesai' => 'badge-green'
        ];

        $order = $this->orderModel->getOrderDetails($params);
        $customer = $this->customerModel->where('id', $order['customer_id'])->first();
        $orderItems = $this->orderItemModel->where('order_id', $order['id'])->findAll();
        $transaction = $this->transactionModel->where('id', $order['transaction_id'])->first();
        
        $item = [];
        foreach ($orderItems as &$orderItem) {
            $product = $this->productModel->where('id', $orderItem['product_id'])->first();
            $item[] = $product['name'];
        }

        $data = [
            'title' => 'Detail Pesanan | ADMIN',
            'order' => $order,
            'customer' => $customer,
            'order_items' => $orderItems,
            'items' => $item,
            'payment_type' => $transaction['payment_type'],
            'color' => $statusColor[$order['status']]
        ];

        return view('admin/order/detail', $data);
    }
}
