<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_kajur extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_peminjaman";

		$this->load->model('peminjaman_model');

		$data['data_peminjaman'] = $this->peminjaman_model->get_peminjamankajur();

		$this->load->model('pegawai_model');

		$data['data_pegawai'] = $this->pegawai_model->get_pegawai();

		$this->load->model('daftar_mesin_model');

		$data['data_daftar_mesin'] = $this->daftar_mesin_model->get_daftar_mesin();

		$this->load->view('index', $data);
	}

	public function setujui($id_peminjaman)
	{

		$this->load->model('peminjaman_model');
		$proses_update = $this->peminjaman_model->persetujuan_kajur($id_peminjaman);
		if ($proses_update) {
			$this->session->set_flashdata('pesan', 'sukses update');
		} else {
			$this->session->set_flashdata('pesan', 'gagal update');
		}
		redirect(base_url('index.php/Peminjaman_kajur'), 'refresh');
	}
	public function tolak($id_peminjaman)
	{

		$this->load->model('peminjaman_model');
		$proses_update = $this->peminjaman_model->penolakan($id_peminjaman);
		if ($proses_update) {
			$this->session->set_flashdata('pesan', 'sukses update');
		} else {
			$this->session->set_flashdata('pesan', 'gagal update');
		}
		redirect(base_url('index.php/Peminjaman_kajur'), 'refresh');
	}
}
