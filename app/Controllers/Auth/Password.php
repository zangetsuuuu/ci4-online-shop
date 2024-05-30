<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Config\Services;
use App\Models\Admin\CustomerModel;
use App\Models\Auth\PasswordModel;

class Password extends BaseController
{
    protected $customerModel;
    protected $passwordModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->passwordModel = new PasswordModel();
    }

    public function admin()
    {
        $data = [
            'title' => 'Reset Password | ADMIN'
        ];

        return view('auth/admin/change-password', $data);
    }

    public function customers()
    {
        $data = [
            'title' => 'Email Verifikasi',
        ];

        return view('auth/customer/send_email', $data);
    }

    public function sendEmail()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');

        $customer = $this->customerModel->where('username', $username)->where('email', $email)->first();
        if (!$customer) {
            return redirect()->to(base_url('forgot-password'))->with('error', 'Username atau email tidak valid!');
        }

        $token = bin2hex(random_bytes(50));

        $data = [
            'email' => $email,
            'token' => $token,
            'created_at' => Time::now()
        ];

        $this->passwordModel->save($data);

        $resetLink = base_url('auth/reset?token=' . $token . '&email=' . urlencode($email));

        $emailData = [
            'resetLink' => $resetLink,
            'customerName' => $customer['fullname']
        ];

        // Send email
        $emailService = Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Permintaan Reset Password');
        $emailService->setMessage(view('email/password_reset', $emailData));

        if ($emailService->send()) {
            return redirect()->to(base_url('forgot-password'))->with('success', 'Email berhasil dikirim!');
        } else {
            return redirect()->to(base_url('forgot-password'))->with('email-error', 'Gagal mengirim email!');
        }
    }

    public function resetForm()
    {
        $this->resetLinkExpiredAfter30Min();

        $token = $this->request->getVar('token');
        $email = $this->request->getVar('email');

        $resetRecord = $this->passwordModel->where('email', $email)->where('token', $token)->first();
        $customer = $this->customerModel->where('email', $email)->first();

        if ($resetRecord['is_expired']) {
            return view('auth/customer/link_expired', [
                'title' => 'Link Kadaluarsa',
                'username' => $customer['username'],
                'email' => $email
            ]);
        }

        $data = [
            'title' => 'Reset Password',
            'token' => $token,
            'email' => $email,
            'validation' => session('validation')
        ];

        return view('auth/customer/reset_password', $data);
    }

    public function reset()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');

        $config = $this->passwordModel->resetValidation();

        if (!$this->validate($config)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $resetRecord = $this->passwordModel->where('email', $email)->where('token', $token)->first();

        if (!$resetRecord) {
            return redirect()->back()->with('error', 'Email atau token tidak valid!');
        }

        $customer = $this->customerModel->where('email', $email)->first();
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->customerModel->update($customer['id'], ['password' => $newPassword]);

        $this->passwordModel->where('email', $email)->delete();

        return redirect()->to(base_url('login'))->with('message', 'Password berhasil direset!');
    }

    public function resetLinkExpiredAfter30Min()
    {
        $password = $this->passwordModel->findAll();
        foreach ($password as $pass) {
            if (time() - strtotime($pass['created_at']) > 1800) {
                $this->passwordModel->update($pass['id'], ['is_expired' => 1]);
            } elseif (time() - strtotime($pass['created_at']) > 24 * 3600) {
                $this->passwordModel->delete($pass['id']);
            }
        }

        return;
    }
}
