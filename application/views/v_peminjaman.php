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
					<th>KETERANGAN</th>
					<th>KELAS</th>
					<th>STATUS PEMINJAMAN</th>
					<th>Nama Peminjam</th>
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
							<?= $dt_pmnjmn->alasan ?>
						</td>
						<td>
							<?= $dt_pmnjmn->kelas ?>
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

							<?php if ($dt_pmnjmn->status_peminjaman == 'Menunggu Persetujuan PLP') : ?>
								<a href="<?= base_url('index.php/Peminjaman/setujui/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Setujui</a>
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
					<th>Keterangan</th>
					<th>KELAS</th>
					<th>STATUS PEMINJAMAN</th>
					<th>Nama Peminjam</th>
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
							<?= $dt_pmnjmn->alasan ?>
						</td>
						<td>
							<?= $dt_pmnjmn->kelas ?>
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
							<?php if ($this->session->userdata('nama_level') == 'Kalab') : ?>
								<a href="<?= base_url('index.php/Peminjaman_kalab/setujui/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Setujui</a><br>
								<a href="#update_peminjaman" class="btn btn-danger" data-toggle="modal" onclick="tm_detail(<?= $dt_pmnjmn->id_peminjaman ?>)">Kembalikan</a>

							<?php elseif ($this->session->userdata('nama_level') == 'Kajur') : ?>
								<a href="<?= base_url('index.php/Peminjaman_kajur/setujui/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Setujui</a>&nbsp;
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
					<th>Keterangan</th>
					<th>kelas</th>
					<th>STATUS PEMINJAMAN</th>
					<th>AKSI</th>
					<th>Alasan</th>
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
							<?= $dt_pmnjmn->alasan ?>
						</td>
						<td>
							<?= $dt_pmnjmn->kelas ?>
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
							<?php if ($dt_pmnjmn->status_peminjaman == 'Dipinjamkan') : ?>

								<a href="#kembali" class="btn btn-success" data-toggle="modal" onclick="tm_kmbli(<?= $dt_pmnjmn->id_peminjaman ?>)">Kembalikan</a>
							<?php endif ?>
						</td>
						<td>
							<?php if ($dt_pmnjmn->status_peminjaman == 'Ditolak') : ?>
								<?= $dt_pmnjmn->tolak_alasan ?>
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
				<form action="<?= base_url('index.php/Peminjaman/simpan_peminjaman') ?>" method="post">
					Nama Mesin
					<select name="id_mesin" class="form-control">
						<?php foreach ($data_daftar_mesin as $inv) : ?>
							<option value="<?= $inv->id_mesin ?>"><?= $inv->nama_mesin ?> - <?= $inv->kode_mesin ?></option>
						<?php endforeach; ?>
					</select>
					<br> Tanggal Pinjam
					<input type="date" name="tanggal_pinjam" class="form-control">
					<br> Tanggal Kembali
					<input type="date" name="tanggal_kembali" class="form-control">
					<br> Status Peminjaman
					<!-- <input type="text" name="status_peminjaman" class="form-control"> -->
					<select name="status_peminjaman" id="form_control">
						<option value="sedang dipinjam">SEDANG DIPINJAM</option>
						<option value="dikembalikan">DIKEMBALIKAN</option>
					</select>
					<br> Id Pegawai
					<select name="id_pegawai" class="form-control">
						<?php
						foreach ($data_pegawai as $pgw) {
							echo "<option value= '" . $pgw->id_pegawai . "'>
					" . $pgw->nama_pegawai . "
					</option>";
						}
						?>
					</select>
					<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="update_peminjaman">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tolak peminjaman</h4>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('index.php/Peminjaman_kalab/tolak/') ?>" method="post">
					<input type="hidden" name="id_peminjaman" id="id_peminjaman">
					<br>Alasan Penolakan
					<input type="text" name="alasan" class="form-control">
					<br>
			</div>
			<div class="modal-footer">
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="kembali">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah peminjaman</h4>
			</div>
			<?php $tanggal = date('Y-m-d');
			?>
			<div class="modal-body">
				<form action="<?= base_url('index.php/Peminjaman_user/kembali/') ?>" method="post">
					<input type="hidden" name="id_peminjaman" id="id_pinjam">
					<br> Tanggal Pengembalian
					<input type="text" name="tgl_kembali" class="form-control" value="<?= $tanggal ?>" disabled>
					<!-- <input type="date" name="tgl" class="form-control" value="<?= $tanggal ?>" disabled> -->
					<!-- <br> Rating <code>*1-5</code>
					<input type="number" name="rating" class="form-control" max="5" min="0"> -->


			</div>
			<div class="modal-footer">
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
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
<script>
	function tm_kmbli(id_peminjaman) {
		$.getJSON("<?= base_url() ?>index.php/Peminjaman/get_detail_peminjaman/" + id_peminjaman, function(data) {
			$("#id_pinjam").val(data['id_peminjaman']);
			$("#id_mesin").val(data['id_mesin']);
			$("#tanggal_pinjam").val(data['tanggal_pinjam']);
			$("#tanggal_kembali").val(data['tanggal_kembali']);
			$("#status_peminjaman").val(data['status_peminjaman']);
			$("#id_pegawai").val(data['id_pegawai']);

		});
	}
</script>