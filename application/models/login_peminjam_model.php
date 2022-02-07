<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_peminjam_model extends CI_Model
{

	public function get_login_peminjam()
	{
		return $this->db
			->where('username', $this->input->post('username'))
			->where('password', $this->input->post('password'))
			->get('pegawai');
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
