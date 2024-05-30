<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\ProfileModel;
use App\Models\Admin\AdminModel;

class Profile extends BaseController
{
    protected $profileModel;
    protected $adminModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        $this->adminModel = new AdminModel();
    }

    public function viewInfo()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Profil | ADMIN',
            'profile' => $this->adminModel->getAdminById($id)
        ];

        return view('admin/profile/index', $data);
    }

    public function viewEditProfile()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Edit Profil | ADMIN',
            'profile' => $this->adminModel->getAdminById($id),
            'validation' => session('validation')
        ];

        return view('admin/profile/edit', $data);
    }

    public function updateAdminProfile()
    {
        $id = session()->get('id');

        $oldData = $this->adminModel->getAdminById($id);

        if ($oldData['username'] == $this->request->getVar('username')) {
            $usernameRule = 'required';
        } else {
            $usernameRule = 'required|is_unique[admins.username]|regex_match[/^\S*$/]';
        }

        if ($oldData['email'] == $this->request->getVar('email')) {
            $emailRule = 'required';
        } else {
            $emailRule = 'required|is_unique[admins.email]|valid_email';
        }
        
        if ($oldData['phone_number'] == $this->request->getVar('phone_number')) {
            $phoneNumberRule = 'required';
        } else {
            $phoneNumberRule = 'required|is_unique[admins.phone_number]';
        }

        $config = $this->profileModel->validation($usernameRule, $emailRule, $phoneNumberRule);

        if (!$this->validate($config)) {
            return redirect()->to(base_url('admin/profile/edit'))->withInput()->with('validation', $this->validator->getErrors());
        }

        $avatar = $this->request->getFile('avatar');
        $oldAvatar = $this->request->getVar('old_avatar');

        if ($avatar->getError() == 4) {
            $avatarName = $oldAvatar;
        } else {
            $avatarName = $avatar->getRandomName();
            $avatar->move('img/avatars/admin/', $avatarName);

            if ($oldAvatar != 'default-avatar.webp') {
                unlink('img/avatars/admin/' . $oldAvatar);
            }
        }

        $data = [
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'gender' => $this->request->getVar('gender'),
            'phone_number' => $this->request->getVar('phone_number'),
            'avatar' => $avatarName
        ];

        $this->profileModel->save($data);

        session()->setFlashdata('success', 'Data berhasil diubah!');
        session()->set(['avatar' => $avatarName]);

        return redirect()->to(base_url('admin/profile'));
    }
}
