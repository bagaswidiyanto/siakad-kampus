<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{
    public function DataMhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left')
            ->where('nim', session()->get('username'))
            ->get()->getRowArray();
    }

    public function MatkulDitawarkan($id_ta)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left')
            ->where('id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function TambahMatkul($data)
    {
        $this->db->table('tbl_krs')->insert($data);
    }

    public function DataKrs($id_mhs, $id_ta)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left')
            ->where('id_mhs', $id_mhs)
            ->where('tbl_krs.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_krs', $data['id_krs'])
            ->delete($data);
    }
}
