<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login', $data);
        helper('form');
    }

    public function login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.'
                ]
            ]
            // 'captcha_conf' => [
            //     'rules' => 'required|matches[captcha]',
            //     'errors' => [
            //         'required' => 'Captcha harus diisi.',
            //         'matches' => 'Captcha tidak sesuai.'
            //     ]
            // ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Tidak bisa Login');
            return redirect()->to('login')->withInput()->with('validation', $validation);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->userModel->where('email', $email)->first();
        // $user = $this->db->table('user')->where('email', $email)->get();
        // dd($user);
        if ($user) {
            if ($user['is_active'] == 1) {
                $pass = $user['password'];

                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'gambar' => $user['gambar'],
                        'logged_in' => true,
                    ];

                    session()->set($data);

                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('gagal', 'Password Salah');
                    return redirect()->to('/auth');
                }
            } else {
                session()->setFlashdata('gagal', 'Data belum diverifikasi');
                return redirect()->to('/auth');
            }
        } else {
            session()->setFlashdata('gagal', 'Email Tidak Ditemukan');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
