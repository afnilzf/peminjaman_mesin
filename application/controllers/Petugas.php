<?php
defined('BASEPATH') or exit('No direct script access allowed');

class petugas extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_petugas";
		$this->load->model('Petugas_model');
		$this->load->model('Level_model');
		$data['data_petugas'] = $this->Petugas_model->get_petugas();
		$data['data_level'] = $this->Level_model->get_level_ka();
		// var_dump($data['data_petugas']);
		// die;
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_petugas()
	{
		$this->form_validation->set_rules(
			'nama_petugas',
			'Nama petugas',
			'trim|required',
			array('required' => 'nama petugas harus diisi')
		);
		$nidn_npm = $this->input->post('nidn_npm');


		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Petugas_model', 'pgw');
			$masuk = $this->pgw->masuk_db();
			// buet nii
			$cek = $this->pgw->ambil_id($nidn_npm);
			// var_dump($cek);
			// die();
			$data_login = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'id_level' => $this->input->post('id_level'),
				'id_pegawai' => $cek['id_pegawai'],
			);
			$simpan = $this->db->insert('Petugas', $data_login);
			// sampai ni
			if ($simpan == true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/petugas'), 'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/petugas'), 'refresh');
		}
	}
	public function get_detail_petugas($id_petugas = '')
	{
		$this->load->model('Petugas_model');
		$data_detail = $this->Petugas_model->detail_petugas($id_petugas);
		echo json_encode($data_detail);
	}

	public function update_pegawai()
	{
		$this->form_validation->set_rules('nama_pegawai', 'NAMA PEGAWAI', 'trim|required');
		$this->form_validation->set_rules('nidn_npm', 'NIDN/NPM', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'JURUSAN', 'trim|required');
		$this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Petugas'), 'refresh');
		} else {
			$this->load->model('Pegawai_model');
			$proses_update = $this->Pegawai_model->update_pegawai();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Petugas'), 'refresh');
		}
	}

	public function hapus_petugas($id_petugas)
	{
		$this->load->model('Petugas_model');
		$this->Petugas_model->hapus_petugas($id_petugas);
		redirect(base_url('index.php/petugas'), 'refresh');
	}
}
