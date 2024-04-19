<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function viewProducts()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => $this->productModel->getProducts()
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
}
