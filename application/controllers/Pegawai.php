<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pegawai extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_pegawai";
		$this->load->model('Pegawai_model');
		$data['data_pegawai'] = $this->Pegawai_model->get_pegawai();
		// var_dump($data['data_pegawai']);
		//die;
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_pegawai()
	{
		$this->form_validation->set_rules(
			'nama_pegawai',
			'Nama pegawai',
			'trim|required',
			array('required' => 'nama pegawai harus diisi')
		);
		$nidn_npm = $this->input->post('nidn_npm');


		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Pegawai_model', 'pgw');
			$masuk = $this->pgw->masuk_db();
			// buet nii
			$cek = $this->pgw->ambil_id($nidn_npm);
			$data_login = array(

				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'id_level' => '5',
				'id_pegawai' => $cek['id_pegawai'],
			);
			$simpan = $this->db->insert('Petugas', $data_login);
			// sampai ni
			if ($simpan == true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Pegawai'), 'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Pegawai'), 'refresh');
		}
	}
	public function get_detail_pegawai($id_pegawai = '')
	{
		$this->load->model('Pegawai_model');
		$data_detail = $this->Pegawai_model->detail_pegawai($id_pegawai);
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
			redirect(base_url('index.php/Pegawai'), 'refresh');
		} else {
			$this->load->model('Pegawai_model');
			$proses_update = $this->Pegawai_model->update_pegawai();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Pegawai'), 'refresh');
		}
	}

	public function hapus_pegawai($id_pegawai)
	{
		$this->load->model('Pegawai_model');
		$this->Pegawai_model->hapus_pegawai($id_pegawai);
		redirect(base_url('index.php/Pegawai'), 'refresh');
	}
}
