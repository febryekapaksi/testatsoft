<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'gambar' => $this->gambar,
            'berita' => $this->db->table('berita')->get()->getNumRows(),
            'kategori' => $this->db->table('kategori')->get()->getNumRows(),
            'user' => $this->db->table('user')->get()->getNumRows(),
        ];
        // dd($data);

        return view('dashboard', $data);
    }
}
