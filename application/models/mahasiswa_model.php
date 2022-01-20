<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {

  public function get_mahasiswa()
  {
    $data_mahasiswa = $this->db->join('Petugas','Petugas.id_pegawai=Pegawai.id_pegawai')
                          ->where('id_level','6')
                          ->get('pegawai')
                          ->result();
      return $data_mahasiswa;
  }
  public function masuk_db()
  {
    $data_mahasiswa=array(
      'nama_pegawai'=>$this->input->post('nama_mahasiswa'),
      'nidn_npm'=>$this->input->post('nidn_npm'),
      'jurusan'=>$this->input->post('jurusan'),
      'alamat'=>$this->input->post('alamat'),
    );
    $ql_masuk=$this->db->insert('pegawai', $data_mahasiswa);
    return $ql_masuk;
  }
  public function insert_username()
  {
    $data_mahasiswa=array(
      'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
      'nidn_npm'=>$this->input->post('nidn_npm'),
      'jurusan'=>$this->input->post('jurusan'),
      'alamat'=>$this->input->post('alamat'),
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'id_level'=>'6',
      'id_mahasiswa'=>$this->input->post('alamat'),
    );
    $ql_masuk=$this->db->insert('mahasiswa', $data_mahasiswa);
    return $ql_masuk;
  }
  public function detail_mahasiswa($id_mahasiswa='')
{
  return $this->db->where('id_mahasiswa', $id_mahasiswa)->get('mahasiswa')->row();
  }

   public function update_mahasiswa()
  {
    $dt_up_mahasiswa=array(
      'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
      'nidn_npm'=>$this->input->post('nidn_npm'),
      'jurusan'=>$this->input->post('jurusan'),
      'alamat'=>$this->input->post('alamat'),
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
    );
  return $this->db->where('id_mahasiswa',$this->input->post('id_mahasiswa'))->update('mahasiswa', $dt_up_mahasiswa);
  }
  public function hapus_mahasiswa($id_mahasiswa)
  {
    $this->db->where('id_mahasiswa', $id_mahasiswa);
     return $this->db->delete('mahasiswa');
  } 
  // buet ni
  public function ambil_id($nidn_npm)
  {
    return $query = $this->db->get_where('pegawai',array('nidn_npm' => $nidn_npm))->row_array();
   }
}

