<?php

namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelFakultas;
use App\Models\ModelDosen;

class Prodi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
        $this->ModelDosen = new ModelDosen();
    }
    public function index()
    {
        $data = [
            'title'    => 'Prodi',
            'prodi'    => $this->ModelProdi->allData(),
            'isi'      => 'admin/prodi/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'    => 'Add Prodi',
            'fakultas' => $this->ModelFakultas->allData(),
            'dosen'    => $this->ModelDosen->allData(),
            'isi'      => 'admin/prodi/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'id_fakultas' => [
                'label' => 'Fakultas',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'kode_prodi' => [
                'label' => 'Kode Program Studi',
                'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Kode Sudah Ada, Silahkan Input Kode Lain !!!'
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenjang' => [
                'label' => 'Jenjang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'ka_prodi' => [
                'label' => 'Ka Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            // jika valid
            $data = [
                'id_fakultas' => $this->request->getPost('id_fakultas'),
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'prodi' => $this->request->getPost('prodi'),
                'jenjang' => $this->request->getPost('jenjang'),
                'ka_prodi' => $this->request->getPost('ka_prodi'),
            ];
            $this->ModelProdi->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('prodi'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/add'));
        }
    }

    public function edit($id_prodi)
    {
        $data = [
            'title'    => 'Add Prodi',
            'fakultas'   => $this->ModelFakultas->allData(),
            'prodi'   => $this->ModelProdi->detail_data($id_prodi),
            'dosen'    => $this->ModelDosen->allData(),
            'isi'      => 'admin/prodi/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_prodi)
    {
        if ($this->validate([
            'id_fakultas' => [
                'label' => 'Fakultas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenjang' => [
                'label' => 'Jenjang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'ka_prodi' => [
                'label' => 'Ka Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            // jika valid
            $data = [
                'id_prodi' => $id_prodi,
                'id_fakultas' => $this->request->getPost('id_fakultas'),
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'prodi' => $this->request->getPost('prodi'),
                'jenjang' => $this->request->getPost('jenjang'),
                'ka_prodi' => $this->request->getPost('ka_prodi'),
            ];
            $this->ModelProdi->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
            return redirect()->to(base_url('prodi'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/edit/' . $id_prodi));
        }
    }

    public function delete_data($id_prodi)
    {
        $data = [
            'id_prodi' => $id_prodi,
        ];
        $this->ModelProdi->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('prodi'));
    }
}
