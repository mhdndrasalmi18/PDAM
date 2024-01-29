<?= $this->extend('layout/main') ?>

<?= $this->section('menu') ?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
            <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>/assets/images/logo.png" height="24" alt="logo"></a> -->
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title"><h5>Hallo <?= $u = (session()->get('username'));  ?></h5></li>
                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span> Beranda <span class="badge badge-pill badge-primary float-right">7</span></span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Master
                        </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('Tarif') ?>">Tarif</a></li>
                        <li><a href="<?= site_url('Pelanggan') ?>">Pelanggan</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Transaksi
                        </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('Transaksi') ?>">Transaksi</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Laporan
                        </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('Transaksi/laporanperperiode') ?>">Laporan Per Periode</a></li>
                    </ul>
                </li>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
    <?= $this->section('foto')?>
    <li class="list-inline-item dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <img src="<?=base_url()?>/assets/images/users/<?= $u ?>.jpg" alt="user" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-item noti-title">
                <h5>Welcome</h5>
            </div>
            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
            <a class="dropdown-item" href="User/ubahpassword"><i class="mdi mdi-account-circle 4m-r-5 text-muted"></i>
                Ubah Password</a>
            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My
                Wallet</a>
            <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i
                    class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/Login/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i>
                Logout</a>
        </div>
    </li>
    <?= $this->endSection("")?>
    <?php if (session()->get('level')==2) { ?>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="ion-close"></i>
        </button>

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
                <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>/assets/images/logo.png" height="24" alt="logo"></a> -->
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">

            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">Hallo <?= $u = (session()->get('username'));  ?></li>
                    <li>
                        <a href="index.html" class="waves-effect">
                            <i class="mdi mdi-airplay"></i>
                            <span> Beranda <span class="badge badge-pill badge-primary float-right">7</span></span>
                        </a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Master
                            </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?= site_url('agenda') ?>">Kegiatan</a></li>
                        </ul>
                    </li>


                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
        <?= $this->section('foto')?>
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <img src="<?=base_url()?>/assets/images/users/<?= $u ?>.jpg" alt="user" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5>Welcome</h5>
                </div>
                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                <a class="dropdown-item" href="User/ubahpassword"><i
                        class="mdi mdi-account-circle 4m-r-5 text-muted"></i> Ubah Password</a>
                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My
                    Wallet</a>
                <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i
                        class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock
                    screen</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Login/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i>
                    Logout</a>
            </div>
        </li>
        <?= $this->endSection("")?>
        <?php } ?>
        <?php if (session()->get('level')==3) { ?>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
                    <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>/assets/images/logo.png" height="24" alt="logo"></a> -->
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Hallo <?= $u = (session()->get('username'));  ?></li>
                        <li>
                            <a href="index.html" class="waves-effect">
                                <i class="mdi mdi-airplay"></i>
                                <span> Beranda <span class="badge badge-pill badge-primary float-right">7</span></span>
                            </a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                                    Master </span> <span class="float-right"><i
                                        class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= site_url('agenda') ?>">Upload Bukti</a></li>
                            </ul>
                        </li>


                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
            <?= $this->section('foto')?>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?=base_url()?>/assets/images/users/<?= $u ?>.jpg" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                        Profile</a>
                    <a class="dropdown-item" href="User/ubahpassword"><i
                            class="mdi mdi-account-circle 4m-r-5 text-muted"></i> Ubah Password</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My
                        Wallet</a>
                    <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i
                            class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock
                        screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Login/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i>
                        Logout</a>
                </div>
            </li>
            <?= $this->endSection("")?>
            <?php } ?>
            <?php if (session()->get('level')==4) { ?>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
                        <!-- <a href="index.html" class="logo"><img src="<?=base_url()?>/assets/images/logo.png" height="24" -->
                        alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Hallo <?= $u = (session()->get('username'));  ?></li>
                            <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Beranda <span
                                            class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                                        Laporan </span> <span class="float-right"><i
                                            class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= site_url('agenda') ?>">Laporan Donatur</a></li>
                                    <li><a href="<?= site_url('agenda') ?>">Laporan Kas</a></li>
                                </ul>
                            </li>


                            </li>

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
                <?= $this->section('foto')?>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?=base_url()?>/assets/images/users/<?= $u ?>.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>Welcome</h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                            Profile</a>
                        <a class="dropdown-item" href="User/ubahpassword"><i
                                class="mdi mdi-account-circle 4m-r-5 text-muted"></i> Ubah Password</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My
                            Wallet</a>
                        <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i
                                class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i>
                            Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Login/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i>
                            Logout</a>
                    </div>
                </li>
                <?= $this->endSection("")?>
                <?php } ?>
                <?= $this->endSection('') ?>