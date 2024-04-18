<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\CustomersModel;

class Customers extends BaseController
{
    protected $customersModel;

    public function __construct()
    {
        $this->customersModel = new CustomersModel();
    }

    public function viewCustomers()
    {
        $data = [
            'title' => 'Daftar Pelanggan | ADMIN',
            'customers' => $this->customersModel->getCustomers()
        ];

        return view('admin/customers/index', $data);
    }

    public function viewCustomerDetail($username)
    {
        $data = [
            'title' => 'Detail Pelanggan | ADMIN',
            'customer' => $this->customersModel->getCustomerByUsername($username)
        ];

        return view('admin/customers/detail', $data);
    }

    public function searchCustomer()
    {
        $keyword = $this->request->getVar('keyword');

        $data = [
            'title' => 'Daftar Pelanggan | ADMIN',
            'customers' => $this->customersModel->getCustomerBySearch($keyword)
        ];

        if (empty($data['customers'])) {
            session()->setFlashdata('Customer Not Found', 'Hasil pencarian: ' . $keyword . ', tidak ditemukan!');
            session()->remove('Customer Search Info');
        } else {
            session()->setFlashdata('Customer Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Customer Not Found');
        }

        return view('admin/customers/index', $data);
    }

    public function deleteCustomer($id)
    {
        $this->customersModel->delete($id);

        session()->setFlashdata('Delete Success', 'Data pelanggan berhasil dihapus!');

        return redirect()->to('admin/customers');
    }
}
