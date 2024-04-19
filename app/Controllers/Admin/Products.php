<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    public function viewProducts()
    {
        $category = $this->request->getVar('category');

        $category = ($category === 'all') ? null : $category;

        $data = [
            'title' => 'Daftar Produk | ADMIN',
            'category' => $category,
            'products' => !$category ? $this->productsModel->getProducts() : $this->productsModel->getProductsByCategory($category),
            'flashMessages' => [
                'Create Success' => ['id' => 'alert-create-success', 'message' => session()->getFlashdata('Create Success')],
                'Edit Success' => ['id' => 'alert-edit-success', 'message' => session()->getFlashdata('Edit Success')],
                'Delete Success' => ['id' => 'alert-delete-success', 'message' => session()->getFlashdata('Delete Success')],
            ]
        ];

        return view('admin/products/index', $data);
    }

    public function viewProductDetail($slug)
    {
        $data = [
            'title' => 'Detail Produk | ADMIN',
            'product' => $this->productsModel->getProductBySlug($slug)
        ];

        return view('admin/products/detail', $data);
    }

    public function viewCreateProduct()
    {
        $data = [
            'title' => 'Tambah Produk | ADMIN',
            'validation' => session()->getFlashdata('validation')
        ];

        return view('admin/products/create', $data);
    }

    public function searchProduct()
    {
        $keyword = $this->request->getVar('keyword');

        $data = [
            'title' => 'Daftar Produk | ADMIN',
            'category' => '',
            'products' => $this->productsModel->getProductBySearch($keyword)
        ];

        if (empty($data['products'])) {
            session()->setFlashdata('Product Not Found', 'Hasil pencarian: ' . $keyword . ', tidak ditemukan!');
            session()->remove('Product Search Info');
        } else {
            session()->setFlashdata('Product Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Product Not Found');
        }

        return view('admin/products/index', $data);
    }

    public function saveProduct()
    {
        $config = [
            'name' => [
                'rules' => 'required|is_unique[products.name]',
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong!',
                    'is_unique' => 'Nama produk sudah digunakan!'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu kategori!'
                ]
            ],
            'stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Stok tidak boleh kosong!',
                    'integer' => 'Stok harus berupa bilangan bulat!'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong!',
                    'numeric' => 'Harga harus berupa angka!'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi produk tidak boleh kosong!'
                ]
            ]
        ];

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
            'category' => $this->request->getVar('category'),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description')
        ];

        $this->productsModel->save($data);

        session()->setFlashdata('Create Success', 'Data berhasil ditambahkan!');

        return redirect()->to('admin/products');
    }

    public function viewEditProduct($slug)
    {
        $data = [
            'title' => 'Edit Produk | ADMIN',
            'validation' => session()->getFlashdata('validation'),
            'product' => $this->productsModel->getProductBySlug($slug)
        ];

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' tidak ditemukan');
        }

        return view('admin/products/edit', $data);
    }

    public function updateProduct($id)
    {
        $oldName = $this->productsModel->getProductById($id);

        if ($oldName['name'] == $this->request->getVar('name')) {
            $nameRule = 'required';
        } else {
            $nameRule = 'required|is_unique[products.name]';
        }

        $config = [
            'name' => [
                'rules' => $nameRule,
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong!',
                    'is_unique' => 'Nama produk sudah digunakan!'
                ]
            ],
            'stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Stok tidak boleh kosong!',
                    'integer' => 'Stok harus berupa bilangan bulat!'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong!',
                    'numeric' => 'Harga harus berupa angka!'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi produk tidak boleh kosong!'
                ]
            ]
        ];

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description')
        ];

        $this->productsModel->save($data);

        session()->setFlashdata('Edit Success', 'Data berhasil diubah!');

        return redirect()->to('admin/products');
    }

    public function deleteProduct($id)
    {
        $this->productsModel->delete($id);

        session()->setFlashdata('Delete Success', 'Data berhasil dihapus!');

        return redirect()->to('admin/products');
    }
}
