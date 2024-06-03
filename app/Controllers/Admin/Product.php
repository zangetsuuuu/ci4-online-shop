<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function viewProducts()
    {
        $category = $this->request->getVar('category');
        $category = ($category === 'semua') ? null : $category;
        $currentPage = $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1;

        $data = [
            'title' => 'Daftar Produk | ADMIN',
            'category' => $category,
            'products' => !$category ? $this->productModel->getProducts() : $this->productModel->getProductsByCategory($category),
            'pager' => $this->productModel->pager,
            'currentPage' => $currentPage,
            'flashMessages' => [
                'Create Success' => ['id' => 'alert-create-success', 'message' => session()->getFlashdata('Create Success')],
                'Edit Success' => ['id' => 'alert-edit-success', 'message' => session()->getFlashdata('Edit Success')],
                'Delete Success' => ['id' => 'alert-delete-success', 'message' => session()->getFlashdata('Delete Success')],
            ]
        ];

        session()->remove('Product Not Found');

        return view('admin/product/index', $data);
    }

    public function viewProductDetail($slug)
    {
        $data = [
            'title' => 'Detail Produk | ADMIN',
            'product' => $this->productModel->getProductBySlug($slug)
        ];

        return view('admin/product/detail', $data);
    }

    public function viewCreateProduct()
    {
        $data = [
            'title' => 'Tambah Produk | ADMIN',
            'validation' => session('validation')
        ];

        return view('admin/product/create', $data);
    }

    public function searchProduct()
    {
        $keyword = $this->request->getVar('keyword');
        $currentPage = $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1;

        $data = [
            'title' => 'Daftar Produk | ADMIN',
            'category' => '',
            'products' => $this->productModel->getProductBySearch($keyword),
            'pager' => $this->productModel->pager,
            'currentPage' => $currentPage
        ];

        if (empty($data['products'])) {
            session()->setFlashdata('Product Not Found', 'Hasil tidak ditemukan!');
            session()->remove('Product Search Info');
        } else {
            session()->setFlashdata('Product Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Product Not Found');
        }

        return view('admin/product/index', $data);
    }

    public function saveProduct()
    {
        $config = $this->productModel->saveValidation();

        if (!$this->validate($config)) {
            return redirect()->to(base_url('admin/products/create'))->withInput()->with('validation', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = 'placeholder.webp';
        } else {
            $imageName = $image->getRandomName();
            $image->move('img/products', $imageName);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
            'category' => $this->request->getVar('category'),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
            'image' => $imageName
        ];

        $this->productModel->save($data);

        session()->setFlashdata('Create Success', 'Data berhasil ditambahkan!');

        return redirect()->to(base_url('admin/products'));
    }

    public function viewEditProduct($slug)
    {
        $data = [
            'title' => 'Edit Produk | ADMIN',
            'product' => $this->productModel->getProductBySlug($slug)
        ];

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' tidak ditemukan');
        }

        return view('admin/product/edit', $data);
    }

    public function updateProduct($id)
    {
        $oldName = $this->productModel->getProductById($id);

        if ($oldName['name'] == $this->request->getVar('name')) {
            $nameRule = 'required';
        } else {
            $nameRule = 'required|is_unique[products.name]';
        }

        $config = $this->productModel->updateValidation($nameRule);

        if (!$this->validate($config)) {
            return redirect()->to(base_url('admin/products/edit'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = $this->request->getVar('old_image');
        } else {
            $imageName = $image->getRandomName();
            $image->move('img/products', $imageName);
        }

        $data = [
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
            'category' => $this->request->getVar('category'),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
            'image' => $imageName
        ];

        $this->productModel->save($data);

        session()->setFlashdata('Edit Success', 'Data berhasil diubah!');

        return redirect()->to(base_url('admin/products'));
    }

    public function deleteProduct($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product['image'] != 'placeholder.webp') {
            unlink('img/products/' . $product['image']);
        }
        
        $this->productModel->delete($id);

        session()->setFlashdata('Delete Success', 'Data berhasil dihapus!');

        return redirect()->to(base_url('admin/products'));
    }
}
