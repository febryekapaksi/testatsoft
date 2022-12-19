<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'gambar' => $this->gambar,
            'dataKategori' => $this->db->table('kategori')->select('kategori_id, kategori')->get()->getResult()
        ];
        return view('kategori/getkategori', $data);
    }

    public function add()
    {
        $data = [];
        return view('kategori/addkategori', $data);
    }

    public function save()
    {
        $id = Uuid::uuid4();
        $data = [
            'kategori_id' => $id,
            'kategori' => $this->request->getPost('kategori'),
        ];
        // print_r($data);

        $this->db->table('kategori')->insert($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            $this->createRespon(400, 'Gagal');
        }

        $this->createRespon(200, 'Sukses');
    }

    public function detail()
    {
        $data = $this->db->table('kategori')->getWhere(['kategori_id' => $this->request->getGet('kategori_id')])->getRow();
        $this->createRespon(200, 'Sukses', $data);
    }

    public function edit()
    {
        // $id = Uuid::uuid4();
        $data = [
            'kategori' => $this->request->getPost('kategori'),
        ];
        // // print_r($data);

        $this->db->table('kategori')->where('kategori_id', $this->request->getPost('kategori_id'))->update($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        $this->createRespon(200, 'Sukses');
    }

    public function delete()
    {
        $this->db->table('kategori')->where('kategori_id', $this->request->getPost('kategori_id'))->delete();
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        $this->createRespon(200, 'Sukses');
    }
}
