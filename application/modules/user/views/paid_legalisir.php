<!-- <div class="page-header header-filter" data-parallax="true" style="background-color: chartreuse; height: 6cm;"></div> -->
<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?php echo base_url() ?>assets/user/img/city-profile.jpg'); height: 6cm;"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">LEGALISIR</h2>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-2 mx-auto">
            <div class="card card-login">
              <form class="form" method="POST" action="<?= base_url('user/legalisir/vtweb_checkout'); ?>"
                enctype="multipart/form-data">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Data Tagihan Legalisir Ijazah dan Transkrip Nilai</h4>
                </div>
                <h4 class="card-title text-center">Data Tagihan</h4>
                <div class="card-body">

                  <input type="hidden" name="id_leg" id="id_leg" value="<?= $row->id_legalisir; ?>">
                  <table id="key-table" class="table table-bordered">
                      <thead>
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


                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->nim; ?></td>
                            <td><?php echo $row->prodi; ?></td>
                            <td><?php echo $row->tahun_lulus; ?></td>
                            <td><?php echo $row->no_ijazah; ?></td>
                            <?php
                            if($row->pengiriman == "ambil sendiri ke kampus"){
                              ?>
                            <td><?php echo number_format($row->harga_legalisir,0,",","."); ?></td>
                            <?php }else{?>
                            <td><?php echo number_format($row->harga,0,",","."); ?></td>
                            <?php } ?>
                            <td><?php echo $row->pengiriman; ?></td>
                            <td>
                              Legalisir Ijazah sebanyak : <?php echo $row->jumlah_ijazah; ?> Lembar <br>
                              Legalisir Transkrip sebanyak : <?php echo $row->jumlah_transkrip; ?> Lembar

                            </td>
                          </tr>
                        </tbody>
                  </table>

                </div>

            </div>
          </div>
        </div>
      </div>
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
      <br>

      </form>


    </div>
  </div>
</div>