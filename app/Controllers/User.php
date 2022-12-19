<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'gambar' => $this->gambar,
            'dataUser' => $this->db->table('user')->select('user_id, username, email')->get()->getResult()
        ];
        // foreach ($data as $key => $value) {
        //     $data[$key]->detail = 1;
        // }
        return view('user/getuser', $data);
    }

    public function add()
    {
        $data = [];
        return view('user/adduser', $data);
    }

    public function save()
    {
        $password = $this->request->getPost('password');
        $passwordx = password_hash($password, PASSWORD_DEFAULT);
        $id = Uuid::uuid4();

        $data = [
            'user_id' => $id->toString(),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $passwordx,
            'gambar' => 'avatar-1.png'
        ];
        // print_r($data);

        $this->db->table('user')->insert($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            $this->createRespon(400, 'Gagal');
        }

        $this->createRespon(200, 'Sukses');
    }

    public function detail()
    {
        $data = $this->db->table('user')->getWhere(['user_id' => $this->request->getGet('user_id')])->getRow();
        $this->createRespon(200, 'Sukses', $data);
    }

    public function edit()
    {
        $password = $this->request->getPost('password');

        if ($password == '') {
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
            ];
        } else {
            $passwordx = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $passwordx
            ];
        }

        $this->db->table('user')->where('user_id', $this->request->getPost('user_id'))->update($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        $this->createRespon(200, 'Sukses');
    }

    public function delete()
    {
        $this->db->table('user')->where('user_id', $this->request->getPost('user_id'))->delete();
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        $this->createRespon(200, 'Sukses');
    }
}
