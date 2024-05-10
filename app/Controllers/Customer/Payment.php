<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\TransactionModel;
use App\Models\Customer\ProductModel;
use App\Models\Customer\CartModel;
use App\Models\Admin\CustomerModel;
use Midtrans\Config;
use Midtrans\Snap;

class Payment extends BaseController
{
    protected $transactionModel;
    protected $cartModel;
    protected $productModel;
    protected $customerModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
        $this->customerModel = new CustomerModel();
        Config::$serverKey = 'SB-Mid-server-pzDcwPlXshvIxjJMLEvZtQdx';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkout()
    {
        $customerId = 1;

        $cartItems = $this->cartModel->getCartByCustomerId($customerId);
        $customerData = $this->customerModel->getCustomerById($customerId);

        $cartDetails = [];
        foreach ($cartItems as $cartItem) {
            $product = $this->productModel->getProductById($cartItem['product_id']);
            $cartDetails[] = [
                'id' => $cartItem['id'],
                'customer_id' => $cartItem['customer_id'],
                'product_id' => $cartItem['product_id'],
                'product_name' => $product['name'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
                'total' => $cartItem['quantity'] * $cartItem['price']
            ];
        }

        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($cartDetails as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['total'];
        }

        // Params for Snap Token
        $transactionDetails = [
            'order_id' => rand(),
            'gross_amount' => $totalPrice,
        ];

        $itemDetails = [];
        foreach ($cartDetails as $item) {
            $itemDetails[] = [
                'id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $item['product_name'],
            ];
        }

        $customerDetails = [
            'first_name' => $customerData['fullname'],
            'username' => $customerData['username'],
            'email' => $customerData['email'],
            'phone' => $customerData['phone_number'],
            'address' => $customerData['address']
        ];

        $data = [
            'title' => 'Checkout',
            'cart' => $cartDetails,
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice,
            'transaction_details' => $transactionDetails,
            'snapToken' => Snap::getSnapToken([
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails
            ])
        ];

        return view('customer/checkout', $data);
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
        } else {
            $response = [
                'success' => false
            ];
        }

        return json_encode($response);
    }
}
