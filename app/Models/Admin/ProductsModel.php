<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug', 'category', 'description', 'price', 'stock', 'image'];

    public function getProducts()
    {
        return $this->findAll();
    }

    public function getProductsById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getProductsBySlug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function getProductsByCategory($category)
    {
        return $this->where(['category' => $category])->findAll();
    }

    public function getProductBySearch($keyword)
    {
        return $this->like('name', $keyword)
                    ->orWhere('category', $keyword)
                    ->orWhere('description', $keyword)
                    ->findAll();
    }
}
