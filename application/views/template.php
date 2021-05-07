<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My POS</title>
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

  <script>
    $(document).ready(function() {
      $('#table1').DataTable({
      });

      $(document).on('click', '#pil', function(e) {
        e.preventDefault();
        $(this).parent('tr').remove();
      });

      $(document).on('click', '#select', function() {
        const item_id = $(this).data('id');
        const kode_product = $(this).data('kode_product');
        const nama_item = $(this).data('nama_item');
        const nama_unit = $(this).data('nama_unit');
        const stock = $(this).data('stock');
        const harga_jual = $(this).data('harga_jual');
        const qty = $(this).data('qty');

        const qtysale = $('#qtysale').val();
        const discount = $('#discount').val();

        const keranjang_id = $(this).data('keranjang_id');
        // alert(keranjang_id);

        $('#harga_jual').val(harga_jual);
        $('#item_id').val(item_id);
        $('#kode_product').val(kode_product);
        $('#nama_item').val(nama_item);
        $('#nama_unit').val(nama_unit);
        $('#stock').val(stock);

        const grand_total = parseInt(harga_jual) * parseInt(qtysale);
        const diskon = (discount / 100) * grand_total;
        const total_akhir = parseInt(grand_total) - parseInt(diskon);

        $('#sub_total').val(grand_total);
        $('#potongan_diskon').val(diskon);
        $('#total_akhir').val(total_akhir);
      });


      $('#qtysale').keyup(function() {
        const harga_jual = $('#harga_jual').val();
        const discount = $('#discount').val();
        const qty = $('#qtysale').val();
        const stock = $('#stock').val();

        if (parseInt(qty) >= parseInt(stock)) {
          Swal.fire({
            icon: 'error',
            showConfirmButton: false,
            timer: 1500,
            title: 'Melebihi Stok yang ada'
          })
        }


        const sub_total = parseInt(harga_jual) * parseInt(qty);
        const diskon = (discount / 100) * sub_total;
        const total_akhir = parseInt(sub_total) - parseInt(diskon);

        $('#sub_total').val(sub_total);
        $('#potongan_diskon').val(diskon);
        $('#total_akhir').val(total_akhir);
      });


      $('#discount').keyup(function() {
        const harga_jual = $('#harga_jual').val();
        const qty = $('#qty').val();
        const sub_total = $('#sub_total').val();
        const discount = $(this).val();

        const diskon = (discount / 100) * sub_total;
        const total_akhir = parseInt(sub_total) - parseInt(diskon);

        $('#sub_total').val(sub_total);
        $('#potongan_diskon').val(diskon);
        $('#total_akhir').val(total_akhir);
      });

      $('#cash').keyup(function() {
        const grand_total = $('#grand_total').val();
        const cash = $('#cash').val();
        const total = parseInt(cash) - parseInt(grand_total);
        $('#kembalian').val(total);
        $('#kembalian_v').val(total);
      });

      // $('#tanggal').daterangepicker({
      //   startDate: start,
      //   endDate: end,
      //   ranges: {
      //     'Hari ini': [moment(), moment()],
      //     'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      //     '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
      //     '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
      //     'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
      //     'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
      //     'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
      //     'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
      //   }
      // }, cb);

      // cb(start, end);

      $(document).on('click', '#set_detail', function() {
        const kodeproduct = $(this).data('kodeproduct');
        const nama_item = $(this).data('nama_item');
        const nama_supplier = $(this).data('nama_supplier');
        const qty = $(this).data('qty');
        const detail = $(this).data('detail');
        const harga_beli = $(this).data('harga_beli');
        const harga_jual = $(this).data('harga_jual');
        const date = $(this).data('date');
        // alert(kodeproduct);

        $('#kodeproduct').text(kodeproduct);
        $('#nama_item').text(nama_item);
        $('#nama_supplier').text(nama_supplier);
        $('#qty').text(qty);
        $('#detail').text(detail);
        $('#harga_beli').text(harga_beli);
        $('#harga_jual').text(harga_jual);
        $('#date').text(date);
      });

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
    });
  </script>
</body>

</html>