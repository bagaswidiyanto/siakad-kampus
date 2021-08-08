<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UploadModel;

class Upload extends BaseController
{

    protected $UploadModel;

    public function __construct()
    {
        helper('form');
        $this->UploadModel = new UploadModel();
    }

    public function index()
    {
        if (!$this->validate([])) {
            $data = [
                'title'         => 'Upload Gambar',
                'data'          => $this->UploadModel->get_upload(),
                'validation'    => $this->validator,
                'isi'           => 'v_upload'
            ];
            echo view('layout/v_wrapper', $data);
        }
    }

    public function save()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('upload/index'));
        }
        $validated = $this->validate([
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/gif,image/png,image/jpeg]|max_size[gambar,20000]'
        ]);
        if ($validated == FALSE) {
            return $this->index();
        } else {
            $file_gambar = $this->request->getFile('gambar');
            $file_gambar->move(ROOTPATH . 'public/folder_upload');

            $data = [
                'ket' => $this->request->getPost('ket'),
                'gambar' => $file_gambar->getName(),
            ];
            $this->UploadModel->insert_gambar($data);
            return redirect()->to(base_url('upload/index'))->with('success', 'Data Berhasil Diupload');
        }
    }
}
