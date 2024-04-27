<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['customer_id', 'product_id', 'quantity', 'price'];

    public function getCart($id)
    {
        return $this->where('id', $id)->first();
    }
    
    public function getCartByCustomerId($id)
    {
        return $this->where('customer_id', $id)->findAll();
    }
}
