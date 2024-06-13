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
        $this->deleteItemAfter3Hours();

        $category = $this->request->getVar('category');
        $category = ($category === 'semua') ? null : $category;

        $data = [
            'title' => 'Daftar Produk',
            'category' => $category,
            'products' => !$category ? $this->productModel->getProducts() : $this->productModel->getProductsByCategory($category),
            'pager' => $this->productModel->pager,
            'validation' => session()->getFlashdata('validation')
        ];
        
        session()->remove('Product Search Info');
        session()->remove('Product Not Found');

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

    public function searchProduct()
    {
        $this->deleteItemAfter3Hours();

        $keyword = $this->request->getVar('keyword');
        $currentPage = $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1;

        $data = [
            'title' => 'Daftar Produk | ADMIN',
            'category' => '',
            'pager' => $this->productModel->pager,
            'currentPage' => $currentPage,
            'products' => $this->productModel->getProductBySearch($keyword)
        ];

        if (empty($data['products'])) {
            session()->setFlashdata('Product Not Found', 'Hasil tidak ditemukan!');
            session()->remove('Product Search Info');
        } else {
            session()->setFlashdata('Product Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Product Not Found');
        }

        return view('customer/product/index', $data);
    }

    public function addToCart()
    {
        $config = $this->productModel->validation();

        if (!$this->validate($config)) {
            return redirect()->to(base_url('products'))->withInput()->with('validation', $this->validator);
        }

        $productId = $this->request->getVar('product_id');
        $quantity  = $this->request->getVar('quantity');

        $product = $this->productModel->find($productId);

        if ($quantity > $product['stock']) {
            session()->setFlashdata('Stock Not Available', 'Jumlah pesanan melebihi stok produk!');
            return redirect()->to(base_url('products'));
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

        return redirect()->back();
    }

    public function deleteItemAfter3Hours()
    {
        $carts = $this->cartModel->findAll();
        foreach ($carts as $cart) {
            if (time() - strtotime($cart['created_at']) > 3 * 3600) {
                $product = $this->productModel->getProductById($cart['product_id']);
                $product['stock'] += $cart['quantity'];
                $this->productModel->save($product);
                $this->cartModel->delete($cart['id']);
            }
        }

        return redirect()->to(base_url('products'));
    }
}
