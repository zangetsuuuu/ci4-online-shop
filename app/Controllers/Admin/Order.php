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
            'title' => 'Daftar Pesanan | ADMIN',
            'totalIncome' => $this->orderModel->getTotalIncome(),
            'totalProducts' => $this->productModel->getTotalProducts(),
            'totalOrders' => $this->orderModel->getTotalOrders(),
            'totalCustomers' => $this->customerModel->getTotalCustomers(),
            'orders' => $orderDetails
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
}
