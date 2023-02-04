<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Status</h2>
                <div class="page_link">
                    <a href="<?= base_url('/user'); ?>">Home</a>
                    <a href="#">Status</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<section class="packages_area p_120">
    <div class="container">
        <div class="comment-form">
            <h4 class="text-danger">Riwayat Legalisir Ijazah dan Transkip</h4>
            <hr>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Tahun Lulus</th>
                        <th>No Ijazah</th>
                        <th>Tagihan</th>
                        <th>Pengiriman</th>
                        <th>Status Legalsir</th>
                        <th>Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($status as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data->name; ?></td>
                        <td><?= $data->nim; ?></td>
                        <td><?= $data->nama_prodi; ?></td>
                        <td><?= $data->angkatan; ?></td>
                        <td><?= $data->no_ijazah; ?></td>
                        <?php if ($data->pengiriman == "ambil sendiri ke kampus") : ?>
                        <td><?php echo number_format($data->harga_legalisir, 0, ",", "."); ?></td>
                        <?php else : ?>
                        <td><?php echo number_format($data->harga, 0, ",", "."); ?></td>
                        <?php endif; ?>

                        <td><?= $data->pengiriman; ?></td>
                        <td>
                            <?php if ($data->status == 1) : ?>
                            <span class="badge badge-info">Sedang Proses</span>
                            <?php elseif ($data->status == 2) : ?>
                            <span class="badge badge-warning">Sedang Kirim</span>
                            <?php  elseif ($data->status == 3) : ?>
                            <span class="badge badge-success">Selesai</span>
                            <?php else : ?>
                            <span class="badge badge-danger">Belum Proses</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($data->status_midtrans == "settlement" && $data->delivery_status == 1) : ?>
                            <span class="badge badge-success">Transaksi Sukses</span>
                            <?php elseif ($data->status_midtrans == "expire" && $data->delivery_status != 1) : ?>
                            <span class="badge badge-danger">Transaksi Expired</span>
                            <?php elseif ($data->status_midtrans == "pending" && $data->delivery_status != 1) : ?>
                            <span class="badge badge-warning">Transaksi Pending</span>
                            <?php elseif ($data->status_midtrans == "settlement"  && $data->delivery_status != 1) : ?>
                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modal-dokumen">Dokumen Diterima ?</a>
                            <?php else : ?>
                            <a href="<?= base_url('user/legalisir/paid_legalisir/' . $data->id_legalisir . ''); ?>"
                                class="btn btn-primary btn-sm">Bayar</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target=".bs-example-modal-lg"
                                onclick=showDetail(<?= $data->id_legalisir; ?>)>Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- modal dokumen -->
<div class="modal fade" id="modal-dokumen" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses Legalisir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>Apakah Dokumen Legalisir Ijazah dan Transkip Sudah Diterima ?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-sm" onclick=sudahDiterima(<?= $data->id_legalisir; ?>)>Sudah</a>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Belum</button>
            </div>
        </div>
    </div>
</div>
<!-- modal detail -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id='bodyDetailData'>
                ...
            </div>
        </div><!-- /.modal-content -->
    </div>
    <script>
    var base_url = "<?php echo base_url() ?>";

    function showDetail(id) {
        $.ajax({
            url: base_url + "user/legalisir/showDetail",
            type: "POST",
            data: 'id=' + id,
            success: function(msg) {
                $('#bodyDetailData').html(msg);
            }
        });
    }
    </script>

    <script>
    var base_url = "<?php echo base_url() ?>";

    function sudahDiterima(id) {
        $.ajax({
            url: base_url + "user/legalisir/sudah_diterima",
            type: "POST",
            data: 'id=' + id,
            success: function(msg) {
                if (msg == 1) {
                    alert('Sukses merubah status menjadi diterima');
                    location.reload();
                } else {
                    alert('Gagal merubah status menjadi diterima');
                    location.reload();
                }
            }
        });
    }
    </script>