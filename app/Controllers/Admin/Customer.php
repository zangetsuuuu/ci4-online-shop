<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CustomerModel;
use App\Models\Customer\CartModel;
use App\Models\Admin\ProductModel;
use App\Models\Admin\OrderModel;

class Customer extends BaseController
{
    protected $customerModel;
    protected $cartModel;
    protected $productModel;
    protected $orderModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
    }

    public function viewCustomers()
    {
        $currentPage = $this->request->getVar('page_customers') ? $this->request->getVar('page_customers') : 1;

        $data = [
            'title' => 'Daftar Pelanggan | ADMIN',
            'customers' => $this->customerModel->getCustomers(),
            'pager' => $this->customerModel->pager,
            'currentPage' => $currentPage
        ];

        session()->remove('Customer Search Info');
        session()->remove('Customer Not Found');

        return view('admin/customer/index', $data);
    }

    public function viewCustomerDetail($username)
    {
        $customer = $this->customerModel->getCustomerByUsername($username);
        $customer['total_order'] = $this->orderModel->getTotalOrders($customer['id']);

        $data = [
            'title' => 'Detail Pelanggan | ADMIN',
            'customer' => $customer,
        ];

        return view('admin/customer/detail', $data);
    }

    public function searchCustomer()
    {
        $keyword = $this->request->getVar('keyword');
        $currentPage = $this->request->getVar('page_customers') ? $this->request->getVar('page_customers') : 1;

        $data = [
            'title' => 'Daftar Pelanggan | ADMIN',
            'customers' => $this->customerModel->getCustomerBySearch($keyword),
            'pager' => $this->customerModel->pager,
            'currentPage' => $currentPage
        ];

        if (empty($data['customers'])) {
            session()->setFlashdata('Customer Not Found', 'Hasil tidak ditemukan!');
            session()->remove('Customer Search Info');
        } else {
            session()->setFlashdata('Customer Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Customer Not Found');
        }

        return view('admin/customer/index', $data);
    }

    public function deleteCustomer($id)
    {
        $cart = $this->cartModel->getCartByCustomerId($id);
        if ($cart) {
            foreach ($cart as $row) {
                $product = $this->productModel->getProductById($row['product_id']);
                $totalStock = $product['stock'] + $row['quantity'];
                $this->productModel->update($row['product_id'], ['stock' => $totalStock]);
            }
        }

        $customer = $this->customerModel->getCustomerById($id);
        if ($customer['avatar'] != 'default-avatar.webp') {
            unlink('img/avatars/customer/' . $customer['avatar']);
        }

        $this->customerModel->delete($id);

        session()->setFlashdata('Delete Success', 'Data pelanggan berhasil dihapus!');

        return redirect()->to(base_url('admin/customers'));
    }
}
