<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $query = $this->db->join('Level', 'Level.id_level=Petugas.id_level')
            ->join('Pegawai', 'Pegawai.id_pegawai=Petugas.id_pegawai')
            ->where('username', $username)
            ->where('password', $password)
            ->get('petugas');

        if ($this->db->affected_rows() > 0) {

            $data_login = $query->row();
            // var_dump($data_login);
            // die;

            $data_session = array(
                'username' => $data_login->username,
                'password' => $data_login->password,
                'login' => TRUE,
                'nama_level' => $data_login->nama_level,
                'id_pegawai' => $data_login->id_pegawai,
                'nidn/npm' => $data_login->nidn_npm,
                'jurusan' => $data_login->jurusan,
                'alamat' => $data_login->alamat,
                'nama_pegawai' => $data_login->nama_pegawai,
            );
            $this->session->set_userdata($data_session);

            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */