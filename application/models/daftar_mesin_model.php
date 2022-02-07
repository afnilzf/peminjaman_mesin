<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_mesin_model extends CI_Model
{

  public function get_daftar_mesin()
  {
    $data_daftar_mesin = $this->db->join('Petugas', 'Petugas.id_petugas=daftar_mesin.id_petugas')
      ->join('Jenis', 'Jenis.id_jenis=daftar_mesin.id_jenis')
      ->get('daftar_mesin')->result();
    return $data_daftar_mesin;
  }
  public function get_rekomendasi_mesin()
  {
    $data_daftar_mesin = $this->db->get('rek_mesin')->result();
    return $data_daftar_mesin;
  }
  public function get_daftar_mesin_user()
  {
    $where = "kondisi_mesin = 'BAIK' AND jumlah_mesin != 0";
    $data_daftar_mesin = $this->db->join('Jenis', 'Jenis.id_jenis=daftar_mesin.id_jenis')
      ->where($where)
      ->get('daftar_mesin')->result();
    return $data_daftar_mesin;
  }
  public function masuk_db()
  {
    $data_daftar_mesin = array(
      'nama_mesin' => $this->input->post('nama_mesin'),
      'kondisi_mesin' => $this->input->post('kondisi_mesin'),
      'jumlah_mesin' => $this->input->post('jumlah_mesin'),
      'id_jenis' => $this->input->post('id_jenis'),
      'kode_mesin' => $this->input->post('kode_mesin'),
      'id_petugas' => 1,
    );
    $ql_masuk = $this->db->insert('daftar_mesin', $data_daftar_mesin);
    return $ql_masuk;
  }
  public function detail_daftar_mesin($id_mesin = '')
  {
    return $this->db->where('id_mesin', $id_mesin)->get('daftar_mesin')->row();
  }

  public function update_daftar_mesin()
  {
    $dt_up_daftar_mesin = array(
      'nama_mesin' => $this->input->post('nama_mesin'),
      'kondisi_mesin' => $this->input->post('kondisi_mesin'),
      'jumlah_mesin' => $this->input->post('jumlah_mesin'),
      'id_jenis' => $this->input->post('id_jenis'),
      'kode_mesin' => $this->input->post('kode_mesin'),

    );
    return $this->db->where('id_mesin', $this->input->post('id_mesin'))->update('daftar_mesin', $dt_up_daftar_mesin);
  }
  public function hapus_daftar_mesin($id_mesin)
  {
    $this->db->where('id_mesin', $id_mesin);
    return $this->db->delete('daftar_mesin');
  }
}
