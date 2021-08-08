<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelKrs;

class Mhs extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard Mahasiswa',
            'mhs' => $this->ModelKrs->DataMhs(),
            'ta' => $this->ModelTa->ta_aktif(),
            'isi' => 'v_dashboard_mhs'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi()
    {
        $id_mhs = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Absensi',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'mhs' => $this->ModelKrs->DataMhs(),
            'data_matkul' => $this->ModelKrs->DataKrs($id_mhs['id_mhs'], $ta['id_ta']),
            'isi' => 'mhs/v_absensi',
        ];
        return view('layout/v_wrapper', $data);
    }

    public function khs()
    {
        $id_mhs = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'mhs' => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan($ta['id_ta']),
            'data_matkul' => $this->ModelKrs->DataKrs($id_mhs['id_mhs'], $ta['id_ta']),
            'isi' => 'mhs/v_khs'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function print_khs()
    {
        $id_mhs = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'mhs' => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan($ta['id_ta']),
            'data_matkul' => $this->ModelKrs->DataKrs($id_mhs['id_mhs'], $ta['id_ta']),
        ];
        return view('mhs/v_print_khs', $data);
    }
}
