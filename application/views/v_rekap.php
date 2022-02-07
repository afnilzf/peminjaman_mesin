<?php
// var_dump($data_peminjaman);die;
?>
<div class="panel">
    <?php
    if ($this->session->userdata('nama_level') == 'Admin') {
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
                    <th>RATING</th>
                    <th>Nama Peminjam</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <?php foreach ($rekap as $dt_pmnjmn) : ?>
                <tbody?>
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
                            <?php elseif ($dt_pmnjmn->status_peminjaman == 'Pengecekan Ulang') : ?>
                                <span class="lbl-kuning">Pengecekan Ulang</span>
                            <?php elseif ($dt_pmnjmn->status_peminjaman == 'Selesai') : ?>
                                <span class="lbl-hijau">Selesai</span>
                            <?php endif ?>
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
                            <?= $dt_pmnjmn->nama_pegawai ?>
                        </td>
                        <td>
                            <?= $dt_pmnjmn->kelas ?>
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

<script>
    function tm_detail(id_peminjaman) {
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
<script>
    function tm_kmbli(id_peminjaman) {
        $.getJSON("<?= base_url() ?>index.php/Peminjaman/get_detail_peminjaman/" + id_peminjaman, function(data) {
            $("#id_peminjaman").val(data['id_pinjam']);
            $("#id_mesin").val(data['id_mesin']);
            $("#tanggal_pinjam").val(data['tanggal_pinjam']);
            $("#tanggal_kembali").val(data['tanggal_kembali']);
            $("#status_peminjaman").val(data['status_peminjaman']);
            $("#id_pegawai").val(data['id_pegawai']);

        });
    }
</script>