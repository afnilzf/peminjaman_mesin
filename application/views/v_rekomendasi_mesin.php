<div class="panel">
  <?php
  if ($this->session->userdata('nama_level') == 'Admin') {
  ?>
    <div class="panel-heading">
      <!-- <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br> -->
    </div>
    <div class="panel-body">
      <table class="table table-striped apik">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA MESIN</th>
            <th>Deskripsi</th>
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
                      <td>' . $dt_inv->Deskripsi . '</td>
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