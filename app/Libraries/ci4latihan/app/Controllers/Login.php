<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Controllers\Home;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        echo view('v_login');
    }

    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->LoginModel->cek_login($username, $password);
        // var_dump($cek);

        // jika username dan password benar
        if (($cek != null && ($cek['username'] == $username) && ($cek['password'] == $password))) {
            // Membuat Session
            session()->set('username', $cek['username']);
            session()->set('nama_user', $cek['nama_user']);
            session()->set('level', $cek['level']);
            return redirect()->to(base_url('home'));
        } else {
            // jika username dan password salah
            session()->setFlashdata('gagal', 'Username atau Password salah !!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        // jika menggunakan alert, maka gunakan ini
        session()->remove('username');
        session()->remove('nama_user');
        session()->remove('level');

        // session()->destroy(); :: jika tidak menggunakan alert logout, gunakan destroy
        session()->setFlashdata('sukses', 'Anda Berhasil Logout !!!');
        return redirect()->to(base_url('login'));
    }
}
