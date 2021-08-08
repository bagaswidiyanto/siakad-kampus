<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{

    protected $MahasiswaModel;
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'List Data Mahasiswa',
            'mahasiswa' => $this->MahasiswaModel->get_mahasiswa(),
            'isi'       => 'v_mahasiswa',
        ];
        echo view('layout/v_wrapper', $data);
    }
}
