<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProductModel;
use App\Models\Admin\OrderModel;
use App\Models\Admin\CustomerModel;
use Dompdf\Dompdf;

class Report extends BaseController
{
    protected $orderModel;
    protected $customerModel;
    protected $productModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->customerModel = new CustomerModel();
        $this->productModel = new ProductModel();
    }

    private function getMonthName($monthNumber)
    {
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $months[(int)$monthNumber] ?? 'Unknown';
    }
    
    public function generateOrderReport($month)
    {
        if ($month === 'all') {
            $orders = $this->orderModel->findAll();
            $monthName = 'Semua Data';
        } else {
            $year = date('Y');
            $startDate = "{$year}-{$month}-01";
            $endDate = date("Y-m-t", strtotime($startDate));
            $orders = $this->orderModel->where('created_at >=', $startDate)->where('created_at <=', $endDate)->findAll();
            $monthName = $this->getMonthName($month);
        }

        // Calculate total revenue using bcadd
        $totalRevenue = '0';
        $orderDetails = [];
        foreach ($orders as $order) {
            $totalRevenue = bcadd($totalRevenue, $order['total_price'], 2);
            $customer = $this->customerModel->withDeleted()->find($order['customer_id']);
            $orderDetails[] = [
                'id' => $order['id'],
                'created_at' => $order['created_at'],
                'customer_name' => $customer['fullname'],
                'deleted_at' => $customer['deleted_at'],
                'status' => $order['status'],
                'total_price' => $order['total_price'],
            ];
        }

        // Load Tailwind CSS
        $css = file_get_contents(FCPATH . 'css/output.css');

        // Generate PDF using DomPDF
        $dompdf = new Dompdf();
        $html = view('admin/report/order', [
            'title' => 'Laporan | ADMIN',
            'orders' => $orderDetails,
            'totalRevenue' => $totalRevenue,
            'month' => $monthName
        ]);
        $html = "<style>$css</style>$html";
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("laporan-{$month}.pdf"); // Download file PDF
    }

    public function generateProductReport($product)
    {
        if ($product === 'all') {
            $products = $this->productModel->findAll();
        } else {
            $products = $this->productModel->where('stock', 0)->findAll();
        }

        // Load Tailwind CSS
        $css = file_get_contents(FCPATH . 'css/output.css');

        // Generate PDF using DomPDF
        $dompdf = new Dompdf();
        $html = view('admin/report/product', [
            'title' => 'Laporan | ADMIN',
            'products' => $products,
            'totalProducts' => count($products),
            'info' => $product === 'all' ? 'Semua Produk' : 'Stok Habis'
        ]);
        $html = "<style>$css</style>$html";
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("laporan-produk-{$product}.pdf"); // Download file PDF
    }

    public function generateCustomerReport($customer)
    {
        if ($customer === 'all') {
            $customers = $this->customerModel->withDeleted()->findAll();
            $info = 'Semua Data';
        } elseif ($customer === 'active') {
            $customers = $this->customerModel->findAll();
            $info = 'Status Aktif';
        } else {
            $customers = $this->customerModel->withDeleted()->where('deleted_at IS NOT NULL')->findAll();
            $info = 'Status Tidak Aktif';
        }

        // Load Tailwind CSS
        $css = file_get_contents(FCPATH . 'css/output.css');

        // Generate PDF using DomPDF
        $dompdf = new Dompdf();
        $html = view('admin/report/customer', [
            'title' => 'Laporan | ADMIN',
            'customers' => $customers,
            'totalCustomers' => count($customers),
            'info' => $info
        ]);
        $html = "<style>$css</style>$html";
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("laporan-pelanggan-{$customer}.pdf"); // Download file PDF
    }
}