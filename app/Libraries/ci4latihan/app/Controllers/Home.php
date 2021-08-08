<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{

	public function __construct()
	{
		$this->ProductModel = new ProductModel();
	}

	public function grafik()
	{
		$data = array(
			'title' => 'Grafik',
			'penjualan' => $this->ProductModel->get_penjualan(),
			'isi' => 'v_grafik',
		);
		echo view('layout/v_wrapper', $data);
	}

	public function index()
	{
		// proteksi halaman jika blm login
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
		$data = [
			'title' => 'Home',
			'isi' => 'v_home',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function menu2()
	{
		// proteksi halaman jika blm login
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
		$data = [
			'title' => 'Judul Halaman Menu 2',
			'isi' => 'v_menu2',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function menu3()
	{
		$data = [
			'title' => 'Judul Halaman Menu 3',
			'isi' => 'v_menu3',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function menu4()
	{
		$data = [
			'title' => 'Judul Halaman Menu 4',
			'isi' => 'v_menu4',
		];
		echo view('layout/v_wrapper', $data);
	}
}
