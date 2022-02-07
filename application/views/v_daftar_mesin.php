<div class="panel">
  <?php
  if ($this->session->userdata('nama_level') == 'Admin') {
  ?>
    <div class="panel-heading">
      <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
    </div>
    <div class="panel-body">
      <table class="table table-striped apik">
        <thead>
          <tr>
            <th>NO</th>
            <th>ID MESIN</th>
            <th>NAMA MESIN</th>
            <th>KONDISI MESIN</th>
            <th>JUMLAH MESIN</th>
            <th>ID JENIS</th>
            <th>KODE MESIN</th>
            <th>ID PETUGAS</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($data_daftar_mesin as $dt_inv) {
            $no++;
            echo '<tr>
                      <td>' . $no . '</td>
                      <td>' . $dt_inv->id_mesin . '</td>
                      <td>' . $dt_inv->nama_mesin . '</td>
                      <td>' . $dt_inv->kondisi_mesin . '</td>
                      <td>' . $dt_inv->jumlah_mesin . '</td>
                      <td>' . $dt_inv->id_jenis . '</td>
                      <td>' . $dt_inv->kode_mesin . '</td>
                      <td>' . $dt_inv->id_petugas . '</td>
                      <td>
                      <a href="#update_daftar_mesin" class="btn btn-warning" data-toggle="modal" onclick="tm_detail(' . $dt_inv->id_mesin . ')">Update</a> 
                      </td>
  
                      </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  <?php
  } elseif ($this->session->userdata('nama_level') == 'Kalab' || $this->session->userdata('nama_level') == 'Kajur') {
  ?><div class="panel-heading">

    </div>
    <div class="panel-body">
      <table class="table table-striped apik">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA MESIN</th>
            <th>KONDISI MESIN</th>
            <th>JUMLAH MESIN</th>
            <th>JENIS</th>
            <th>Keterangan</th>
            <th>KODE MESIN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($data_daftar_mesin as $dt_inv) {
            $no++;
            echo '<tr>
                      <td>' . $no . '</td>
                      <td>' . $dt_inv->nama_mesin . '</td>
                      <td>' . $dt_inv->kondisi_mesin . '</td>
                      <td>' . $dt_inv->jumlah_mesin . '</td>
                      <td>' . $dt_inv->nama_jenis . '</td>
                      <td>' . $dt_inv->keterangan . '</td>
                      <td>' . $dt_inv->kode_mesin . '</td>
  
                      </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  <?php
  } elseif ($this->session->userdata('nama_level') == 'dosen' || $this->session->userdata('nama_level') == 'mahasiswa') {
  ?>
    <div class="panel-heading">
      <a href="#rek-mesin" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Rekomendasi Saran Mesin</a><br>
    </div>
    <div class="panel-body">
      <table class="table table-striped apik">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA MESIN</th>
            <th>KONDISI MESIN</th>
            <th>JUMLAH MESIN</th>
            <th>JENIS</th>
            <th>Keterangan</th>
            <th>KODE MESIN</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($data_daftar_mesin as $dt_inv) {
            $no++;
            echo '<tr>
                      <td>' . $no . '</td>
                      <td>' . $dt_inv->nama_mesin . '</td>
                      <td>' . $dt_inv->kondisi_mesin . '</td>
                      <td>' . $dt_inv->jumlah_mesin . '</td>
                      <td>' . $dt_inv->nama_jenis . '</td>
                      <td>' . $dt_inv->keterangan . '</td>
                      <td>' . $dt_inv->kode_mesin . '</td>
                      <td>
                      <a href="#pinjam" class="btn btn-success" data-toggle="modal" onclick="pinjam(' . $dt_inv->id_mesin . ')">pinjam</a> 
                      </td>
                      </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  <?php
  }
  ?>
</div>
<?php if ($this->session->flashdata('pesan') != null) : ?>
  <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
<?php endif ?>

<?php if ($this->session->userdata('nama_level') == 'Admin') : ?>
  <!--============= Modal  Tambah ================-->
  <div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Daftar Mesin</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('index.php/daftar_mesin/simpan_daftar_mesin') ?>" method="post">
            Nama Mesin
            <input type="text" name="nama_mesin" class="form-control"><br>
            <br> Kondisi Mesin
            <select name="kondisi_mesin" id="form_control">
              <option value="BAIK">BAIK</option>
              <option value="RUSAK">RUSAK</option>
              <option value="PERBAIKAN">PERBAIKAN</option>
            </select>
            <br>
            <br>
            <br>
            Jumlah Mesin
            <input type="text" name="jumlah_mesin" class="form-control"><br>
            Id Jenis
            <select name="id_jenis" class="form-control">
              <?php
              foreach ($data_jenis as $jns) {
                echo "<option value= '" . $jns->id_jenis . "'>
                       " . $jns->nama_jenis . "
                       </option>";
              }
              ?>
            </select><br>
            Kode Mesin
            <input type="text" name="kode_mesin" class="form-control"><br>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ==============================Modal Update Mesin ====================== -->
  <div class="modal fade" id="update_daftar_mesin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Daftar Mesin</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('index.php/daftar_mesin/update_daftar_mesin') ?>" method="post">
            <input type="hidden" name="id_mesin" id="id_mesin"><br>
            Nama Mesin
            <input type="text" id="nama_mesin" name="nama_mesin" class="form-control"><br>
            <br> Kondisi Mesin
            <select name="kondisi_mesin" id="form_control">
              <option value="BAIK">BAIK</option>
              <option value="RUSAK">RUSAK</option>
              <option value="PERBAIKAN">PERBAIKAN</option>
            </select>
            <br>
            <br>
            <br>
            Jumlah Mesin
            <input type="text" id="jumlah_mesin" name="jumlah_mesin" class="form-control"><br>
            Id Jenis
            <select name="id_jenis" class="form-control">
              <?php
              foreach ($data_jenis as $jns) {
                echo "<option value= '" . $jns->id_jenis . "'>
                       " . $jns->nama_jenis . "
                       </option>";
              }
              ?>
            </select><br>
            Kode Mesin
            <input type="text" id="kode_mesin" name="kode_mesin" class="form-control"><br>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($this->session->userdata('nama_level') == 'dosen' || $this->session->userdata('nama_level') == 'mahasiswa') : ?>
  <div class="modal fade" id="pinjam">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Daftar Mesin</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('index.php/Peminjaman_user/pinjam_mesin') ?>" method="post">
            <input type="hidden" name="id_mesin" id="id_mesin"><br>
            <br> Tanggal Pinjam
            <input type="date" name="tanggal_pinjam" class="form-control" required>
            <br> Alasan Peminjaman
            <input type="text" name="alasan" class="form-control" max="5" min="0" required>
            <br> Kelas
            <input type="text" name="kelas" class="form-control" max="5" min="0" required>
            <br>
            <br>
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
  <div class="modal fade" id="rek-mesin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Rekomendasi Saran Mesin</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('index.php/daftar_mesin/simpan_rekomendasi_mesin') ?>" method="post">
            Nama Mesin
            <input type="text" name="nama_mesin" class="form-control"><br>
            Deskripsi
            <textarea name="desc" id="desc" cols="30" rows="3" class="form-control"></textarea> <br>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<script>
  function tm_detail(id_lev) {
    $.getJSON("<?= base_url() ?>index.php/daftar_mesin/get_detail_daftar_mesin/" + id_lev, function(data) {
      $("#id_mesin").val(data['id_mesin']);
      $("#nama_mesin").val(data['nama_mesin']);
      $("#kondisi_mesin").val(data['kondisi_mesin']);
      $("#jumlah_mesin").val(data['jumlah_mesin']);
      $("#id_jenis").val(data['id_jenis']);
      $("#kode_mesin").val(data['kode_mesin']);
      $("#id_petugas").val(data['id_petugas']);

    });
  }

  function pinjam(id_lev) {
    $.getJSON("<?= base_url() ?>index.php/daftar_mesin/get_detail_daftar_mesin/" + id_lev, function(data) {
      $("#id_mesin").val(data['id_mesin']);

    });
  }
</script>