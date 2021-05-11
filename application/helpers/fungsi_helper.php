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

function checkAdmin()
{
    $CI = &get_instance();
    $CI->load->library('session_id');
    if ($CI->session_id->user_login()->level != 1) {
        redirect('dashboard');
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

function down_web()
{
?>
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    </body>

    </html>
<?php
}

function err_pass($lok)
{
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

function err_nik($lok)
{
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

function err_phone($lok)
{
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

function tampil_error($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            showConfirmButton: false,
            timer: 1500,
            title: 'Data tidak ditemukan'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_hapus($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Success',
            showConfirmButton: false,
            timer: 1500,
            title: 'Data Berhasil Dihapus'
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_edit($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Success',
            showConfirmButton: false,
            title: 'Data Berhasil Diedit',
            timer: 1500
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function tampil_simpan($lokasi)
{
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Success',
            title: 'Data Berhasil Disimpan',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            window.location = '<?= site_url($lokasi) ?>';
        })
    </script>
<?php
}

function indo_currency($nominal)
{
    return $result = "Rp " . number_format($nominal, 2, ',', '.');
}

function indo_jam($waktu)
{
    $w = substr($waktu, 0, 5);
    return $w;
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '/' . $m . '/' . $y;
}
