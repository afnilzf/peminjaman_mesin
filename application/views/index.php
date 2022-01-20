<!doctype html>
<html lang="en">

<head>
	<title>Peminjaman Mesin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/polman.jpg">
	<link rel="icon" type="image/jpg" sizes="96x96" href="<?= base_url() ?>assets/img/polman.jpg">
	<style>
		.lbl-biru {
			display: inline-block;
			min-width: 10px;
			padding: 3px 7px;
			font-size: 12px;
			font-weight: bold;
			line-height: 1;
			color: #000;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			background-color: #00c3e6;
			border-radius: 10px;
		}

		.lbl-merah {
			display: inline-block;
			min-width: 10px;
			padding: 3px 7px;
			font-size: 12px;
			font-weight: bold;
			line-height: 1;
			color: #fff;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			background-color: #e60022;
			border-radius: 10px;
		}

		.lbl-kuning {
			display: inline-block;
			min-width: 10px;
			padding: 3px 7px;
			font-size: 12px;
			font-weight: bold;
			line-height: 1;
			color: #fff;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			background-color: #998500;
			border-radius: 10px;
		}

		.lbl-hijau {
			display: inline-block;
			min-width: 10px;
			padding: 3px 7px;
			font-size: 12px;
			font-weight: bold;
			line-height: 1;
			color: #000;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			background-color: #03fc0b;
			border-radius: 10px;
		}

		.lbl-ungu {
			display: inline-block;
			min-width: 10px;
			padding: 3px 7px;
			font-size: 12px;
			font-weight: bold;
			line-height: 1;
			color: #fff;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			background-color: #ec03fc;
			border-radius: 10px;
		}
	</style>
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<link href="<?= base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?= base_url() ?>index.php/Dashboard"><img src="<?= base_url() ?>assets/img/header.png" alt="Polman logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url() ?>assets/img/polman.jpg" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('nama_pegawai'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url() ?>index.php/Logout"><i class="lnr lnr-exit"></i><span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>


			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<?php
					if ($this->session->userdata('nama_level') == 'Admin') {
					?>
						<br>
						<br>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Dashboard" class=""><i class="lnr lnr-home"></i>
									<span>Dashboard</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Jenis" class=""><i class="glyphicon glyphicon-th-large"></i>
									<span>Jenis</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/daftar_mesin" class=""><i class="glyphicon glyphicon-list-alt"></i>
									<span>Daftar Mesin</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Peminjaman" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Peminjaman</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Pengembalian" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Pengembalian</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Petugas" class=""><i class="glyphicon glyphicon-user"></i>
									<span>Operator</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Pegawai" class=""><i class="glyphicon glyphicon-user"></i>
									<span>Dosen</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Mahasiswa" class=""><i class="glyphicon glyphicon-user"></i>
									<span>Mahasiswa</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Rekomendasi_mesin" class=""><i class="glyphicon glyphicon-list-alt"></i>
									<span>Daftar Rekomendasi Mesin</span></a></li>
						</ul>

					<?php
					} elseif ($this->session->userdata('nama_level') == 'Kalab') {
					?>
						<br>
						<br>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Dashboard" class=""><i class="lnr lnr-home"></i>
									<span>Dashboard</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Daftar_mesin_operator" class=""><i class="glyphicon glyphicon-list-alt"></i>
									<span>Daftar Mesin</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Peminjaman_kalab" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Peminjaman</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Pengembalian" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Pengembalian</span></a></li>
						</ul>
					<?php
					} elseif ($this->session->userdata('nama_level') == 'Kajur') {
					?>
						<br>
						<br>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Dashboard" class=""><i class="lnr lnr-home"></i>
									<span>Dashboard</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Daftar_mesin_operator" class=""><i class="glyphicon glyphicon-list-alt"></i>
									<span>Daftar Mesin</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Peminjaman_kajur" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Peminjaman</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Pengembalian" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Pengembalian</span></a></li>
						</ul>
					<?php
					} elseif ($this->session->userdata('nama_level') == 'dosen') {
					?>
						<br>
						<br>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Dashboard" class=""><i class="lnr lnr-home"></i>
									<span>Dashboard</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Daftar_mesin_user" class=""><i class="glyphicon glyphicon-list-alt"></i>
									<span>Daftar Mesin</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Peminjaman_user" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Peminjaman</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Riwayat_peminjaman_user" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Riwayat Peminjaman</span></a></li>
						</ul>

					<?php
					} elseif ($this->session->userdata('nama_level') == 'mahasiswa') {
					?>
						<br>
						<br>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Dashboard" class=""><i class="lnr lnr-home"></i>
									<span>Dashboard</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Daftar_mesin_user" class=""><i class="glyphicon glyphicon-list-alt"></i>
									<span>Daftar Mesin</span></a></li>
						</ul>

						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Peminjaman_user" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Peminjaman</span></a></li>
						</ul>
						<ul class="nav">
							<li><a href="<?= base_url() ?>index.php/Riwayat_peminjaman_user" class=""><i class="glyphicon glyphicon-transfer"></i>
									<span>Riwayat Peminjaman</span></a></li>
						</ul>
					<?php
					}
					?>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<?php
					$this->load->view($konten);
					?>
					<!-- OVERVIEW -->
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->


	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>

	<script src="<?= base_url() ?>assets/scripts/klorofil-common.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script>
		$('.apik').DataTable({
			dom: 'Bfrtip',
			responsive: true,
			buttons: [
				'pdf', 'print', 'excel'
			]
		});
	</script>

</body>

</html>