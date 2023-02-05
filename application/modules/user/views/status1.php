<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo base_url() ?>assets/user/img/coba3.jpg'); height: 6cm;"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">


      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:;">Status</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="javascript:;">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:;">Disabled</a>
            </li> -->
          </ul>
        </div>
        <div class="card-body">
          <h4 class="card-title">Special title treatment</h4>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

          <table id="key-table" class="table table-bordered">
            <thead>
              <tr>

                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Tahun Lulus</th>
                <th>no Ijazah</th>
                <th>Tagihan</th>
                <th>Pengiriman</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>


            <tbody>
              <?php
              $no = 1;
              foreach ($status as $row) {
                if ($row->status == 1) {
                  $stt = "Diproses";
                } elseif ($row->status == 2) {
                  $stt = "Dikirim";
                } elseif ($row->status == 3) {
                  $stt = "Selesai";
                } else {
                  $stt = "Belum Diproses";
                }

              ?>
                <tr>


                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->nim; ?></td>
                  <td><?php echo $row->prodi; ?></td>
                  <td><?php echo $row->tahun_lulus; ?></td>
                  <td><?php echo $row->no_ijazah; ?></td>

                  <!-- <td><?php echo number_format($row->harga, 0, ",", "."); ?></td> -->
                  <?php
                  if ($row->pengiriman == "ambil sendiri ke kampus") {
                  ?>
                    <td><?php echo number_format($row->harga_legalisir, 0, ",", "."); ?></td>
                  <?php } else { ?>
                    <td><?php echo number_format($row->harga, 0, ",", "."); ?></td>
                  <?php } ?>

                  <td><?php echo $row->pengiriman; ?></td>
                  <td><?php echo $stt ?></td>
                  <td>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg" onclick=showDetail(<?php echo $row->id_legalisir; ?>)>Detail</a>
                    <?php if ($row->status_midtrans != "") {
                    ?>
                      <a href="#!" class="btn btn-default">Sudah dibayar<i class="mdi mdi-table-detail"></i></a>
                      <?php if ($row->delivery_status != 1) {
                      ?>
                        <a href="#!" class="btn btn-primary" onclick=sudahDiterima(<?php echo $row->id_legalisir; ?>)>Sudah
                          diterima<i class="mdi mdi-table-detail"></i></a><?php
                                                                        } else { ?>
                        <label style="color: brown; text-shadow: 0 0 black;">Dokumen Sudah Diterima</label>
                      <?php } ?>
                    <?php
                    } else { ?>
                      <!-- <a href="#" class="btn btn-danger"><i class="mdi mdi-delete"></i></a> -->
                      <a href="<?= base_url('user/legalisir/paid_legalisir/' . $row->id_legalisir . ''); ?>" class="btn btn-primary">Bayar<i class="mdi mdi-table-detail"></i></a>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>



          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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