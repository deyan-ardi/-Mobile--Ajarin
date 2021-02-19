<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>App Ajar.In .:: <?= $title ?></title>

    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url() ?>/assets/img/ajarin.ico">

    <!-- ***** All CSS Files ***** -->

    <!-- Style css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/dataTable.css">

</head>
<?php if ($halaman == "beranda" || $halaman == "dashboard" || $halaman == "kelas") : ?>


<body class="accounts">
    <?php else : ?>

    <body class="homepage-5 accounts">
        <?php endif; ?>
        <!--====== Scroll To Top Area Start ======-->
        <div id="scrollUp" title="Scroll To Top">
            <i class="fas fa-arrow-up"></i>
        </div>
        <?php if ($halaman == "dashboard") : ?>
        <!-- ***** Header Start ***** -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="<?= base_url() ?>home/dashboard">
                    <img class="navbar-brand-regular" src="<?= base_url() ?>/assets/img/ajarin.png" width="50px"
                        alt="brand-logo">
                    <img class="navbar-brand-sticky" src="<?= base_url() ?>/assets/img/ajarin.png" width="50px"
                        alt="sticky brand-logo">
                </a>

                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler"
                    aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fas fa-user-circle fa-2x"></i>
                </button>

                <div class="navbar-inner">
                    <!--  Mobile Menu Toggler -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Daftar Kelas
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>home/dashboard"> <i
                                                class="fa fa-eye"></i>
                                            Cari Kelas Baru</a>
                                    </li>
                                    <?php if (!$this->ion_auth->in_group(2)) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>home/tambah_kelas"> <i
                                                class="fa fa-plus-circle"></i>
                                            Buat Kelas Baru</a>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>home/kelas_saya"> <i
                                                class="fa fa-user"></i> Kelas Saya</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hai,
                                    <?= ucwords($group[0]['first_name']) ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>auth/change_password"> <i
                                                class="fa fa-cog"></i>
                                            Ubah Sandi</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>auth/logout"> <i
                                                class="fa fa-sign-out-alt"></i>
                                            Keluar Aplikasi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- ***** Header End ***** -->
        <?php endif; ?>
        <!--====== Scroll To Top Area End ======-->
        <div class="main">
            <div class="berhasil" data-berhasil="<?= $this->session->flashdata('berhasil') ?>"></div>
            <div class="gagal" data-gagal="<?= $this->session->flashdata('gagal') ?>"></div>