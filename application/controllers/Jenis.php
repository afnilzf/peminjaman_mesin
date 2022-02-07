<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jenis extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_jenis";
		$this->load->model('Jenis_model');
		$data['data_jenis'] = $this->Jenis_model->get_jenis();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_jenis()
	{
		$this->form_validation->set_rules(
			'nama_jenis',
			'Nama jenis',
			'trim|required',
			array('required' => 'nama jenis harus diisi')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Jenis_model', 'lvl');
			$masuk = $this->lvl->masuk_db();
			if ($masuk == true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Jenis'), 'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Jenis'), 'refresh');
		}
	}
	public function get_detail_jenis($id_jenis = '')
	{
		$this->load->model('Jenis_model');
		$data_detail = $this->Jenis_model->detail_jenis($id_jenis);
		echo json_encode($data_detail);
	}

	public function update_jenis()
	{
		$this->form_validation->set_rules('nama_jenis', 'Nama jenis', 'trim|required');
		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/jenis'), 'refresh');
		} else {
			$this->load->model('Jenis_model');
			$proses_update = $this->Jenis_model->update_jenis();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Jenis'), 'refresh');
		}
	}

	public function hapus_jenis($id_jenis)
	{
		$this->load->model('Jenis_model');
		$this->Jenis_model->hapus_jenis($id_jenis);
		redirect(base_url('index.php/Jenis'), 'refresh');
	}
}
