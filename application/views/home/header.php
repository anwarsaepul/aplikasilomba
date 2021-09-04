<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>ESCsukabumi | Competition</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

</head>


<body class="hold-transition sidebar-mini layout-fixed">

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="<?= base_url('') ?>"><img src="assets/img/icons/logoesc.png" alt="" width="30" /><span class="text-1000 fs-1 ms-2 fw-bold">ESC<span class="fw-medium">sukabumi</span></span></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto border-bottom border-lg-bottom-0 pt-5 pt-lg-2">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == '' ? 'active' : '' ?>" aria-current="page" href="<?= base_url('') ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'petunjuk_teknis' ? 'active' : '' ?>" href="<?= base_url('petunjuk_teknis') ?>">Petunjuk Teknis</a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('faq') ?>">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link <?= $this->uri->segment(1) == 'kontak' ? 'active' : '' ?>" href="<?= base_url('kontak') ?>">Kontak </a></li>
                    </ul>
                    <?php if ($this->session->userdata('user_id') == null) { ?>
                        <form class="d-flex py-3 py-lg-0">
                            <a class="btn btn-outline-primary rounded-pill order-0 mr-2" type="button" href="<?= base_url('auth/login') ?>">Masuk</a>
                            <a class="btn btn-outline-danger rounded-pill order-0" type="submit" class="nav-link" href="<?= base_url('auth/registrasi') ?>">Daftar</a>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </nav>