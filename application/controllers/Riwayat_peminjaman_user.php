<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_peminjaman_user extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_riwayat";

		$this->load->model('peminjaman_model');

		$data['data_peminjaman'] = $this->peminjaman_model->get_riwayatuser();
		// var_dump($data['data_peminjaman']);
		// die();
		$this->load->model('pegawai_model');

		$data['data_pegawai'] = $this->pegawai_model->get_pegawai();

		$this->load->model('daftar_mesin_model');

		$data['data_daftar_mesin'] = $this->daftar_mesin_model->get_daftar_mesin();

		$this->load->view('index', $data);
	}
}
