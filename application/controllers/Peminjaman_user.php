<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

class Peminjaman_user extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_peminjaman";

		$this->load->model('Peminjaman_model');

		$data['data_peminjaman'] = $this->Peminjaman_model->get_peminjamanuser();
		// var_dump($data['data_peminjaman']);
		// die();
		$this->load->model('Pegawai_model');

		$data['data_pegawai'] = $this->Pegawai_model->get_pegawai();

		$this->load->model('Daftar_mesin_model');

		$data['data_daftar_mesin'] = $this->Daftar_mesin_model->get_daftar_mesin();

		$this->load->view('index', $data);
	}
	public function pinjam_mesin()
	{

		$this->load->model('Peminjaman_model', 'pmnjmn');
		$this->load->model('Pegawai_model', 'user');
		$cek_pinjam = $this->pmnjmn->cekPinjam();
		$id_pegawai = $this->session->userdata('id_pegawai');
		$user = $this->user->get_user($id_pegawai);
		$kalab = $this->user->get_kalab();
		$mail = new PHPMailer(true);
		// var_dump($cek_pinjam);
		// die();
		if ($cek_pinjam != Null) {
			$this->session->set_flashdata('pesan', 'anda belum mengembalikan mesin yang dipinjamkan sebelumnya');
		} else {
			$masuk = $this->pmnjmn->masuk_db();
			$id_mesin = $this->input->post('id_mesin');
			$getdaftar_mesin = $this->db->where('id_mesin', $id_mesin)->get('daftar_mesin')->row_array();

			$aritmatika = (int)$getdaftar_mesin['jumlah_mesin'] - 1;
			// var_dump($aritmatika);
			// die();
			$update_jumlah_mesin = array(
				'jumlah_mesin' => $aritmatika,

			);
			$update = $this->db->where('id_mesin', $id_mesin)->update('daftar_mesin', $update_jumlah_mesin);
			if ($update == true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'ssl://smtp.gmail.com:465';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'bengkelmesin.polmanbabel@gmail.com';                     //SMTP username
				$mail->Password   = 'peminjaman2021';                               //SMTP password
				$mail->SMTPSecure = 'SSL';            //Enable implicit TLS encryption
				$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//Recipients 	
				$mail->setFrom('bengkelmesin.polmanbabel@gmail.com', 'Bengkel Mesin');
				$mail->addAddress($kalab['email']);     //Add a recipient
				$mail->addReplyTo('bengkelmesin.polmanbabel@gmail.com', 'Bengkel Mesin');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = $this->session->userdata('name') . "Mengajukan peminjaman mesin baru";
				$mail->Body    = $this->session->userdata('name') . '<br>Mengajukan peminjaman mesin baru&nbsp;<a href="">Buka</a>';
				$mail->send();
			} catch (Exception $e) {
				// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
		redirect(base_url('index.php/Peminjaman_user'), 'refresh');
	}
	public function get_detail_peminjaman($id_peminjaman = '')
	{
		$this->load->model('Peminjaman_model');
		$data_detail = $this->Peminjaman_model->detail_peminjaman($id_peminjaman);
		echo json_encode($data_detail);
	}

	public function update_peminjaman()
	{
		$this->form_validation->set_rules('nama', 'Nama Mesin', 'trim|required');
		$this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');
		$this->form_validation->set_rules('tanggal_kembali', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('status_peminjaman', 'Status Peminjaman', 'trim|required');
		$this->form_validation->set_rules('id_pegawai', 'Id Peminjaman', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Peminjaman'), 'refresh');
		} else {
			$this->load->model('Peminjaman_model');
			$proses_update = $this->Peminjaman_model->update_peminjaman();
			if ($proses_update) {
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/Peminjaman'), 'refresh');
		}
	}

	public function hapus_peminjaman($id_peminjaman)
	{
		$this->load->model('Peminjaman_model');
		$this->Peminjaman_model->hapus_peminjaman($id_peminjaman);
		redirect(base_url('index.php/Peminjaman_user'), 'refresh');
	}


	public function kembali()
	{
		$id_peminjaman = $this->input->post('id_peminjaman');
		// var_dump($id_peminjaman);
		// die();
		$this->load->model('Peminjaman_model');
		$this->Peminjaman_model->kembali($id_peminjaman);
		redirect('peminjaman_user', 'refresh');
	}

	public function rating()
	{
		$id_peminjaman = $this->input->post('id_peminjaman');
		// var_dump($id_peminjaman);
		// die();
		$this->load->model('Peminjaman_model');
		$this->Peminjaman_model->rating($id_peminjaman);
		redirect('riwayat_peminjaman_user', 'refresh');
	}
}
