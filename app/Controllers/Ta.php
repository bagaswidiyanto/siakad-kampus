<?php

namespace App\Controllers;

use App\Models\ModelTa;


class Ta extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
	}
	public function index()
	{
		$data = [
			'title' => 'Tahun Akademik',
			'ta'    => $this->ModelTa->allData(),
			'isi'   => 'admin/v_ta'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = [
			'ta' => $this->request->getPost('ta'),
			'semester' => $this->request->getPost('semester'),
		];
		$this->ModelTa->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
		return redirect()->to(base_url('ta'));
	}

	public function edit($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
			'ta' => $this->request->getPost('ta'),
			'semester' => $this->request->getPost('semester'),
		];
		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
		return redirect()->to(base_url('ta'));
	}

	public function delete_data($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
		];
		$this->ModelTa->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
		return redirect()->to(base_url('ta'));
	}

	// setting tahun akademik
	public function setting()
	{
		$data = [
			'title' => 'Tahun Akademik',
			'ta'    => $this->ModelTa->allData(),
			'isi'   => 'admin/v_set_ta'
		];

		return view('layout/v_wrapper', $data);
	}

	public function set_status_ta($id_ta)
	{
		$this->ModelTa->reset_status_ta();
		$data = [
			'id_ta' => $id_ta,
			'status' => 1
		];
		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Status Tahun Akademik Berhasil Diganti !!!');
		return redirect()->to(base_url('ta/setting'));
	}
}
