<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\OrderModel;
use App\Models\Customer\OrderItemModel;
use App\Models\Customer\ProductModel;
use App\Models\Customer\TransactionModel;

class Order extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;
    protected $productModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
    }

    public function viewOrders()
    {
        $statusColor = [
            'dibatalkan' => 'text-red-500 bg-red-100',
            'menunggu diproses' => 'text-gray-500 bg-gray-100',
            'diproses' => 'text-yellow-500 bg-yellow-500',
            'siap diambil' => 'text-blue-500 bg-blue-100',
            'selesai' => 'text-green-500 bg-green-100'
        ];
        
        $orders = $this->orderModel->getOrders();
        
        foreach ($orders as &$order) {
            $order['color'] = $statusColor[$order['status']] ?? 'text-gray-500 bg-gray-100';
        }
        
        $data = [
            'title' => 'Daftar Pesanan',
            'orders' => $orders
        ];
        
        return view('customer/order/index', $data);        
    }

    public function viewOrderDetail($params)
    {
        $statusColor = [
            'dibatalkan' => 'text-red-500 bg-red-100',
            'menunggu diproses' => 'text-gray-500 bg-gray-100',
            'diproses' => 'text-yellow-500 bg-yellow-100',
            'siap diambil' => 'text-blue-500 bg-blue-100',
            'selesai' => 'text-green-500 bg-green-100'
        ];

        $order = $this->orderModel->getOrderDetails($params);
        $orderItems = $this->orderItemModel->where('order_id', $order['id'])->findAll();
        $transaction = $this->transactionModel->where('id', $order['transaction_id'])->first();
        
        $item = [];
        foreach ($orderItems as &$orderItem) {
            $product = $this->productModel->where('id', $orderItem['product_id'])->first();
            $item[] = $product['name'];
        }

        $data = [
            'title' => 'Detail Pesanan',
            'order' => $order,
            'order_items' => $orderItems,
            'items' => $item,
            'payment_type' => $transaction['payment_type'],
            'color' => $statusColor[$order['status']]
        ];
        // dd($data);

        return view('customer/order/detail', $data);
    }
}
