<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">
                <ul class="list header_social">
                    <li><a href="https://www.facebook.com/poltekharber.fanspage" target="_blank"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/poltek_harber" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="https://www.youtube.com/poltekharber" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li><a href="https://www.instagram.com/poltek_harber" target="_blank"><i
                                class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="float-right">
                <a class="dn_btn" href="tel:(0283)352000">(0283) 352000</a>
                <a class="dn_btn" href="mailto:sekretariat@poltektegal.ac.id">sekretariat@poltektegal.ac.id</a>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img
                        src="<?= base_url('assets/users/') ?>img/logo_phb.png" alt=""></a>
                <h3>SIMALEJA</h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="<?= base_url('user'); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('user/legalisir'); ?>">Legalisir</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('user/status'); ?>">Status</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('user/profil'); ?>">Profil</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                        <!-- <li class="nav-item submenu dropdown">
                            <a href="<?= base_url('user/profil'); ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->