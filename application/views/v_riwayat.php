<?php
// var_dump($data_peminjaman);die;
?>
<div class="panel">
	<?php
	if ($this->session->userdata('nama_level') == 'Admin') {
	?>
		<div class="panel-heading">
			<a href="#tambah" class="btn btn-primary" data-toggle="modal">
				<span class="glyphicon glyphicon-plus"></span>Tambah</a>
			<br>
		</div>
		<div class="panel-body">
			<h4>
				<i class="glyphicon glyphicon-save"></i>
				<table class="table table-striped apik">
			</h4>
		</div>
		<div class="panel-body">

			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA MESIN</th>
					<th>TANGGAL PINJAM</th>
					<th>TANGGAL KEMBALI</th>
					<th>STATUS PEMINJAMAN</th>
					<th>Nama Peminjam</th>
					<th>Jurusan</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($data_peminjaman as $dt_pmnjmn) : ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $dt_pmnjmn->nama_mesin ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_pinjam ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_kembali ?>
						</td>
						<td>
							<?php if ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan Kalab') : ?>
								<span class="lbl-biru">Menunggu Persetujuan Kalab</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan Kajur') : ?>
								<span class="lbl-biru">Menunggu Persetujuan Kajur</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan PLP') : ?>
								<span class="lbl-biru">Menunggu Persetujuan PLP</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Ditolak') : ?>
								<span class="lbl-merah">Ditolak</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Dipinjamkan') : ?>
								<span class="lbl-ungu">Dipinjamkan</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Selesai') : ?>
								<span class="lbl-hijau">Selesai</span>
							<?php endif ?>
						</td>
						<td>
							<?= $dt_pmnjmn->nama_pegawai ?>
						</td>
						<td>
							<?= $dt_pmnjmn->jurusan ?>
						</td>
						<td>

							<?php if ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan PLP') : ?>
								<a href="<?= base_url('index.php/Peminjaman/setujui/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Setujui</a>
								<a href="<?= base_url('index.php/Peminjaman/tolak/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-warning">Tolak</a>
							<?php endif; ?>

							<a class="btn btn-danger" data-toggle="modal" onclick="if (confirm('Apakah anda yakin ?')) window.location.href='<?=
																																				base_url('index.php/Peminjaman/hapus_peminjaman/' . $dt_pmnjmn->id_peminjaman);
																																				?>'">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	<?php
	} elseif ($this->session->userdata('nama_level') == 'Kalab' || $this->session->userdata('nama_level') == 'Kajur') {
	?>
		<div class="panel-heading">
		</div>
		<div class="panel-body">
			<h4>
				<i class="glyphicon glyphicon-save"></i>
				<table class="table table-striped apik">
			</h4>
		</div>
		<div class="panel-body">

			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA MESIN</th>
					<th>TANGGAL PINJAM</th>
					<th>TANGGAL KEMBALI</th>
					<th>STATUS PEMINJAMAN</th>
					<th>Nama Peminjam</th>
					<th>Jurusan</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($data_peminjaman as $dt_pmnjmn) : ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $dt_pmnjmn->nama_mesin ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_pinjam ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_kembali ?>
						</td>
						<td>
							<?php if ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan Kalab') : ?>
								<span class="lbl-biru">Menunggu Persetujuan Kalab</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan Kajur') : ?>
								<span class="lbl-biru">Menunggu Persetujuan Kajur</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan PLP') : ?>
								<span class="lbl-biru">Menunggu Persetujuan PLP</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Ditolak') : ?>
								<span class="lbl-merah">Ditolak</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Dipinjamkan') : ?>
								<span class="lbl-ungu">Dipinjamkan</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Selesai') : ?>
								<span class="lbl-hijau">Selesai</span>
							<?php endif ?>
						</td>
						<td>
							<?= $dt_pmnjmn->nama_pegawai ?>
						</td>
						<td>
							<?= $dt_pmnjmn->jurusan ?>
						</td>
						<td>
							<?php if ($this->session->userdata('nama_level') == 'Kalab') : ?>
								<a href="<?= base_url('index.php/Peminjaman_kalab/setujui/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Setujui</a><br>
								<a href="<?= base_url('index.php/Peminjaman_kalab/tolak/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-danger">Tolak</a>
							<?php elseif ($this->session->userdata('nama_level') == 'Kajur') : ?>
								<a href="<?= base_url('index.php/Peminjaman_kajur/setujui/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Setujui</a>&nbsp;
								<a href="<?= base_url('index.php/Peminjaman_kajur/tolak/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-danger">Tolak</a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	<?php
	} elseif ($this->session->userdata('nama_level') == 'dosen' || $this->session->userdata('nama_level') == 'mahasiswa') {
	?>
		<div class="panel-heading">
		</div>
		<div class="panel-body">
			<h4>
				<i class="glyphicon glyphicon-save"></i>
				<table class="table table-striped apik">
			</h4>
		</div>
		<div class="panel-body">

			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA MESIN</th>
					<th>TANGGAL PINJAM</th>
					<th>TANGGAL KEMBALI</th>
					<th>TANGGAL DIKEMBALIKAN</th>
					<th>RATING</th>
					<th>STATUS PEMINJAMAN</th>
					<th>BERI RATING</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($data_peminjaman as $dt_pmnjmn) : ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $dt_pmnjmn->nama_mesin ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_pinjam ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_kembali ?>
						</td>
						<td>
							<?= $dt_pmnjmn->tanggal_dikembalikan ?>
						</td>
						<td>
							<?php if ($dt_pmnjmn->rating == 1) : ?>
								<span class="glyphicon glyphicon-star"></span>
								<span class="lbl-biru"> Sangat Buruk</span>
							<?php elseif ($dt_pmnjmn->rating == 2) : ?>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="lbl-biru"> Buruk</span>
							<?php elseif ($dt_pmnjmn->rating == 3) : ?>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="lbl-biru">Cukup</span>
							<?php elseif ($dt_pmnjmn->rating == 4) : ?>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="lbl-biru">Baik</span>
							<?php elseif ($dt_pmnjmn->rating == 5) : ?>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="lbl-biru"> Sangat Baik</span>
							<?php endif ?>
						</td>
						<td>
							<?php if ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan Kalab') : ?>
								<span class="lbl-biru">Menunggu Persetujuan Kalab</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan Kajur') : ?>
								<span class="lbl-biru">Menunggu Persetujuan Kajur</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan PLP') : ?>
								<span class="lbl-biru">Menunggu Persetujuan PLP</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Ditolak') : ?>
								<span class="lbl-merah">Ditolak</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Dipinjamkan') : ?>
								<span class="lbl-ungu">Dipinjamkan</span>
							<?php elseif ($dt_pmnjmn->status_peminjaman == 'Selesai') : ?>
								<span class="lbl-hijau">Selesai</span>
							<?php endif ?>
						</td>
						<td>
							<?php if ($dt_pmnjmn->status_peminjaman == 'Selesai') : ?>
								<?php if ($dt_pmnjmn->rating == 0) : ?>
									<a href="#tambah" class="btn btn-success" data-toggle="modal" onclick="tm_detail(<?= $dt_pmnjmn->id_peminjaman ?>)">Rating</a>
								<?php endif ?>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	<?php
	}
	?>

</div>
<?php if ($this->session->flashdata('pesan') != null) : ?>
	<div class="alert alert-danger">
		<?= $this->session->flashdata('pesan'); ?>
	</div>
<?php endif ?>

<!-- Modal -->
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah peminjaman</h4>
			</div>
			<div class="modal-body">
				<h3>Isi rating dengan angka sesuai dengan keterangan jika memenuhi ketentuan</h3>
				<div class="alert wy-alert-info">
					&nbsp;Etika&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star">25%</span><br>
					&nbsp;Cara Melayani&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star">25%</span><br>
					&nbsp;Penyampaian SOP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star">25%</span><br>
					&nbsp;Stand by saat pengawasan<span class="glyphicon glyphicon-star">25%</span><br>
					&nbsp;Sopan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star">25%</span><br>
				</div>
				<form action="<?= base_url('index.php/Peminjaman_user/rating/') ?>" method="post">
					<input type="hidden" name="id_peminjaman" id="id_peminjaman">
					<br> Rating <code>*1-5</code>
					<input type="number" name="rating" class="form-control" max="5" min="0">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
	function tm_detail(id_peminjaman) {
		$.getJSON("<?= base_url() ?>index.php/Peminjaman/get_detail_peminjaman/" + id_peminjaman, function(data) {
			$("#id_peminjaman").val(data['id_peminjaman']);
			$("#id_mesin").val(data['id_mesin']);
			$("#tanggal_pinjam").val(data['tanggal_pinjam']);
			$("#tanggal_kembali").val(data['tanggal_kembali']);
			$("#status_peminjaman").val(data['status_peminjaman']);
			$("#id_pegawai").val(data['id_pegawai']);

		});
	}
</script>