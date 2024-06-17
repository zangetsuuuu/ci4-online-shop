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

    public function terms()
    {
        $data = [
            'title' => 'Syarat dan Ketentuan'
        ];
        
        return view('terms', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang Kami'
        ];
        
        return view('about', $data);
    }

    public function forbidden()
    {
        $data = [
            'title' => 'Forbidden'
        ];
        
        return view('errors/forbidden', $data);
    }
}
