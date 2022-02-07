<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi_mesin extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_rekomendasi_mesin";
		$this->load->model('Daftar_mesin_model');
		$data['data_daftar_mesin'] = $this->Daftar_mesin_model->get_rekomendasi_mesin();
		$this->load->model('Jenis_model');
		$data['data_jenis'] = $this->Jenis_model->get_jenis();
		$this->load->model('Petugas_model');
		$data['data_petugas'] = $this->Petugas_model->get_petugas();
		$this->load->view('index', $data, FALSE);
	}
}
