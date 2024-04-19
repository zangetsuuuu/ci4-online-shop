<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'description', 'price', 'stock', 'image'];

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
}
