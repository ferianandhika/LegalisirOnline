<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Proses Legalisir</h2>
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
            <h4 class="text-danger">Data Tagihan Legalisir Ijazah dan Transkrip Nilai</h4>
            <hr>
            <form class="form" method="POST" action="<?= base_url('user/legalisir/vtweb_checkout'); ?>"
                enctype="multipart/form-data">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Tahun Lulus</th>
                            <th>no Ijazah</th>
                            <th>Tagihan</th>
                            <th>Pengiriman</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <input type="hidden" name="id_leg" id="id_leg" value="<?= $row->id_legalisir; ?>">
                            <td><?= $row->name; ?></td>
                            <td><?= $row->nim; ?></td>
                            <td><?= $row->prodi; ?></td>
                            <td><?= $row->angkatan; ?></td>
                            <td><?= $row->no_ijazah; ?></td>
                            <?php if ($row->pengiriman == "ambil sendiri ke kampus") : ?>
                            <td><?= number_format($row->harga_legalisir,0,",","."); ?></td>
                            <?php else : ?>
                            <td><?= number_format($row->harga,0,",","."); ?></td>
                            <?php endif; ?>
                            <td><?= $row->pengiriman; ?></td>
                            <td>
                                <li>Legalisir Ijazah : <?= $row->jumlah_ijazah; ?> Lembar <br></li>
                                <li>Legalisir Transkrip : <?= $row->jumlah_transkrip; ?> Lembar</li>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
              if($row->order_id ==  "" && $row->gross_amount ==  "" || $row->order_id ==  "" && $row->gross_amount !=  0){
                ?>
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">
                        <button class="btn btn-primary btn-round" type="submit">Bayar Transaksi</button>
                    </div>
                </div>
                <?php
              }else{
                  if($getSt->transaction_status == "settlement"){
                    ?>
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">
                        <span style="color:green">SUDAH DIBAYAR</span>
                    </div>
                </div><?php
                  }else{
                    ?>
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">
                        <button class="btn btn-primary btn-round" type="submit">Bayar Transaksi</button>
                    </div>
                </div>
                <?php
                    }
                  }
                ?>
            </form>
        </div>
    </div>
</section>