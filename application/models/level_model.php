<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level_model extends CI_Model
{

  public function get_level()
  {
    $data_level = $this->db->get('Level')->result();
    return $data_level;
  }
  public function get_level_ka()
  {
    $where = "id_level = 8 OR id_level = 7";
    $data_level = $this->db->where($where)
      ->get('Level')
      ->result();
    return $data_level;
  }
  public function masuk_db()
  {
    $data_level = array(
      'nama_level' => $this->input->post('nama_level'),
    );
    $ql_masuk = $this->db->insert('Level', $data_level);
    return $ql_masuk;
  }
  public function detail_level($id_level = '')
  {
    return $this->db->where('id_level', $id_level)->get('Level')->row();
  }

  public function update_level()
  {
    $dt_up_level = array(
      'nama_level' => $this->input->post('nama_level'),
    );
    return $this->db->where('id_level', $this->input->post('id_level'))->update('Level', $dt_up_level);
  }
  public function hapus_level($id_level)
  {
    $this->db->where('id_level', $id_level);
    return $this->db->delete('Level');
  }
}
