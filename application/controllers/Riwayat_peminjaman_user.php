<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_peminjaman_user extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_riwayat";

		$this->load->model('Peminjaman_model');

		$data['data_peminjaman'] = $this->Peminjaman_model->get_riwayatuser();
		// var_dump($data['data_peminjaman']);
		// die();
		$this->load->model('Pegawai_model');

		$data['data_pegawai'] = $this->Pegawai_model->get_pegawai();

		$this->load->model('Daftar_mesin_model');

		$data['data_daftar_mesin'] = $this->Daftar_mesin_model->get_daftar_mesin();

		$this->load->view('index', $data);
	}
}
