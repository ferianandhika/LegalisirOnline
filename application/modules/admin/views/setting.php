<div class="content-page">
  <!-- Start content -->

  <div class="content">
    <div class="container-fluid">
      <h1>SETTING</h1>
      <form class="form" method="POST" action="<?= base_url('admin/setting/simpan'); ?>"
                enctype="multipart/form-data">
      <div class="row">
        
        <div class="col-sm-12">
          <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Setting Alamat Kampus</h4>
            <hr>

            <!-- <label>Provinsi</label>
            <select class="form-control select2" data-toggle="select2">

              <optgroup label="Pilih Provinsi">
                <option value="AK">Alaska</option>
                <option value="HI">Hawaii</option>
              </optgroup> -->

            </select>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Provinsi</label>
                  <select name="provinsi" id="provinsi" class="form-control"></select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kota</label>
                  <select name="kota" id="kota" class="form-control"></select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Provinsi yang diset</label>
                  <input type="text" id="txtProv" name="txtProv" class="form-control" value="<?php echo $dataProv->province_name; ?>" readonly> 
                  <input type="hidden" id="txtProvId" name="txtProvId" class="form-control" value="<?php echo $dataRow->prov_pengiriman; ?>"> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kota yang diset</label>
                  <input type="text" id="txtKota" name="txtKota" class="form-control" value="<?php echo $dataKota->city_name; ?>" readonly> 
                  <input type="hidden" id="txtKotaId" name="txtKotaId" class="form-control" value="<?php echo $dataRow->kota_pengiriman; ?>"> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Harga Perlembar</label>
                  <input type="text" id="harga_perlembar" name="harga_perlembar" class="form-control" value="<?php echo $dataRow->harga_perlembar; ?>"> 
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit Data</button>

          </div>
        </div>
        
      </div>
    </div>
    </form>
  </div>


  <footer class="footer text-right">
    2016 - 2019 © Adminto. Coderthemes.com
  </footer>

</div>

<script>
  $(document).ready(function() {
    //provinsi
    $.ajax({
      type: "POST",
      url: "<?= base_url('api/api_rajaongkir/provinsi') ?>",
      success: function(hasil_provinsi) {
        // console.log(hasil_provinsi);
        $("select[name=provinsi").html(hasil_provinsi);
      }
    });

    //kota
    $("select[name=provinsi]").on("change", function() {
      var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
      $('#txtProvId').val(id_provinsi_terpilih);
      $.ajax({
        type: "POST",
        url: "<?= base_url('api/api_rajaongkir/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_kota) {
          // console.log(hasil_kota);
          //alert($("option:selected", this).attr("id_kota"));
          $("select[name=kota").html(hasil_kota);
        }
      });

    });

    $("select[name=kota]").on("change", function() {
      var id_kota_terpilih = $("option:selected", this).attr("id_kota");

      $('#txtKotaId').val(id_kota_terpilih);

    });      
  });
</script>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->