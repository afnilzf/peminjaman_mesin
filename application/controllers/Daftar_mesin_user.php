<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_mesin_user extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_daftar_mesin";
		$this->load->model('daftar_mesin_model');
		$data['data_daftar_mesin'] = $this->daftar_mesin_model->get_daftar_mesin_user();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_daftar_mesin()
	{
		$this->form_validation->set_rules(
			'nama_mesin',
			'Nama Mesin',
			'trim|required',
			array('required' => 'Nama Mesin harus diisi')
		);
		$this->form_validation->set_rules(
			'kondisi_mesin',
			'Kondisi Mesin',
			'trim|required',
			array('required' => 'kondisi_mesin harus diisi')
		);
		$this->form_validation->set_rules(
			'jumlah_mesin',
			'Jumlah Mesin',
			'trim|required',
			array('required' => 'jumlah_mesin harus diisi')
		);
		$this->form_validation->set_rules(
			'id_jenis',
			'Id Jenis',
			'trim|required',
			array('required' => 'Id Jenis harus diisi')
		);
		$this->form_validation->set_rules(
			'kode_mesin',
			'Kode Mesin',
			'trim|required',
			array('required' => 'Kode daftar_mesin harus diisi')
		);
		$this->form_validation->set_rules(
			'id_petugas',
			'Id Petugas',
			'trim|required',
			array('required' => 'Id Petugas harus diisi')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('daftar_mesin_model', 'inv');
			$masuk = $this->inv->masuk_db();
			if ($masuk == true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/daftar_mesin'), 'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/daftar_mesin'), 'refresh');
		}
	}
	public function get_detail_daftar_mesin($id_mesin = '')
	{
		$this->load->model('daftar_mesin_model');
		$data_detail = $this->daftar_mesin_model->detail_daftar_mesin($id_mesin);
		echo json_encode($data_detail);
	}

	public function update_daftar_mesin()
	{
		$this->form_validation->set_rules('nama_mesin', 'Nama Mesin', 'trim|required');
		$this->form_validation->set_rules('kondisi_mesin', 'Kondisi Mesin', 'trim|required');
		$this->form_validation->set_rules('jumlah_mesin', 'Jumlah Mesin', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'Id Jenis', 'trim|required');
		$this->form_validation->set_rules('kode_mesin', 'Kode Mesin', 'trim|required');
		$this->form_validation->set_rules('id_petugas', 'Id Petugas', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/daftar_mesin'), 'refresh');
		} else {
			$this->load->model('daftar_mesin_model');
			$proses_update = $this->daftar_mesin_model->update_daftar_mesin();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/daftar_mesin'), 'refresh');
		}
	}

	public function hapus_daftar_mesin($id_mesin)
	{
		$this->load->model('daftar_mesin_model');
		$this->daftar_mesin_model->hapus_daftar_mesin($id_mesin);
		redirect(base_url('index.php/daftar_mesin'), 'refresh');
	}
}
