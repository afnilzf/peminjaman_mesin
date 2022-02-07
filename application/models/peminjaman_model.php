<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjaman_model extends CI_Model
{

  public function get_peminjaman()
  {
    $where = "status_peminjaman !=8 AND status_peminjaman !=7 ";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->order_by('id_peminjaman', 'DESC')->get('Peminjaman')->result();
  }
  public function get_SatuPeminjaman($id)
  {
    $where = "id_peminjaman = $id";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->get('Peminjaman')->row_array();
  }
  public function mesin()
  {
    return $this->db
      ->group_by('nama_mesin')
      ->get('daftar_mesin')->result_array();
  }
  public function get_pengembalian_plp()
  {
    $where = "status_peminjaman = 8 OR status_peminjaman = 7 ";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->order_by('id_peminjaman', 'DESC')->get('Peminjaman')->result();
  }
  public function transaksiRekapBulan($bulan, $tahun)
  {
    $where = "status_peminjaman = 8";
    $where1 = "MONTH(tanggal_pinjam) = $bulan AND YEAR(tanggal_pinjam) = $tahun";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->where($where1)
      ->order_by('id_peminjaman', 'DESC')->get('Peminjaman')->result();
  }
  public function get_peminjamanorder()
  {
    $query = $this->db->query("SELECT * FROM `Peminjaman` JOIN `daftar_mesin` ON `daftar_mesin`.`id_mesin`=`Peminjaman`.`id_mesin` JOIN `Pegawai` ON `Pegawai`.`id_pegawai`=`Peminjaman`.`id_pegawai` GROUP BY `tanggal_pinjam` ORDER BY `tanggal_pinjam` desc LIMIT 5");
    $result = $query->result_array();

    return $result;
  }
  public function get_count_banyak()
  {
    $query = $this->db->query("SELECT tanggal_pinjam as tanggal, count(tanggal_pinjam) as jumlah FROM `Peminjaman` JOIN `daftar_mesin` ON `daftar_mesin`.`id_mesin`=`Peminjaman`.`id_mesin` JOIN `Pegawai` ON `Pegawai`.`id_pegawai`=`Peminjaman`.`id_pegawai` GROUP BY `tanggal_pinjam` ORDER BY `tanggal_pinjam` desc LIMIT 5");
    $result = $query->result_array();

    return $result;
  }
  public function get_count_banyak_mesin()
  {
    $query = $this->db->query("SELECT kode_mesin as kode, count(peminjaman.id_mesin) as jumlah FROM `Peminjaman` JOIN `daftar_mesin` ON `daftar_mesin`.`id_mesin`=`Peminjaman`.`id_mesin` JOIN `Pegawai` ON `Pegawai`.`id_pegawai`=`Peminjaman`.`id_pegawai` GROUP BY `kode_mesin` ORDER BY `kode_mesin` desc");
    $result = $query->result_array();

    return $result;
  }
  public function get_peminjamanuser()
  {
    $id_pegawai = $this->session->userdata('id_pegawai');
    // var_dump($id_pegawai);
    // die();
    $where = "peminjaman.id_pegawai = $id_pegawai AND status_peminjaman != 8 AND status_peminjaman != 7 ";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->get('Peminjaman')->result();
  }
  public function get_riwayatuser()
  {
    $id_pegawai = $this->session->userdata('id_pegawai');
    $where = "peminjaman.id_pegawai = $id_pegawai AND status_peminjaman = 8";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->get('Peminjaman')->result();
  }
  public function get_pengembalian()
  {
    $id_pegawai = $this->session->userdata('id_pegawai');
    $where = "status_peminjaman = 8";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->get('Peminjaman')->result();
  }

  public function get_peminjamankalab()
  {
    // $id_pegawai = $this->session->userdata('id_pegawai');
    $where = "status_peminjaman = 2";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->get('Peminjaman')->result();
  }
  public function get_peminjamankajur()
  {
    // $id_pegawai = $this->session->userdata('id_pegawai');
    $where = "status_peminjaman = 3";
    return $this->db
      ->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin')
      ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')
      ->where($where)
      ->get('Peminjaman')->result();
  }
  public function masuk_db()
  {
    $id_pegawai = $this->session->userdata('id_pegawai');
    $id_mesin = $this->input->post('id_mesin');
    $tanggalMulai = $this->input->post('tanggal_pinjam');
    $date = new DateTime($tanggalMulai);
    $tanggalSelesai = $date->modify("+5 days")->format('Y-m-d');
    // var_dump($tanggalSelesai);
    // die();
    $data_peminjaman = array(
      'id_mesin' => $this->input->post('id_mesin'),
      'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
      'tanggal_kembali' => $tanggalSelesai,
      'alasan' => $this->input->post('alasan'),
      'kelas' => $this->input->post('kelas'),
      'status_peminjaman' => 'Menunggu Persetujuan Kalab',
      'id_pegawai' => $id_pegawai,
    );
    return $this->db->insert('peminjaman', $data_peminjaman);
  }
  public function cekPinjam()
  {
    $id_pegawai = $this->session->userdata('id_pegawai');
    $where = "id_pegawai = $id_pegawai AND status_peminjaman = 6";
    return $this->db
      ->where($where)
      ->get('Peminjaman')->row_array();
  }

  public function detail_peminjaman($id_peminjaman = '')
  {
    return $this->db->where('id_peminjaman', $id_peminjaman)->get('Peminjaman')->row();
  }

  public function update_peminjaman()
  {
    $dt_up_peminjaman = array(
      'nama' => $this->input->post('nama'),
      'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
      'tanggal_kembali' => $this->input->post('tanggal_kembali'),
      'status_peminjaman' => $this->input->post('status_peminjaman'),
      'id_pegawai' => $this->input->post('id_pegawai'),
      'jumlah_pinjam' => $this->input->post('jumlah_pinjam')
    );
    return $this->db->where('id_peminjaman', $this->input->post('id_peminjaman'))->update('Peminjaman', $dt_up_peminjaman);
  }

  public function simpan_peminjaman()
  {
    $dt_up_peminjaman = array(
      'nama' => $this->input->post('nama'),
      'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
      'tanggal_kembali' => $this->input->post('tanggal_kembali'),
      'status_peminjaman' => $this->input->post('status_peminjaman'),
      'id_pegawai' => $this->input->post('id_pegawai'),
      'jumlah_pinjam' => $this->input->post('jumlah_pinjam')
    );
    return $this->db->where('id_peminjaman', $this->input->post('id_peminjaman'))->insert('peminjaman', $dt_up_peminjaman);
  }

  public function hapus_peminjaman($id_peminjaman)
  {
    $this->db->where('id_peminjaman', $id_peminjaman);
    return $this->db->delete('Peminjaman');
  }
  public function persetujuan_kalab($id_peminjaman)
  {
    $dt_up_peminjaman = array(
      'status_peminjaman' => 'Menunggu Persetujuan Kajur',
    );
    return $this->db->where('id_peminjaman', $id_peminjaman)->update('Peminjaman', $dt_up_peminjaman);
  }
  public function penolakan($id_peminjaman)
  {

    $dt_up_peminjaman = array(
      'status_peminjaman' => 'Ditolak',
      'tolak_alasan' => $this->input->post('alasan'),
    );
    return $this->db->where('id_peminjaman', $id_peminjaman)->update('Peminjaman', $dt_up_peminjaman);
  }
  public function persetujuan_kajur($id_peminjaman)
  {
    $dt_up_peminjaman = array(
      'status_peminjaman' => 'Menunggu Persetujuan PLP',
    );
    return $this->db->where('id_peminjaman', $id_peminjaman)->update('Peminjaman', $dt_up_peminjaman);
  }
  public function persetujuan_plp($id_peminjaman)
  {
    $dt_up_peminjaman = array(
      'status_peminjaman' => 'Dipinjamkan',
    );
    return $this->db->where('id_peminjaman', $id_peminjaman)->update('Peminjaman', $dt_up_peminjaman);
  }
  public function kembali($id_peminjaman)
  {
    $date = date('Y-m-d');
    $tanggal =
      $this->input->post('tgl_kembali');
    // var_dump($tanggal);
    // die();
    $peminjaman = array(
      'status_peminjaman' => 'Pengecekan Ulang',
      'tanggal_dikembalikan' => $date,

    );
    $this->db->where('id_peminjaman', $id_peminjaman)->update('peminjaman', $peminjaman);
  }
  public function rating($id_peminjaman)
  {
    $date = date('Y-m-d');
    $tanggal =
      $this->input->post('tgl_kembali');
    // var_dump($tanggal);
    // die();
    $peminjaman = array(
      'rating' => $this->input->post('rating'),

    );
    $this->db->where('id_peminjaman', $id_peminjaman)->update('peminjaman', $peminjaman);
  }
  public function selesai($id_peminjaman)
  {
    $date = date('Y-m-d');
    $idpeminjaman = $this->db->get_where('peminjaman', array('id_peminjaman' => $id_peminjaman));
    $getdaftar_mesin = $this->db->get_where('daftar_mesin', array('id_mesin' => $idpeminjaman->result()[0]->id_mesin));
    $aritmatika = (int)$getdaftar_mesin->result()[0]->jumlah_mesin + 1;
    $data_daftar_mesin = array(
      'jumlah_mesin' => $aritmatika,
    );
    $peminjaman = array(
      'status_peminjaman' => 'Selesai',
    );
    $this->db->where('id_peminjaman', $id_peminjaman)->update('peminjaman', $peminjaman);
    return $this->db->where('id_mesin', $idpeminjaman->result()[0]->id_mesin)->update('daftar_mesin', $data_daftar_mesin);
  }

  public function ambil_data($keyword = null)
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai');
    $this->db->join('daftar_mesin', 'daftar_mesin.id_mesin=Peminjaman.id_mesin');
    if (!empty($keyword)) {
      $this->db->like('nama_pegawai', $keyword);
      $this->db->or_like('nama_mesin', $keyword);
      $this->db->or_like('status_peminjaman', $keyword);
    }
    return $this->db->get()->result();
  }
}
