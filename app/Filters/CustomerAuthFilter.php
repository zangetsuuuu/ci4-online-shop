<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\CustomerModel;

class CustomerAuthFilter implements FilterInterface
{
    /**
     * Checks if the user is authenticated and authorized.
     *
     * @param RequestInterface $request
     * @param array|null $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $isLoggedIn = session()->get('isLoggedIn');
        $role = session()->get('role');

        if (!$isLoggedIn) {
            return redirect()->to(base_url('login'));
        }

        if ($role) {
            return redirect()->back();
        }

        if (!$isLoggedIn && isset($_COOKIE['remember_me'])) {
            list($id, $password) = explode(':', $_COOKIE['remember_me']);

            $model = new CustomerModel();
            $customer = $model->find($id);
            
            if ($password == $customer['password']) {
                $data = [
                    'id' => $customer['id'],
                    'fullname' => $customer['fullname'],
                    'username' => $customer['username'],
                    'email' => $customer['email'],
                    'avatar' => $customer['avatar'],
                    'isLoggedIn' => true
                ];
        
                session()->set($data);
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
