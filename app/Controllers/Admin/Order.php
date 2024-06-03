<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;
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
        $currentPage = $this->request->getVar('page_orders') ? $this->request->getVar('page_orders') : 1;

        $statusColor = [
            'Dibatalkan' => 'badge-red',
            'Menunggu Diproses' => 'badge-gray',
            'Diproses' => 'badge-yellow',
            'Siap Diambil' => 'badge-blue',
            'Selesai' => 'badge-green'
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
            'sortBy' => $sort,
            'pager' => $this->orderModel->pager,
            'currentPage' => $currentPage
        ];
        
        session()->remove('Order Search Info');
        session()->remove('Order Not Found');

        return view('admin/order/index', $data);
    }

    public function viewOrderDetail($params)
    {
        $statusColor = [
            'Dibatalkan' => 'badge-red',
            'Menunggu Diproses' => 'badge-gray',
            'Diproses' => 'badge-yellow',
            'Siap Diambil' => 'badge-blue',
            'Selesai' => 'badge-green'
        ];

        $order = $this->orderModel->getOrderDetails($params);
        $customer = $this->customerModel->withDeleted()->where('id', $order['customer_id'])->first();
        $orderItems = $this->orderItemModel->where('order_id', $order['id'])->findAll();
        $transaction = $this->transactionModel->where('id', $order['transaction_id'])->first();

        $item = [];
        foreach ($orderItems as &$orderItem) {
            $product = $this->productModel->withDeleted()->where('id', $orderItem['product_id'])->first();
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

    public function updateOrderStatus()
    {
        $orderId = $this->request->getVar('order_id');
        $newStatus = $this->request->getVar('status');
        $orderRef = $this->request->getVar('reference');

        $order = $this->orderModel->where('id', $orderId)->first();
        $customer = $this->customerModel->withDeleted()->where('id', $order['customer_id'])->first();
        $customerEmail = $customer['email'];

        if ($this->orderModel->update($orderId, ['status' => $newStatus])) {
            if ($newStatus === 'Siap Diambil') {
                $this->sendNotification($orderId, $customerEmail);
            }
            session()->setFlashdata('success', 'Status pesanan berhasil diperbarui!');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui status pesanan!');
        }

        return redirect()->to(base_url('admin/order/' . $orderRef));
    }
    
    public function searchOrder()
    {
        $statusColor = [
            'Dibatalkan' => 'badge-red',
            'Menunggu Diproses' => 'badge-gray',
            'Diproses' => 'badge-yellow',
            'Siap Diambil' => 'badge-blue',
            'Selesai' => 'badge-green'
        ];

        $keyword = $this->request->getVar('keyword');
        $orders = $this->orderModel->getOrderBySearch($keyword);
        $currentPage = $this->request->getVar('page_orders') ? $this->request->getVar('page_orders') : 1;

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
            'status' => '',
            'pager' => $this->orderModel->pager,
            'currentPage' => $currentPage
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

    public function sendNotification($orderId, $email)
    {
        $customer = $this->customerModel->where('email', $email)->first();
        $data = [
            'orderId' => $orderId,
            'customerName' => $customer['fullname']
        ];

        $emailService = Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Pesanan Siap Diambil');
        $emailService->setMessage(view('email/order_ready', $data));
        $emailService->send();

        return;
    }
}
