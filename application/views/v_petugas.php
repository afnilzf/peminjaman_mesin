<div class="panel">
  <div class="panel-heading">
    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
  </div>
  <div class="panel-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>NAMA</th>
          <th>NIDN</th>
          <th>Level</th>
          <th>ALAMAT</th>
          <th>USERNAME</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data_petugas as $dt_pgw) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $dt_pgw->nama_pegawai ?></td>
            <td><?= $dt_pgw->nidn_npm ?></td>
            <td>
              <?php if ($dt_pgw->id_level == '7') : ?>
                Ka.Lab
              <?php elseif ($dt_pgw->id_level == '8') : ?>
                Ka.Jurusan
              <?php endif ?>
            </td>
            <td><?= $dt_pgw->alamat ?></td>
            <td><?= $dt_pgw->username ?></td>
            <td>
              <a href="#update_petugas" class="btn btn-warning" data-toggle="modal" onclick="tm_detail(<?= $dt_pgw->id_pegawai ?>)">Update</a>
              <a href="<?= base_url('index.php/Pegawai/hapus_pegawai/' . $dt_pgw->id_pegawai) ?>" class="btn btn-danger" data-toggle="modal" onclick="return confirm('anda yakin?')">Delete</a>
            </td>
          </tr>';
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
</table>
<?php if ($this->session->flashdata('pesan') != null) : ?>
  <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
<?php endif ?>

<!-- Modal -->
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah petugas</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Petugas/simpan_petugas') ?>" method="post">
          Nama Petugas
          <input type="text" name="nama_petugas" class="form-control" required=""><br>
          NIDN/NPM
          <input type="text" name="nidn_npm" class="form-control" required=""><br>
          JURUSAN
          <input type="text" name="jurusan" class="form-control" required=""><br>
          ALAMAT
          <input type="text" name="alamat" class="form-control" required=""><br>
          USERNAME
          <input type="text" name="username" class="form-control" required=""><br>
          Password
          <input type="text" name="password" class="form-control" required=""><br>
          Level
          <select name="id_level" class="form-control" required="">
            <option>- pilih level -</option>
            <?php
            foreach ($data_level as $lvl) {
              echo "<option value= '" . $lvl->id_level . "'>
					" . $lvl->nama_level . "
					</option>";
            }
            ?>
          </select>
          <br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_petugas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">UPDATE PEGAWAI</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Petugas/update_pegawai') ?>" method="post">
          <input type="hidden" name="id_pegawai" id="id_pegawai">
          NAMA PEGAWAI
          <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control">
          <br>
          NIDN/NPM
          <input type="text" id="nidn_npm" name="nidn_npm" class="form-control"><br>
          JURUSAN
          <input type="text" id="jurusan" name="jurusan" class="form-control"><br>
          ALAMAT
          <input type="text" id="alamat" name="alamat" class="form-control"><br>
          USERNAME
          <input type="text" name="username" class="form-control" required="true"><br>
          PASSWORD
          <input type="password" name="password" class="form-control" required="true"><br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function tm_detail(id_lev) {
    $.getJSON("<?= base_url() ?>index.php/Pegawai/get_detail_pegawai/" + id_lev, function(data) {
      $("#id_pegawai").val(data['id_pegawai']);
      $("#nama_pegawai").val(data['nama_pegawai']);
      $("#nidn_npm").val(data['nidn_npm']);
      $("#jurusan").val(data['jurusan']);
      $("#alamat").val(data['alamat']);
      $("#username").val(data['username']);
      $("#password").val(data['password']);
    });
  }
</script>