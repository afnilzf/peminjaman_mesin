<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
class Peminjaman_kalab extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "v_peminjaman";

		$this->load->model('Peminjaman_model');

		$data['data_peminjaman'] = $this->Peminjaman_model->get_peminjamankalab();

		$this->load->model('Pegawai_model');

		$data['data_pegawai'] = $this->Pegawai_model->get_pegawai();

		$this->load->model('Daftar_mesin_model');

		$data['data_daftar_mesin'] = $this->Daftar_mesin_model->get_daftar_mesin();

		$this->load->view('index', $data);
	}

	public function setujui($id_peminjaman)
	{
		$this->load->model('Pegawai_model', 'user');
		$mail = new PHPMailer(true);
		$kajur = $this->user->get_kajur();
		$this->load->model('Peminjaman_model');
		$proses_update = $this->Peminjaman_model->persetujuan_kalab($id_peminjaman);
		$userPinjam = $this->Peminjaman_model->get_SatuPeminjaman($id_peminjaman);
		// var_dump($userPinjam);
		// die();
		if ($proses_update) {
			$this->session->set_flashdata('pesan', 'sukses update');
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
				$mail->addAddress($kajur['email']);     //Add a recipient
				$mail->addReplyTo('bengkelmesin.polmanbabel@gmail.com', 'Bengkel Mesin');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = $userPinjam['nama_pegawai'] . "Mengajukan peminjaman mesin baru";
				$mail->Body    = $userPinjam['nama_pegawai'] . '<br>Mengajukan peminjaman mesin baru,Silahkan lakukan persetujuan &nbsp;<a href="">Buka</a>';
				$mail->send();
			} catch (Exception $e) {
				// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		} else {
			$this->session->set_flashdata('pesan', 'gagal update');
		}
		redirect(base_url('index.php/Peminjaman_kalab'), 'refresh');
	}
	public function tolak()
	{
		$id_peminjaman = $this->input->post('id_peminjaman');
		$this->load->model('Peminjaman_model');
		$proses_update = $this->Peminjaman_model->penolakan($id_peminjaman);
		if ($proses_update) {
			$this->session->set_flashdata('pesan', 'sukses update');
		} else {
			$this->session->set_flashdata('pesan', 'gagal update');
		}
		redirect(base_url('index.php/Peminjaman_kalab'), 'refresh');
	}
}
