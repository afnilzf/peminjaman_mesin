<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pegawai_model extends CI_Model
{

  public function get_pegawai()
  {
    $data_pegawai = $this->db->join('Petugas', 'Petugas.id_pegawai=Pegawai.id_pegawai')
      ->where('id_level', '5')
      ->get('pegawai')
      ->result();
    return $data_pegawai;
  }
  public function masuk_db()
  {
    $data_pegawai = array(
      'nama_pegawai' => $this->input->post('nama_pegawai'),
      'nidn_npm' => $this->input->post('nidn_npm'),
      'jurusan' => $this->input->post('jurusan'),
      'alamat' => $this->input->post('alamat'),
    );
    $ql_masuk = $this->db->insert('Pegawai', $data_pegawai);
    return $ql_masuk;
  }
  public function insert_username()
  {
    $data_pegawai = array(
      'nama_pegawai' => $this->input->post('nama_pegawai'),
      'nidn_npm' => $this->input->post('nidn_npm'),
      'jurusan' => $this->input->post('jurusan'),
      'alamat' => $this->input->post('alamat'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'id_level' => '5',
      'id_pegawai' => $this->input->post('alamat'),
    );
    $ql_masuk = $this->db->insert('Pegawai', $data_pegawai);
    return $ql_masuk;
  }
  public function detail_pegawai($id_pegawai = '')
  {
    return $this->db->where('id_pegawai', $id_pegawai)->get('Pegawai')->row();
  }

  public function update_pegawai()
  {
    $ambil = $this->input->post();
    if (empty($ambil['password'])) {
      $data = array(
        'username' => $this->input->post('username'),
      );
      $this->db->where('id_pegawai', $this->input->post('id_pegawai'))->update('Petugas', $data);
    } else {
      $ambil['password'] = md5($ambil['password']);
      $data = array(
        'username' => $this->input->post('username'),
        'password' => $ambil['password'],
      );
      $this->db->where('id_pegawai', $this->input->post('id_pegawai'))->update('Petugas', $data);
    }
    $dt_up_pegawai = array(
      'nama_pegawai' => $this->input->post('nama_pegawai'),
      'nidn_npm' => $this->input->post('nidn_npm'),
      'jurusan' => $this->input->post('jurusan'),
      'alamat' => $this->input->post('alamat'),
    );
    return $this->db->where('id_pegawai', $this->input->post('id_pegawai'))->update('Pegawai', $dt_up_pegawai);
  }
  public function hapus_pegawai($id_pegawai)
  {
    $this->db->where('id_pegawai', $id_pegawai);
    $this->db->delete('Peminjaman');
    $this->db->where('id_pegawai', $id_pegawai);
    $this->db->delete('Pegawai');
    $this->db->where('id_pegawai', $id_pegawai);
    return $this->db->delete('Petugas');
  }
  // buet ni
  public function ambil_id($nidn_npm)
  {
    return $query = $this->db->get_where('pegawai', array('nidn_npm' => $nidn_npm))->row_array();
  }
}
