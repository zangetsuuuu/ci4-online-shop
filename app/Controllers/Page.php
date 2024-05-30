<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Online Store'
        ];

        return view('index', $data);
    }

    public function forbidden()
    {
        $data = [
            'title' => 'Forbidden'
        ];
        
        return view('errors/forbidden', $data);
    }
}
