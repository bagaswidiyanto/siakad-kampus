<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelProdi = new ModelProdi();
    }
    public function index()
    {
        $data = [
            'title'    => 'Mahasiswa',
            'mhs'       => $this->ModelMahasiswa->allData(),
            'isi'      => 'admin/mahasiswa/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'    => 'Add mhs',
            'prodi'     => $this->ModelProdi->allData(),
            'isi'      => 'admin/mahasiswa/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required|is_unique[tbl_mhs.nim]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} NIM Sudah Ada, Silahkan Input NIM Lain !!!'
                ]
            ],
            'nama_mhs' => [
                'label' => 'Nama Mahasiswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_prodi' => [
                'label' => 'Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto_mhs' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto_mhs]|max_size[foto_mhs,1024]|mime_in[foto_mhs,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mine_in' => 'Format{field} Wajib PNG, JPG, GIF, JPEG !!!',
                ]
            ],
        ])) {
            // jika valid
            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto_mhs');
            // merename nama file foto
            $nama_file = $foto->getRandomName();

            $data = [
                'nim' => $this->request->getPost('nim'),
                'nama_mhs' => $this->request->getPost('nama_mhs'),
                'id_prodi' => $this->request->getPost('id_prodi'),
                'password' => $this->request->getPost('password'),
                'foto_mhs' => $nama_file,
            ];
            // memindahkan file foto dari form input ke folder foto ke directory
            $foto->move('fotomhs', $nama_file);

            $this->ModelMahasiswa->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('mahasiswa'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/add'));
        }
    }

    public function edit($id_mhs)
    {
        $data = [
            'title'    => 'Add mahasiswa',
            'prodi'    => $this->ModelProdi->allData(),
            'mhs'      => $this->ModelMahasiswa->detail_data($id_mhs),
            'isi'      => 'admin/mahasiswa/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_mhs)
    {
        if ($this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'nama_mhs' => [
                'label' => 'Nama Mahasiswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_prodi' => [
                'label' => 'id_prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto_mhs' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_mhs,1024]|mime_in[foto_mhs,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mine_in' => 'Format{field} Wajib PNG, JPG, GIF, JPEG !!!',
                ]
            ],
        ])) {
            // jika valid
            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_mhs' => $id_mhs,
                    'nim' => $this->request->getPost('nim'),
                    'nama_mhs' => $this->request->getPost('nama_mhs'),
                    'id_prodi' => $this->request->getPost('id_prodi'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelMahasiswa->edit($data);
            } else {
                // menghapus foto lama
                $user = $this->ModelMahasiswa->detail_data($id_mhs);
                if ($user['foto_mhs'] != "") {
                    unlink('fotomhs/' . $user['foto_mhs']);
                }
                // merename nama file foto
                $nama_file = $foto->getRandomName();

                $data = array(
                    'id_mhs' => $id_mhs,
                    'nim' => $this->request->getPost('nim'),
                    'nama_mhs' => $this->request->getPost('nama_mhs'),
                    'id_prodi' => $this->request->getPost('id_prodi'),
                    'password' => $this->request->getPost('password'),
                    'foto_mhs' => $nama_file,
                );
                // memindahkan file foto dari form input ke folder foto ke directory
                $foto->move('fotomhs', $nama_file);

                $this->ModelMahasiswa->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
            return redirect()->to(base_url('mahasiswa'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/edit/' . $id_mhs));
        }
    }



    public function delete_data($id_mhs)
    {
        $mhs = $this->ModelMahasiswa->detail_data($id_mhs);
        if ($mhs['foto_mhs'] != "") {
            unlink('fotomhs/' . $mhs['foto_mhs']);
        }
        $data = [
            'id_mhs' => $id_mhs,
        ];
        $this->ModelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('mahasiswa'));
    }
}
