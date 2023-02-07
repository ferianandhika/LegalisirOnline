  <!--================Home Banner Area =================-->
  <section class="home_banner_area">
      <div class="banner_inner d-flex align-items-center">
          <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
          </div>
          <div class="container">
              <div class="banner_content text-center">
                  <h3>Welcome To SIMALEJA</h3>
                  <h3>Politeknik Harapan Bersama</h3>
                  <h5>Legalisir Ijazah dan Transkip Nilai Secara Online</h5>
                  <a class="main_btn" href="#">Mulai</a>
              </div>
          </div>
      </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Finance Area =================-->
  <section class="finance_area">
      <div class="container">
          <div class="finance_inner row">
              <div class="col-lg-3 col-sm-6">
                  <div class="finance_item">
                      <div class="media">
                          <div class="d-flex">
                              <i class="lnr lnr-rocket"></i>
                          </div>
                          <div class="media-body">
                              <h5>Politeknik Unggul</h5>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="finance_item">
                      <div class="media">
                          <div class="d-flex">
                              <i class="lnr lnr-users"></i>
                          </div>
                          <div class="media-body">
                              <h5>Berjiwa Kewirausahaan</h5>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="finance_item">
                      <div class="media">
                          <div class="d-flex">
                              <i class="lnr lnr-smile"></i>
                          </div>
                          <div class="media-body">
                              <h5>Kearifan Lokal</h5>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="finance_item">
                      <div class="media">
                          <div class="d-flex">
                              <i class="lnr lnr-earth"></i>
                          </div>
                          <div class="media-body">
                              <h5>Berdaya Saing Global</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--================End Finance Area =================-->

  <!--================Courses Area =================-->
  <section class="mt-25">
      <div class="container">
          <div class="main_title">
              <h2>PROGRAM STUDI</h2>
              <p>Beberapa program studi yang ada di Politeknik Harapan Bersama Tegal</p>
          </div>
          <div class="row courses_inner">
              <?php foreach ($prodi as $data) : ?>
              <div class="col-lg-4">
                  <div class="grid_inner">
                      <div class="card mb-3 mr-2" style="max-width: 540px; background-color: <?= $data['warna']; ?>;">
                          <div class="row no-gutters">
                              <div class="col-md-4">
                                  <img src="<?= base_url() ?>upload/prodi/<?= $data['gambar']; ?>"
                                      class="card-img img-thumbnail" alt="...">
                              </div>
                              <div class="col-md-8">
                                  <div class="card-body">
                                      <h5 class="card-title text-white"><?= $data['nama_prodi']; ?></h5>
                                      <!-- <p class="card-text">This is a wider card with supporting text below as a natural
                                          lead-in to additional content. This content is a little bit longer.</p>
                                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
      </div>
  </section>
  <section class="py-5">
      <div class="container">
          <div class="main_title">
              <h2>INFORMASI</h2>
              <p>Tentang Politeknik Harapan Bersama Tegal</p>
          </div>
          <div class="courses_inner">
              <div class="card">
                  <div class="card-body">
                      <p class="card-text text-justify"><?= $informasi->teks; ?></p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--================End Courses Area =================-->


  <!--================Impress Area =================-->
  <section class="impress_area p_120">
      <div class="container">
          <div class="impress_inner text-center">
              <!-- <h2>Become an instructor</h2>
					<p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck</p>
					<a class="main_btn2" href="#">Apply for the post</a> -->
          </div>
      </div>
  </section>
  <!--================End Impress Area =================-->