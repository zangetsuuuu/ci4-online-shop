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
        $sort = $this->request->getVar('sortBy');
        $status = $this->request->getVar('status');
        $sort = (isset($sort)) ? $sort : '';
        $status = (isset($status)) ? $status : '';

        $statusColor = [
            'dibatalkan' => 'badge-red',
            'menunggu diproses' => 'badge-gray',
            'diproses' => 'badge-yellow',
            'siap diambil' => 'badge-blue',
            'selesai' => 'badge-green'
        ];

        if ($status) {
            $orders = $this->orderModel->getOrdersByStatus($status);
            session()->setFlashdata('status', 'Pesanan dengan status: ' . ucwords($status));
        } elseif ($sort) {
            $orders = $this->orderModel->sortOrders($sort);
        } else {
            $orders = $this->orderModel->getOrders();
            session()->remove('status');
        }

        $orderDetails = [];
        foreach ($orders as $order) {
            $customer = $this->customerModel->withDeleted()->getCustomerById($order['customer_id']);
            $orderDetails[] = [
                'id' => $order['id'],
                'reference' => $order['reference'],
                'customer_name' => $customer['fullname'],
                'created_at' => $order['created_at'],
                'status' => $order['status'],
                'status_color' => $statusColor[$order['status']]
            ];
        }

        $data = [
            'title' => 'Daftar Pesanan | ADMIN',
            'orders' => $orderDetails,
            'status' => $status,
            'sortBy' => $sort
        ];
        
        session()->remove('Order Search Info');
        session()->remove('Order Not Found');

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
        $customer = $this->customerModel->withDeleted()->where('id', $order['customer_id'])->first();
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

    public function editOrderStatus()
    {
        $orderID = $this->request->getVar('order_id');
        $status = $this->request->getVar('status');

        if ($this->orderModel->update($orderID, ['status' => $status])) {
            session()->setFlashdata('success', 'Status pesanan berhasil diubah!');
        } else {
            session()->setFlashdata('error', 'Status pesanan gagal diubah!');
        };

        return redirect()->back();
    }
    
    public function searchOrder()
    {
        $statusColor = [
            'dibatalkan' => 'badge-red',
            'menunggu diproses' => 'badge-gray',
            'diproses' => 'badge-yellow',
            'siap diambil' => 'badge-blue',
            'selesai' => 'badge-green'
        ];

        $keyword = $this->request->getVar('keyword');
        $orders = $this->orderModel->getOrderBySearch($keyword);

        $orderDetails = [];
        foreach ($orders as $order) {
            $customer = $this->customerModel->withDeleted()->getCustomerById($order['customer_id']);
            $orderDetails[] = [
                'id' => $order['id'],
                'reference' => $order['reference'],
                'customer_name' => $customer['fullname'],
                'created_at' => $order['created_at'],
                'status' => $order['status'],
                'status_color' => $statusColor[$order['status']]
            ];
        }

        $data = [
            'title' => 'Daftar Pesanan | ADMIN',
            'orders' => $orderDetails,
            'status' => ''
        ];

        if (empty($data['orders'])) {
            session()->setFlashdata('Order Not Found', 'Hasil tidak ditemukan!');
            session()->remove('Order Search Info');
        } else {
            session()->setFlashdata('Order Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Order Not Found');
        }

        return view('admin/order/index', $data);
    }
}
