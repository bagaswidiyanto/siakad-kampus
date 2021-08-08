<?php

namespace App\Controllers;

use CodeIgniter\Controller;
// digunakan saat menggunakan API
use CodeIgniter\RESTful\ResourceController;
use phpDocumentor\Reflection\Types\Null_;

class Barang extends ResourceController
{
    protected $format    = 'json';
    protected $modelName = 'App\Models\BarangModel';

    // mengambil data menggunakan API
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    // mengambil data menggunakan API berdasarkan id
    public function detail($id = NULL)
    {
        $get = $this->model->getBarang($id);
        return $this->respond($get, 200);
    }

    public function add()
    {
        $valid = $this->validate([
            'nama_barang' => [
                'label'  => 'Nama Barang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!!',
                ]
            ],
            'harga' => [
                'label'  => 'Harga Barang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!!',
                ]
            ],
            'stok' => [
                'label'  => 'Stok Barang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!!',
                ]
            ],
        ]);
        if (!$valid) {
            $response = [
                'status' => 500,
                'error'  => true,
                'data'   => \Config\Services::validation()->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $nama_barang = $this->request->getPost('nama_barang');
            $harga = $this->request->getPost('harga');
            $stok = $this->request->getPost('stok');
            $data = [
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'stok' => $stok,
            ];
            $simpan = $this->model->addBarang($data);
            if ($simpan) {
                $msg = ['message' => 'Barang berhasil ditambahkan !!!'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data'  => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function edit($id = NULL)
    {
        $valid = $this->validate([
            'nama_barang' => [
                'label'  => 'Nama Barang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!!',
                ]
            ],
            'harga' => [
                'label'  => 'Harga Barang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!!',
                ]
            ],
            'stok' => [
                'label'  => 'Stok Barang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!!',
                ]
            ],
        ]);
        if (!$valid) {
            $response = [
                'status' => 500,
                'error'  => true,
                'data'   => \Config\Services::validation()->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $nama_barang = $this->request->getPost('nama_barang');
            $harga = $this->request->getPost('harga');
            $stok = $this->request->getPost('stok');
            $data = [
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'stok' => $stok,
            ];
            $edit = $this->model->updateBarang($data, $id);
            if ($edit) {
                $msg = ['message' => 'Barang berhasil di edit !!!'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data'  => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function hapus($id = null)
    {
        $this->model->deleteBarang($id);
        $msg = [
            'message' => 'Data Barang Berhasil Di Hapus !!!'
        ];
        $response = [
            'data' => $msg,
        ];
        return $this->respond($response, 200);
    }
}
