<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Edit Profil</h2>
                <div class="page_link">
                    <a href="<?= base_url('/user'); ?>">Home</a>
                    <a href="#">Profil</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->\
<!--================Pagkages Area =================-->
<section class="blog_area single-post-area">
    <div class="container">
        <div class="col-lg-12 posts-list">
            <div class="comment-form">
                <h4 class="text-danger">Silahkan lengkapi data pribadi anda terlebih dahulu !!</h4>
                <form method="post" action="<?= base_url('user/profil/simpan_profil'); ?>" enctype="multipart/form-data">
                    <div class="form-row">
                        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">Nama :</label>
                            <input type="text" name="name" placeholder="Masukan Nama Anda"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nama Anda'"
                                class="single-input-primary" value="<?= $user['name']; ?>">
                            <small class="text-danger"><?= form_error('name'); ?></small>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">Email :</label>
                            <input type="text" name="email" placeholder="Masukan Email Anda"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Email Anda'"
                                class="single-input-primary" value="<?= $user['email']; ?>" readonly>
                            <small class="text-danger"><?= form_error('email'); ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label for="">NIM :</label>
                            <input type="text" name="nim" placeholder="Masukan NIM Anda" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Masukan NIM Anda'" class="single-input-primary"
                                value="<?= $user['nim']; ?>">
                            <small class="text-danger"><?= form_error('nim'); ?></small>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label for="">Prodi :</label>
                                <select name="prodi" class="form-control">
                                    <option value="">~Pilih Prodi~</option>
                                    <?php foreach ($prodi as $data) : ?>
                                    <option value="<?= $data['id_prodi']; ?>"
                                        <?= $user['id_prodi'] == $data['id_prodi'] ? ' selected="selected"' : '';?>>
                                        <?= $data['nama_prodi']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <small class="text-danger"><?= form_error('prodi'); ?></small>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label for="">Angkatan :</label>
                            <input type="text" name="angkatan" placeholder="Masukan Angkatan Anda"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Angkatan Anda'"
                                class="single-input-primary" value="<?= $user['angkatan']; ?>">
                            <small class="text-danger"><?= form_error('angkatan'); ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">Jenis Kelamin :</label>
                            <div class="single-input-primary">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio1"
                                        value="Laki-Laki" <?= ($user['jenis_kelamin']=='Laki-Laki')?'checked':'' ?>>
                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio2"
                                        value="Perempuan" <?= ($user['jenis_kelamin']=='Perempuan')?'checked':'' ?>>
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                            <small class="text-danger"><?= form_error('jenkel'); ?></small>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">No Hp :</label>
                            <input type="text" name="no_hp" placeholder="Masukan No Hp"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan No Hp'" 
                                class="single-input-primary" value="<?= $user['no_hp']; ?>">
                            <small class="text-danger"><?= form_error('no_hp'); ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat :</label>
                        <textarea class="single-textarea" placeholder="Masukan Alamat Anda" name="alamat"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Alamat Anda'"
                        ><?= $user['alamat']; ?></textarea>
                        <small class="text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <button type="submit" class="genric-btn info circle">Simpan</button>
                    <a href="<?= base_url('user/profil'); ?>" class="genric-btn info-border circle">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Pagkages Area =================-->