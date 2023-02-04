<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Profil</h2>
                <div class="page_link">
                    <a href="<?= base_url('/user'); ?>">Home</a>
                    <a href="#">Profil</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<!--================Pagkages Area =================-->
<section class="packages_area p_120">
    <div class="container">
        <div class="row packages_inner">
            <div class="col-lg-6">
                <div class="packages_text">
                    <h3>Profil Anda</h3>
                    <?php if($user['jenis_kelamin'] == ""): ?>
                    <h4><strong class="text-danger">Lengkapi Profil Anda Terlebih Dahulu !!</strong></h4>
                    <?php else : ?>
                    <h4><strong class="text-info">Halaman Update Profil</strong></h4>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-fluid"
                            width="50%">
                        <h3><?= $user['name'];  ?></h3>
                        <h4><?= $user['nim'];  ?></h4>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li>
                                <p><strong>Email : </strong><?= $user['email'];  ?></p>
                            </li>
                            <li>
                                <p><strong>Prodi : </strong><?= $user['nama_prodi'];  ?></p>
                            </li>
                            <li>
                                <p><strong>Tahun : </strong><?= $user['angkatan'];  ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="pack_footer">
                        <a class="main_btn" href="<?= base_url('user/profil/profil_edit'); ?>">Update Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Pagkages Area =================-->