<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;

class JadwalKuliah extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelProdi = new ModelProdi();
        $this->ModelJadwalKuliah = new ModelJadwalKuliah();
        $this->ModelDosen = new ModelDosen();
        $this->ModelRuangan = new ModelRuangan();
    }
    public function index()
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi' => $this->ModelProdi->allData(),
            'isi' => 'admin/jadwalkuliah/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detailjadwal($id_prodi)
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi' => $this->ModelProdi->detail_data($id_prodi),
            'jadwal' => $this->ModelJadwalKuliah->allData($id_prodi),
            'matkul' => $this->ModelJadwalKuliah->matkul($id_prodi),
            'dosen' => $this->ModelDosen->allData(),
            'kelas' => $this->ModelJadwalKuliah->kelas($id_prodi),
            'ruangan' => $this->ModelRuangan->allData(),
            'isi' => 'admin/jadwalkuliah/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_prodi)
    {
        if ($this->validate([
            'id_matkul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih !!!'
                ]
            ],
            'id_dosen' => [
                'label' => 'Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih !!!'
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih !!!'
                ]
            ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih !!!'
                ]
            ],
            'waktu' => [
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_ruangan' => [
                'label' => 'Ruangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih !!!'
                ]
            ],
            'quota' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            // jika valid
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                'id_prodi'      => $id_prodi,
                'id_ta'         => $ta['id_ta'],
                'id_matkul'     => $this->request->getPost('id_matkul'),
                'id_dosen'      => $this->request->getPost('id_dosen'),
                'id_kelas'      => $this->request->getPost('id_kelas'),
                'hari'          => $this->request->getPost('hari'),
                'waktu'         => $this->request->getPost('waktu'),
                'id_ruangan'    => $this->request->getPost('id_ruangan'),
                'quota'         => $this->request->getPost('quota'),
            ];
            $this->ModelJadwalKuliah->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('jadwalkuliah/detailjadwal/' . $id_prodi));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwalkuliah/detailjadwal/' . $id_prodi));
        }
    }

    public function delete($id_jadwal, $id_prodi)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwalKuliah->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('jadwalkuliah/detailjadwal/' . $id_prodi));
    }
}
