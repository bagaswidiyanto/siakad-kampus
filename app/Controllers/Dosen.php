<?php

namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelDosen = new ModelDosen();
    }
    public function index()
    {
        $data = [
            'title'    => 'dosen',
            'dosen'  => $this->ModelDosen->allData(),
            'isi'      => 'admin/dosen/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'    => 'Add Dosen',
            'dosen' => $this->ModelDosen->allData(),
            'isi'      => 'admin/dosen/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required|is_unique[tbl_dosen.kode_dosen]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Kode Sudah Ada, Silahkan Input Kode Lain !!!'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required|is_unique[tbl_dosen.nidn]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} nidn Sudah Ada, Silahkan Input Kode Lain !!!'
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama Dosen',
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
            'foto_dsn' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mine_in' => 'Format{field} Wajib PNG, JPG, GIF, JPEG !!!',
                ]
            ],
        ])) {
            // jika valid
            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto_dsn');
            // merename nama file foto
            $nama_file = $foto->getRandomName();

            $data = [
                'kode_dosen' => $this->request->getPost('kode_dosen'),
                'nidn' => $this->request->getPost('nidn'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'password' => $this->request->getPost('password'),
                'foto_dsn' => $nama_file,
            ];
            // memindahkan file foto dari form input ke folder foto ke directory
            $foto->move('fotodosen', $nama_file);

            $this->ModelDosen->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('dosen'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/add'));
        }
    }

    public function edit($id_dosen)
    {
        $data = [
            'title'    => 'Add Dosen',
            'dosen'    => $this->ModelDosen->detail_data($id_dosen),
            'isi'      => 'admin/dosen/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_dosen)
    {
        if ($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama Dosen',
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
            'foto_dsn' => [
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
            $foto = $this->request->getFile('foto_dsn');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelDosen->edit($data);
            } else {
                // menghapus foto lama
                $user = $this->ModelDosen->detail_data($id_dosen);
                if ($user['foto_dsn'] != "") {
                    unlink('fotodosen/' . $user['foto_dsn']);
                }
                // merename nama file foto
                $nama_file = $foto->getRandomName();

                $data = array(
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                    'foto_dsn' => $nama_file,
                );
                // memindahkan file foto dari form input ke folder foto ke directory
                $foto->move('fotodosen', $nama_file);

                $this->ModelDosen->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
            return redirect()->to(base_url('dosen'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/edit/' . $id_dosen));
        }
    }



    public function delete_data($id_dosen)
    {
        $dosen = $this->ModelDosen->detail_data($id_dosen);
        if ($dosen['foto_dsn'] != "") {
            unlink('fotodosen/' . $dosen['foto_dsn']);
        }
        $data = [
            'id_dosen' => $id_dosen,
        ];
        $this->ModelDosen->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('dosen'));
    }
}
