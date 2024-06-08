<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function viewAdmins()
    {
        $currentPage = $this->request->getVar('page_admins') ? $this->request->getVar('page_admins') : 1;

        $data = [
            'title' => 'Daftar Admin | ADMIN',
            'admins' => $this->adminModel->getAdmins(),
            'pager' => $this->adminModel->pager,
            'currentPage' => $currentPage,
            'flashMessages' => [
                'Register Success' => ['id' => 'alert-create-success', 'message' => session()->getFlashdata('Register Success')],
                'Delete Success' => ['id' => 'alert-delete-success', 'message' => session()->getFlashdata('Delete Success')],
            ]
        ];

        session()->remove('Admin Search Info');
        session()->remove('Admin Not Found');

        return view('admin/index', $data);
    }

    public function viewAdminDetail($username)
    {
        $data = [
            'title' => 'Detail Admin | ADMIN',
            'admin' => $this->adminModel->getAdminByUsername($username),
            
        ];

        if (empty($data['admin'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data admin tidak ditemukan!');
        }

        return view('admin/detail', $data);
    }

    public function searchAdmin()
    {
        $keyword = $this->request->getVar('keyword');
        $currentPage = $this->request->getVar('page_admins') ? $this->request->getVar('page_admins') : 1;

        $data = [
            'title' => 'Daftar Admin | ADMIN',
            'admins' => $this->adminModel->getAdminBySearch($keyword),
            'pager' => $this->adminModel->pager,
            'currentPage' => $currentPage
        ];

        if (empty($data['admins'])) {
            session()->setFlashdata('Admin Not Found', 'Hasil tidak ditemukan!');
            session()->remove('Admin Search Info');
        } else {
            session()->setFlashdata('Admin Search Info', 'Hasil pencarian: ' . $keyword);
            session()->remove('Admin Not Found');
        }

        return view('admin/index', $data);
    }

    public function deleteAdmin($id)
    {
        $admin = $this->adminModel->getAdminById($id);
        if ($admin['avatar'] != 'default-avatar.webp') {
            unlink('img/avatars/admin/' . $admin['avatar']);
        }

        $this->adminModel->delete($id);

        session()->setFlashdata('Delete Success', 'Data admin berhasil dihapus!');

        return redirect()->to(base_url('admin/list'));
    }
}
