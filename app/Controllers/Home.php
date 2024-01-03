<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Your Page Title',
        ];
        return view('main/home', $data);
    }
}
