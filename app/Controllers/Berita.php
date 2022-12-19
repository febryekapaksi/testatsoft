<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class Berita extends BaseController
{
    public function index()
    {
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'gambar' => $this->gambar,
            'dataBerita' => $this->db->table('berita')
                ->select('berita_id, judul_berita, isi_berita, berita.kategori_id, kategori')
                ->join('kategori', 'kategori.kategori_id = berita.kategori_id')
                ->get()->getResult()
        ];
        return view('berita/getberita', $data);
    }

    public function add()
    {
        $data = [];
        return view('berita/addberita', $data);
    }

    public function kategori()
    {
        $data = $this->db->table('kategori')->get()->getResultArray();
        $this->createRespon(200, 'Sukses ambil data', $data);
    }

    public function detail()
    {
        $data = $this->db->table('berita')->getWhere(['berita_id' => $this->request->getGet('berita_id')])->getRow();
        $this->createRespon(200, 'Sukses', $data);
    }
    public function save()
    {
        $id = Uuid::uuid4();
        $data = [
            'berita_id' => $id,
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'kategori_id' => $this->request->getPost('kategori_id'),
        ];
        // print_r($data);

        $this->db->table('berita')->insert($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            $this->createRespon(400, 'Gagal');
        }

        $this->createRespon(200, 'Sukses');
    }

    public function edit()
    {
        // $id = Uuid::uuid4();
        $data = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'kategori_id' => $this->request->getPost('kategori_id'),
        ];
        // // print_r($data);

        $this->db->table('berita')->where('berita_id', $this->request->getPost('berita_id'))->update($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        $this->createRespon(200, 'Sukses');
    }

    public function delete()
    {
        $this->db->table('berita')->where('berita_id', $this->request->getPost('berita_id'))->delete();
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        $this->createRespon(200, 'Sukses');
    }
}
