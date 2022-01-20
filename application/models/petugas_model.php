<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas_model extends CI_Model {

  public function get_petugas()
  {
    $where = "id_level = 8 OR id_level = 7";
     $data_petugas = $this->db->join('Petugas','Petugas.id_pegawai=Pegawai.id_pegawai')
                          ->where($where)
                          ->get('pegawai')
                          ->result();
      return $data_petugas;
       }
  public function masuk_db()
  {
    $data_pegawai=array(
      'nama_pegawai'=>$this->input->post('nama_petugas'),
      'nidn_npm'=>$this->input->post('nidn_npm'),
      'jurusan'=>$this->input->post('jurusan'),
      'alamat'=>$this->input->post('alamat'),
    );
    $ql_masuk=$this->db->insert('Pegawai', $data_pegawai);
    return $ql_masuk;
  }
  public function detail_petugas($id_petugas='')
{
  return $this->db->where('id_petugas', $id_petugas)->get('Petugas')->row();
  }

   public function update_petugas()
  {
    $dt_up_petugas=array(
      'id_petugas'=>$this->input->post('id_petugas'),
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'id_level'=>$this->input->post('id_level'),
      
    );
  return $this->db->where('id_petugas',$this->input->post('id_petugas'))->update('Petugas', $dt_up_petugas);
  }
  public function hapus_petugas($id_petugas)
  {
    $this->db->where('id_petugas', $id_petugas);
     return $this->db->delete('Petugas');
  }
   public function ambil_id($nidn_npm)
  {
    return $query = $this->db->get_where('pegawai',array('nidn_npm' => $nidn_npm))->row_array();
   }  
}

