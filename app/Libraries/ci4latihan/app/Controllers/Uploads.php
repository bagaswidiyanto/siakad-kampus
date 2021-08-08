<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UploadsModel;

class Uploads extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->UploadsModel = new UploadsModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Upload Multiple',
            'isi'           => 'v_uploads'
        ];
        echo view('layout/v_wrapper', $data);
    }

    public function save()
    {
        $judul = $this->request->getPost('judul');
        $files = $this->request->getFiles();

        if ($files) {
            $random = rand(000, 999);

            $data_uploads = [
                'id_upload'    => $random,
                'judul'         => $judul,
            ];

            $this->UploadsModel->insert_upload($data_uploads);

            foreach ($files['file_upload'] as $key => $img) {
                $data_galery = [
                    'id_upload'    => $random,
                    'gambar' => $img->getRandomName(),
                ];
                $this->UploadsModel->insert_galeries($data_galery);
                $img->move(ROOTPATH . 'public/folder_upload', $img->getRandomName());
            }
            session()->setFlashdata('success', 'File berhasil diupload');
            return redirect()->to(base_url('uploads/index'));
        }
    }
}
