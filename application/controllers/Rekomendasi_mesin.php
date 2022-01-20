<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi_mesin extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_rekomendasi_mesin";
		$this->load->model('daftar_mesin_model');
		$data['data_daftar_mesin'] = $this->daftar_mesin_model->get_rekomendasi_mesin();
		$this->load->model('jenis_model');
		$data['data_jenis'] = $this->jenis_model->get_jenis();
		$this->load->model('petugas_model');
		$data['data_petugas'] = $this->petugas_model->get_petugas();
		$this->load->view('index', $data, FALSE);
	}
}
