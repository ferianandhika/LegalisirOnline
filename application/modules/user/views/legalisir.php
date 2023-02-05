<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Legalisir</h2>
                <div class="page_link">
                    <a href="<?= base_url('/user'); ?>">Home</a>
                    <a href="#">Legalisir</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<section class="packages_area p_120">
    <div class="container">
        <div class="comment-form">
            <h4 class="text-danger">Legalisir Ijazah dan Transkrip Nilai</h4>
            <hr>
            <form method="post" action="<?= base_url('user/legalisir/save'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_user" id="id_user" value="<?= $userr['id']; ?>">
                <h4>Data Ijazah</h4>
                <div class="form-group">
                    <label for="">No Ijazah :</label>
                    <input style="background-color: #F5F5F5" type="text" name="ijazah" placeholder="Masukan No Ijazah Anda"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan No Ijazah Anda'"
                        class="single-input-primary">
                    <small class="text-danger"><?= form_error('ijazah'); ?></small>
                </div>
                <h4>Alamat Pengiriman</h4>
                <input type="hidden" id="origin" name="origin" value="<?php echo $gSetting->kota_pengiriman; ?>">

                <div class="form-group">
                    <label for="">Opsi Pengiriman :</label>
                    <div class="single-input-primary">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="option" id="pilihan1"
                                value="kirim ke alamat tujuan">
                            <label class="form-check-label" for="pilihan1">Kirim ke rumah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="option" id="pilihan2"
                                value="ambil sendiri ke kampus">
                            <label class="form-check-label" for="pilihan2">Ambil Sendiri</label>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('option'); ?></small>
                </div>
                <!-- show hide -->
                <div class="card bg-light mb-3" id="kirimpaket" style="display: none;">
                    <div class="form-group form-row">
                        <div class="form-group col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select style="background-color: #F5F5F5"name="provinsi" id="provinsi" class="form-control"></select>
                                <small class="text-danger"><?= form_error('provinsi'); ?></small>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Kota</label>
                                <select style="background-color: #F5F5F5"name="kota" id="kota" class="form-control"></select>
                                <small class="text-danger"><?= form_error('kota'); ?></small>
                            </div>
                        </div>
                        <input type="hidden" id="kabkot_name" name="kabkot_name">
                        <input type="hidden" id="prov_name" name="prov_name">
                    </div>
                    <div class="form-group">
                        <label for="">Kelurahan :</label>
                        <textarea style="background-color: #F5F5F5" class="single-textarea" placeholder="Masukan Kelurahan Anda" name="kelurahan"
                            id="kelurahan" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Masukan Kelurahan Anda'"></textarea>
                        <small class="text-danger"><?= form_error('kelurahan'); ?></small>
                    </div>
                    <div class="form-group form-row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">Expedisi</label>
                            <select style="background-color: #F5F5F5" name="courier" id="courier" class="form-control" onchange="tampil_biaya()">
                                <option value="" disabled="disabled" selected="selected">~Pilih Kurir~</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                            <small class="text-danger"><?= form_error('courier'); ?></small>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">Harga</label>
                            <select style="background-color: #F5F5F5" name="harga" id="harga" class="form-control">
                                <option value="" disabled="disabled" selected="selected">~Pilih Harga~</option>
                            </select>
                            <small class="text-danger"><?= form_error('harga'); ?></small>
                        </div>
                    </div>
                </div>
                <div class="card bg-light mb-3" id="ambilsendiri" style="display: none;">
                    <div class="card-body">
                        <h5 class="card-title">Alamat Kampus</h5>
                        <p class="card-text">Jl. Mataram No.9, Kel. pesurungan lor, Kel. Pesurungan Lor, Pesurungan Lor,
                            Kec. Margadana, Kota Tegal, Jawa Tengah</p>
                    </div>
                </div>
                <!-- end show hide -->
                <h4>File Ijazah dan Transkip Nilai</h4>
                <div class="form-group">
                    <label for="">File Ijazah :</label>
                    <input type="file" name="fileijazah" class="single-input-primary">
                    <small class="text-danger"><?= form_error('fileijazah'); ?></small>
                </div>
                <div class="form-group">
                    <label for="">File Transkip :</label>
                    <input type="file" name="filetranskrip" class="single-input-primary">
                    <small class="text-danger"><?= form_error('filetranskrip'); ?></small>
                </div>
                <div class="form-group form-row">
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="">Jumlah Legalisir Ijazah :</label>
                        <input style="background-color: #F5F5F5" type="text" placeholder="Masukan Jumlah Legalisir Ijazah Anda"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Masukan Jumlah Legalisir Ijazah Anda'"
                            class="single-input-primary" name="jmlijazah" id="jmlijazah"
                            onkeyup="hitung_total_legalisir()">
                        <small class="text-danger"><?= form_error('jmlijazah'); ?></small>
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="">Jumlah Legalisir Transkrip :</label>
                        <input style="background-color: #F5F5F5" type="text" placeholder="Masukan Jumlah Legalisir Transkrip Ijazah Anda"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Masukan Jumlah Legalisir Transkrip Ijazah Anda'"
                            class="single-input-primary" name="jmltranskrip" id="jmltranskrip"
                            onkeyup="hitung_total_legalisir()">
                        <small class="text-danger"><?= form_error('jmltranskrip'); ?></small>
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="">Total Harga Legalisir</label>
                        <input style="background-color: #F5F5F5" type="text" class="single-input-primary" id="total_legalisir" name="total_legalisir"
                            readonly>
                        <small class="text-danger"><?= form_error('total_legalisir'); ?></small>
                    </div>
                </div>
                <input class="form-control" id="harga_per_lembar" name="harga_per_lembar" type="hidden"
                    value="<?php echo $gSetting->harga_perlembar; ?>">
                <div class="form-group">
                    <label for="">Alasan Kebutuhan Legalisir :</label>
                    <textarea style="background-color: #F5F5F5" class="single-textarea" placeholder="Masukan Alasan Anda" name="alasan" id="alasan"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Alasan Anda'"></textarea>
                    <small class="text-danger"><?= form_error('alasan'); ?></small>
                </div>

                <button type="submit" class="genric-btn info-border circle circle">Simpan</button>
                <a href="<?= base_url('user'); ?>" class="genric-btn danger-border circle">Kembali</a>
            </form>
        </div>
    </div>
</section>