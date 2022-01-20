<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "home";
		$this->load->model('peminjaman_model');
		$data['data_peminjaman'] = $this->peminjaman_model->get_peminjamanorder();
		// $data['count'] = $this->peminjaman_model->get_count_banyak();
		$data['count'] = $this->peminjaman_model->get_count_banyak_mesin();
		$data['mesin'] = $this->peminjaman_model->mesin();
		// var_dump($data['count']);
		// die();
		$this->load->view('index', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */