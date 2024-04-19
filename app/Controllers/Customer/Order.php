<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;

class Order extends BaseController
{
    public function viewOrders()
    {
        $data = [
            'title' => 'Daftar Pesanan'
        ];

        return view('customer/order/index', $data);
    }

    public function viewOrderDetail()
    {
        $data = [
            'title' => 'Detail Pesanan'
        ];

        return view('customer/order/detail', $data);
    }
}
