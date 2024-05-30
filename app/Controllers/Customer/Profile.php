<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\ProfileModel;
use App\Models\Customer\OrderModel;

class Profile extends BaseController
{
    protected $profileModel;
    protected $orderModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        $this->orderModel = new OrderModel();
    }

    public function viewProfile()
    {
        $data = [
            'title' => 'Profil',
            'profile' => $this->profileModel->getProfileData(),
            'totalOrders' => $this->orderModel->getTotalOrders(),
        ];

        return view('customer/profile/index', $data);
    }

    public function editProfile()
    {
        $data = [
            'title' => 'Edit Profil',
            'profile' => $this->profileModel->getProfileData(),
            'validation' => session()->getFlashdata('validation')
        ];

        return view('customer/profile/edit', $data);
    }

    public function updateProfile()
    {
        $oldData = $this->profileModel->getProfileData();

        if ($oldData['username'] == $this->request->getVar('username')) {
            $usernameRule = 'required';
        } else {
            $usernameRule = 'required|is_unique[customers.username]|regex_match[/^\S*$/]';
        }

        if ($oldData['email'] == $this->request->getVar('email')) {
            $emailRule = 'required';
        } else {
            $emailRule = 'required|is_unique[customers.email]|valid_email';
        }
        
        if ($oldData['phone_number'] == $this->request->getVar('phone_number')) {
            $phoneNumberRule = 'required';
        } else {
            $phoneNumberRule = 'required|is_unique[customers.phone_number]';
        }

        $config = $this->profileModel->validation($usernameRule, $emailRule, $phoneNumberRule);

        if (!$this->validate($config)) {
            return redirect()->to(base_url('profile/edit'))->withInput()->with('validation', $this->validator->getErrors());
        }

        $avatar = $this->request->getFile('avatar');
        $oldAvatar = $this->request->getVar('old_avatar');

        if ($avatar->getError() == 4) {
            $avatarName = $oldAvatar;
        } else {
            $avatarName = $avatar->getRandomName();
            $avatar->move('img/avatars/customer/', $avatarName);

            if ($oldAvatar != 'default-avatar.webp') {
                unlink('img/avatars/customer/' . $oldAvatar);
            }
        }

        $data = [
            'id' => session()->get('id'),
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'gender' => $this->request->getVar('gender'),
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address'),
            'avatar' => $avatarName
        ];
        // dd($data);

        $this->profileModel->save($data);

        session()->setFlashdata('success', 'Data berhasil diubah!');
        session()->set(['avatar' => $avatarName]);

        return redirect()->to(base_url('profile'));
    }
}
