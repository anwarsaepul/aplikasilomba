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
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?= base_url('keranjang') ?>">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <span class="badge badge-warning navbar-badge">
              <?= $this->session_id->hitung_keranjang() ?>
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>assets/dist/img/default.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= ucfirst($this->session_id->user_login()->nama_lengkap) ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-1">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <?php if ($this->session->userdata('level') == 1) { ?>
              <li class="nav-item">
                <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'perlombaan' ||
                $this->uri->segment(1) == 'info' ? 'active' : '' ?>">
                  <i class="nav-icon fa fa-archive"></i>
                  <p>
                    Lomba
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('perlombaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'perlombaan' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Perlombaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('info') ?>" class="nav-link <?= $this->uri->segment(1) == 'info' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Info Lomba</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="#" class="nav-link 
              <?= $this->uri->segment(1) == 'trx' ||
                $this->uri->segment(1) == 'keranjang' ||
                $this->uri->segment(1) == 'pesanan' ||
                $this->uri->segment(1) == 'invoice' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transaksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('keranjang') ?>" class="nav-link <?= $this->uri->segment(1) == 'keranjang' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Keranjang</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('pesanan') ?>" class="nav-link <?= $this->uri->segment(1) == 'pesanan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pesanan</p>
                  </a>
                </li>
              </ul>
              <?php if ($this->session->userdata('level') == 1) { ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('invoice') ?>" class="nav-link <?= $this->uri->segment(1) == 'invoice' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Invoice</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('laporan') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-print"></i>
                <p>Laporan</p>
              </a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i></i>
              <p>Logout</p>
            </a>
          </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $contents ?>
    </div>

    <!-- /.content-wrapper -->
    <!-- <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Saepul Anwar</a>.</strong> All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-rc
      </div>
    </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?= base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#table1').DataTable({});

      $(document).on('click', '#tmblhps', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "data akan dihapus",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus data'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = link;
          }
        })
      });

      $(document).on('click', '#select', function() {
        const perlombaan_id = $(this).data('perlombaan_id');
        // const info_id       = $(this).data('info_id');
        const info_id = $(this).data('id');
        const nama_kategori = $(this).data('nama_kategori');
        const biaya = $(this).data('biaya');

        $('#perlombaan_id').val(perlombaan_id);
        $('#perlombaan_id2').val(perlombaan_id);

        $('#info_id').val(info_id);
        $('#nama_kategori').val(nama_kategori);
        $('#biaya').val(biaya);
      });

      $(document).on('click', '#set_detail', function() {
        const nama_kategori = $(this).data('nama_kategori');
        const jarak = $(this).data('jarak');
        const nama_sasaran = $(this).data('nama_sasaran');
        const point = $(this).data('point');
        const keterangan = $(this).data('keterangan');
        const durasi = $(this).data('durasi');
        const jumlah_line = $(this).data('jumlah_line');
        const tanggal_tanding = $(this).data('tanggal_tanding');
        const jam_tanding = $(this).data('jam_tanding');
        const biaya = $(this).data('biaya');

        $('#nama_kategori2').text(nama_kategori);
        $('#jarak').text(jarak);
        $('#nama_sasaran').text(nama_sasaran);
        $('#point').text(point);
        $('#keterangan').text(keterangan);
        $('#durasi').text(durasi);
        $('#jumlah_line').text(jumlah_line);
        $('#tanggal_tanding').text(tanggal_tanding);
        $('#jam_tanding').text(jam_tanding);
        $('#biaya').text(biaya);
        $('#biaya2').text(biaya);
      });

      // function tambahdata(){
      // }

    });
  </script>
</body>

</html>