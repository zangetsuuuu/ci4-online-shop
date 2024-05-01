<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\TransactionModel;
use App\Models\Customer\CartModel;

class Payment extends BaseController
{
    protected $transactionModel;
    protected $cartModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->cartModel = new CartModel();
    }

    public function success()
    {
        $data = [
            'title' => 'Pembayaran Berhasil!',
        ];

        return view('customer/snap/success', $data);
    }

    public function failed()
    {
        $data = [
            'title' => 'Pembayaran Gagal!',
        ];

        return view('customer/snap/failed', $data);
    }

    public function saveTransaction()
    {
        $transaction = json_decode(file_get_contents('php://input'), true);

        $data = [
            'midtrans_transaction_id' => $transaction['transaction_id'],
            'midtrans_order_id' => $transaction['order_id'],
            'status' => $transaction['transaction_status'],
            'amount' => $transaction['gross_amount'],
            'payment_type' => $transaction['payment_type'],
            'transaction_time' => $transaction['transaction_time'],
            'fraud_status' => $transaction['fraud_status']
        ];

        // Save transaction data to database
        $saveTransaction = $this->transactionModel->save($data);

        if ($saveTransaction && $transaction['transaction_status'] == 'settlement') {
            $response = [
                'success' => true
            ];

            $customerId = 1;
            $this->cartModel->where('customer_id', $customerId)->delete();
        }
        else {
            $response = [
                'success' => false
            ];
        }

        return json_encode($response);
    }
}
