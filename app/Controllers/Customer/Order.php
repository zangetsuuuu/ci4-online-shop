<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\OrderModel;
use App\Models\Customer\OrderItemModel;
use App\Models\Customer\ProductModel;
use App\Models\Customer\TransactionModel;
use App\Models\Admin\CustomerModel;
use App\Models\Admin\AdminModel;

class Order extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;
    protected $productModel;
    protected $transactionModel;
    protected $customerModel;
    protected $adminModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->customerModel = new CustomerModel();
        $this->adminModel = new AdminModel();
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
            session()->setFlashdata('status', 'Pesanan dengan status: ' . $status);
        } elseif ($sort) {
            $orders = $this->orderModel->sortOrders($sort);
        } else {
            $orders = $this->orderModel->getOrders();
            session()->remove('status');
        }

        foreach ($orders as &$order) {
            $order['color'] = $statusColor[$order['status']] ?? 'badge-gray';
        }

        $data = [
            'title' => 'Daftar Pesanan',
            'orders' => $orders,
            'status' => $status,
            'sortBy' => $sort,
            'pager' => $this->orderModel->pager,
            'currentPage' => $currentPage
        ];
        
        session()->remove('Order Search Info');
        session()->remove('Order Not Found');

        return view('customer/order/index', $data);
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
            'color' => $statusColor[$order['status']],
            'admin' => $this->adminModel->first()
        ];

        return view('customer/order/detail', $data);
    }

    public function setOrderFilters()
    {
        $statusColor = [
            'Dibatalkan' => 'badge-red',
            'Menunggu Diproses' => 'badge-gray',
            'Diproses' => 'badge-yellow',
            'Siap Diambil' => 'badge-blue',
            'Selesai' => 'badge-green'
        ];

        $date = $this->request->getVar('date');
        $status = $this->request->getVar('status');

        $orders = $this->orderModel->getOrders($date, $status);

        foreach ($orders as &$order) {
            $order['color'] = $statusColor[$order['status']] ?? 'text-gray-500 bg-gray-100';
        }

        $data = [
            'title' => 'Daftar Pesanan',
            'orders' => $orders
        ];

        return view('customer/order/index', $data);
    }

    public function setOrderComplete($orderID)
    {
        if ($this->orderModel->update($orderID, ['status' => 'Selesai'])) {
            session()->setFlashdata('success', 'Status pesanan berhasil diubah!');
        } else {
            session()->setFlashdata('error', 'Status pesanan gagal diubah!');
        };

        $reference = $this->request->getVar('reference');
        return redirect()->to(base_url('order/' . $reference));
    }
}
