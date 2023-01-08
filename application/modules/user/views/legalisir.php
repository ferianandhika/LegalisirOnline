<!-- <div class="page-header header-filter" data-parallax="true" style="background-color: chartreuse; height: 6cm;"></div> -->
<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?php echo base_url() ?>assets/user/img/coba3.jpg'); height: 6cm;"></div>

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
              <form class="form" method="POST" action="<?= base_url('user/legalisir/save'); ?>"
                enctype="multipart/form-data">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Legalisir Ijazah dan Transkrip Nilai</h4>
                </div>
                <h4 class="card-title text-center">Data Diri</h4>
                <div class="card-body">
                
                  <input type="hidden" name="id_user" id="id_user" value="<?= $userr['id']; ?>">
                  <div class="form-group bmd-form-group mx-5">
                    <label for="nama" class="bmd-label-floating"></label>
                    <input type="text" class="form-control" id="nama" name="nama" required readonly value="<?php echo $userr['name']; ?>"
                      onkeypress="return event.charCode < 48 || event.charCode  >57">
                    <small class="text-muted text-danger">Nama sesuai dengan ijasah kelulusan</small>
                  </div>
                  <div class="form-group bmd-form-group mx-5">
                    <label for="email" class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required readonly value="<?php echo $userr['email']; ?>">
                    <small class="text-muted text-danger">Email</small>
                  </div>
                  <div class="form-group bmd-form-group mx-5">
                    <label class="bmd-label-floating">NIM</label>
                    <input type="text" class="form-control" name="nim" maxlength="8" required readonly value="<?php echo $userr['nim']; ?>">
                    <small class="text-muted text-danger">NIM sesuai dengan ijasah kelulusan</small>
                  </div>
                  <div class="form-group bmd-form-group mx-5">
                    <label class="bmd-label-static">Jenis Kelamin</label>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki"> Laki
                        - Laki
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                        Perempuan
                        <span class="circle">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>

                  <div class="form-group mx-5">
                    <label for="exampleFormControlTextarea1" class="bmd-label-floating">Alamat Lengkap</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"
                      required></textarea>
                  </div>
                  <div class="form-group bmd-form-group mx-5">
                    <label class="bmd-label-floating">No HP</label>
                    <input type="text" class="form-control" name="hp" maxlength="13" required
                      onkeypress="return event.charCode >= 48 && event.charCode <=57">
                  </div>

                  <div class="form-group mx-5">
                    <label for="exampleFormControlSelect1">Prodi</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1"
                      name="prodi">
                      <option>-pilih prodi terkait-</option>
                      <?php foreach ($prodi as $data) : ?>
                      <option value="<?= $data['nama_prodi']; ?>"><?= $data['nama_prodi']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-row mx-5">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4" class="bmd-label-floating">Tahun Lulus</label>
                      <input type="text" class="form-control" id="inputEmail4" name="tahun" required
                        onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4" class="bmd-label-floating">No Ijazah</label>
                      <input type="text" class="form-control" id="inputPassword4" name="ijazah" required>
                    </div>
                  </div>

                </div>

            </div>
          </div>
          <div class="col-lg-12 col-md-2 mx-auto">
            <div class="card card-login">
              <h4 class="card-title text-center">Alamat Lengkap</h4>
              <div class="card-body">
                <input type="hidden" id="origin" name="origin" value="<?php echo $gSetting->kota_pengiriman; ?>">

                <!-- <div class="form-group bmd-form-group mx-5">
                    <label class="bmd-label-floating">Privinsi</label>
                    <input type="text" class="form-control">
                  </div> -->
                <div class="form-group bmd-form-group mx-5">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control"></select>
                  </div>
                </div>
                <div class="form-group bmd-form-group mx-5">
                  <div class="form-group">
                    <label>Kota</label>
                    <select name="kota" id="kota" class="form-control"></select>
                  </div>
                </div>
                <input type="hidden" id="kabkot_name" name="kabkot_name">
                <input type="hidden" id="prov_name" name="prov_name">
                <div class="form-group bmd-form-group mx-5">
                  <label class="bmd-label-floating">Kelurahan</label>
                  <input type="text" name="kelurahan" id="kelurahan" class="form-control">
                </div>

                <div class="form-group bmd-form-group mx-5">
                  <select class="form-control" name="courier" id="courier" onchange="tampil_biaya()">
                    <option value="" disabled="disabled" selected="selected">Pilih Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                  </select>
                </div>

                <div class="form-group bmd-form-group mx-5">
                  <select class="form-control" name="harga" id="harga">
                    <option value="" disabled="disabled" selected="selected">Pilih Jenis Harga</option>
                  </select>
                </div>
                <!-- <div class="form-row mx-5">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="bmd-label-floating">Tahun Lulus</label>
                    <input type="text" class="form-control" id="inputText">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4" class="bmd-label-floating">No Ijazah</label>
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div> -->

              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-2 mx-auto">
            <div class="card card-login">
              <h4 class="card-title text-center">File Ijazah dan Transkip Nilai</h4>
              <div class="card-body">

                <!-- <div class="form-group form-file-upload form-file-multiple">
                  <label class="bmd-label-static">File Ijazah</label>
                  <input type="file" multiple="" class="inputFileHidden">
                  <div class="input-group">
                    <input type="text" class="form-control inputFileVisible col-md-11"
                      placeholder="File Fotocopy Ijazah">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                      </button>
                    </span>
                  </div>
                </div> -->

                <div class="mb-3">
                  <label for="formFile" class="form-label">File Ijazah</label>
                  <input class="form-control" type="file" name="fileijazah">
                </div>


                <br>
                <!-- <div class="form-group form-file-upload form-file-multiple">
                  <label class="bmd-label-static">File Trankrip</label>
                  <input type="file" multiple="" class="inputFileHidden">
                  <div class="input-group">
                    <input type="text" class="form-control inputFileVisible col-md-11"
                      placeholder="File Fotocopy Transkrip">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                      </button>
                    </span>
                  </div>
                </div> -->
                <div class="mb-3">
                  <label for="formFile" class="form-label">File Transkrip</label>
                  <input class="form-control" type="file" name="filetranskrip">
                </div>

                <div class="form-row mx-5">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="bmd-label-floating">Jumlah Legalisir Ijazah</label>
                    <input type="text" class="form-control" name="jmlijazah" id="jmlijazah"
                      onkeyup="hitung_total_legalisir()"
                      onkeypress="return event.charCode >= 48 && event.charCode <=57">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4" class="bmd-label-floating">Jumlah Legalisir Transkrip</label>
                    <input type="text" class="form-control" name="jmltranskrip" id="jmltranskrip"
                      onkeyup="hitung_total_legalisir()"
                      onkeypress="return event.charCode >= 48 && event.charCode <=57">
                  </div>
                </div>
                <input class="form-control" id="harga_per_lembar" name="harga_per_lembar" type="hidden"
                  value="<?php echo $gSetting->harga_perlembar; ?>">
                <div class="form-group">
                  <input class="form-control" type="text" id="total_legalisir" name="total_legalisir"
                    readonly="readonly">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1" class="bmd-label-floating">Alasan Kebutuhan Legalisir</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan"></textarea>
                </div>



                .<div class="form-group">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="option" id="pilihan1"
                        value="kirim ke alamat tujuan">
                      Kirim ke rumah
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="option" id="pilihan2"
                        value="ambil sendiri ke kampus">
                      Ambil Sendiri
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>

                <!-- show hide -->
                <div class="card text-white bg-primary" id="kirimpaket" style="display: none;">
                  <div class="card-body">
                    <h4 class="card-title">Kirim Paket</h4>
                    <p class="card-text">Paket akan di kirim ke alamat tujuan</p>
                  </div>
                </div>
                <div class="card text-white bg-primary" id="ambilsendiri" style="display: none;">
                  <div class="card-body">
                    <h4 class="card-title">Ambil Sendiri</h4>
                    <p class="card-text">Silahkan datang ke kampus untuk ambil berkas</p>
                  </div>
                </div>
                <!-- end show hide -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 ml-auto mr-auto text-center">
          <button class="btn btn-primary btn-round">Simpan</button>
        </div>
      </div>
      <br>

      </form>


    </div>
  </div>
</div>