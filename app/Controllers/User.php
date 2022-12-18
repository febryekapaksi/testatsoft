<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use \Config\Database;

class User extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
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

        $uuid = Uuid::uuid4();

        $data = [
            'user_id' => $uuid->toString(),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $passwordx,
        ];
        print_r($data);

        $this->db->table('user')->insert($data);
        if ($this->db->affectedRows() <= 0) {
            // ini buat error
            return ('gagal');
        }

        return view('user/getuser');
    }
}
