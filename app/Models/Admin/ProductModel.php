<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug', 'category', 'description', 'price', 'stock', 'image'];

    public function getProducts()
    {
        return $this->findAll();
    }

    public function getProductById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getProductBySlug($slug)
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
            ->orLike('category', $keyword)
            ->orLike('description', $keyword)
            ->orLike('price', $keyword)
            ->orLike('stock', $keyword)
            ->findAll();
    }

    public function getTotalProducts()
    {
        return $this->countAllResults();
    }
}
