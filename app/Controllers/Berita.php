<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Berita extends BaseController
{
    public function index()
    {
        $data = [];
        return view('berita/getberita', $data);
    }

    public function add()
    {
        $data = [];
        return view('berita/addberita', $data);
    }
}
