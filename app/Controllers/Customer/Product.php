<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\ProductModel;
use App\Models\Customer\CartModel;

class Product extends BaseController
{
    protected $productModel;
    protected $cartModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
    }

    public function viewProducts()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => $this->productModel->getProducts(),
            'validation' => session()->getFlashdata('validation')
        ];

        return view('customer/product/index', $data);
    }

    public function viewProductDetail($slug)
    {
        $data = [
            'title' => 'Detail Produk',
            'product' => $this->productModel->getProductBySlug($slug)
        ];

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' tidak ditemukan');
        }

        return view('customer/product/detail', $data);
    }

    public function addToCart()
    {
        $config = $this->productModel->validation();

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $productId = $this->request->getVar('product_id');
        $quantity  = $this->request->getVar('quantity');

        $product = $this->productModel->find($productId);

        if ($quantity > $product['stock']) {
            session()->setFlashdata('Stock Not Available', 'Jumlah pesanan melebihi stok produk!');
            return redirect()->back();
        }

        $cartItem = $this->cartModel->where('product_id', $productId)
            ->where('customer_id', session()->get('id'))
            ->first();

        if ($cartItem) {
            $this->cartModel->update($cartItem['id'], ['quantity' => $cartItem['quantity'] + $quantity]);
        } else {
            $data = [
                'customer_id' => session()->get('id'),
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product['price']
            ];

            $this->cartModel->save($data);
        }

        $newStock = $product['stock'] - $quantity;
        $this->productModel->update($productId, ['stock' => $newStock]);

        session()->setFlashdata('Add Success', 'Berhasil ditambahkan ke keranjang!');

        return redirect()->to('products');
    }

}
