<?php

function checklog()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if (!empty($level)) {
        redirect('dashboard');
    }
}

function checklogin()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if (empty($level)) {
        redirect('auth/login');
    }
}

function flashData()
{
?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <script script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <body></body>
<?php
}

function head_web()
{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Aplikasi</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    </head>
<?php
}

function err_pass($lok){
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            showConfirmButton: false,
            timer: 1500,
            title: 'Password tidak sama'
        }).then((result) => {
            window.location = '<?= site_url($lok) ?>';
        })
    </script>
<?php
}

function err_nik($lok){
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            showConfirmButton: false,
            timer: 1500,
            title: 'Nik Sudah terdaftar'
        }).then((result) => {
            window.location = '<?= site_url($lok) ?>';
        })
    </script>
<?php
}

function err_phone($lok){
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            showConfirmButton: false,
            timer: 1500,
            title: 'No Telpon Sudah terdaftar'
        }).then((result) => {
            window.location = '<?= site_url($lok) ?>';
        })
    </script>
<?php
}