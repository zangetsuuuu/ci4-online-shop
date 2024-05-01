<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\CartModel;
use App\Models\Customer\ProductModel;
use App\Models\Admin\CustomerModel;
use Midtrans\Config;
use Midtrans\Snap;

class Cart extends BaseController
{
    protected $cartModel;
    protected $productModel;
    protected $customerModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        $this->customerModel = new CustomerModel();
        Config::$serverKey = 'SB-Mid-server-pzDcwPlXshvIxjJMLEvZtQdx';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function viewCart()
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
            'title' => 'Keranjang',
            'cart' => $cartDetails,
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice,
            'validation' => session()->getFlashdata('validation'),
            'flashMessages' => [
                'Edit Success' => ['id' => 'alert-edit-success', 'message' => session()->getFlashdata('Edit Success')],
                'Delete Success' => ['id' => 'alert-delete-success', 'message' => session()->getFlashdata('Delete Success')],
            ],
            'transaction_details' => $transactionDetails,
            'snapToken' => Snap::getSnapToken([
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails
            ])
        ];

        return view('customer/cart', $data);
    }

    public function updateCartItem()
    {
        $config = [
            'quantity' => [
                'rules' => 'required|integer|less_than[stock]',
                'errors' => [
                    'required' => 'Jumlah produk tidak boleh kosong!',
                    'integer' => 'Jumlah produk harus berupa bilangan bulat!',
                    'less_than' => 'Jumlah pesanan tidak boleh lebih dari stok!'
                ]
            ]
        ];

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $cartId = $this->request->getVar('cart_id');
        $quantity = $this->request->getVar('quantity');

        $cartItem = $this->cartModel->getCart($cartId);

        $productId = $cartItem['product_id'];

        $product = $this->productModel->getProductById($productId);

        if ($quantity > $product['stock']) {
            session()->setFlashdata('Stock Not Available', 'Jumlah pesanan melebihi stok produk!');
            return redirect()->back();
        }

        $this->cartModel->update($cartId, ['quantity' => $quantity]);

        $newStock = $product['stock'] + $cartItem['quantity'] - $quantity;
        $this->productModel->update($productId, ['stock' => $newStock]);

        session()->setFlashdata('Edit Success', 'Jumlah pesanan berhasil diperbarui!');
        return redirect()->back();
    }

    public function deleteCartItem($id)
    {
        $cart = $this->cartModel->getCart($id);

        $product = $this->productModel->getProductById($cart['product_id']);
        $product['stock'] += $cart['quantity'];
        $this->productModel->save($product);

        $this->cartModel->delete($id);

        session()->setFlashdata('Delete Success', 'Item berhasil dihapus!');

        return redirect()->to('cart');
    }
}
