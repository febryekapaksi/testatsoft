<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [];
        return view('kategori/getkategori', $data);
    }

    public function add()
    {
        $data = [];
        return view('kategori/addkategori', $data);
    }
}
