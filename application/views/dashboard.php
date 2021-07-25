<div class="container-fluid p-3">
    <?php if ($this->session->userdata('level') == 1) { ?>
        <div class="row p-2">
            <div class="col-sm-6 mx-auto">
                <div class="card m-2">
                    <div class="card-header">
                        <span class="card-title">Data Invoice</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Data</th>
                                    <th style="width: 40px">Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Belum Dibayar</td>
                                    <td>
                                        <a href="<?= base_url('laporan/invoice') ?>">
                                            <span class="badge bg-danger"><?= $this->session_id->hitung_data_invoice('0') ?></span>
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Sedang Diverifikasi</td>
                                    <td>
                                        <a href="<?= base_url('laporan/invoice') ?>">
                                            <span class="badge bg-warning"><?= $this->session_id->hitung_data_invoice('1') ?></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Lunas</td>
                                    <td>
                                        <a href="<?= base_url('laporan/invoice') ?>">
                                            <span class="badge bg-success"><?= $this->session_id->hitung_data_invoice('2') ?></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Semua Invoice</td>
                                    <td>
                                        <a href="<?= base_url('laporan/invoice') ?>">
                                            <span class="badge bg-primary"><?= $this->session_id->hitung_invoice() ?></span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-sm-6 mx-auto">
                <div class="card m-2">
                    <div class="card-header">
                        <span class="card-title">Data Peserta</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Data</th>
                                    <th style="width: 40px">Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Semua User</td>
                                    <td><span class="badge bg-danger"><?= $this->session_id->hitung_user() - 1 ?></span></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Semua Peserta</td>
                                    <td><span class="badge bg-warning"><?= $this->session_id->hitung_peserta() ?></span></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Peserta Lomba </td>
                                    <td><span class="badge bg-success"><?= $this->session_id->hitung_data_invoice('2') ?></span></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Semua Invoice</td>
                                    <td><span class="badge bg-primary"><?= $this->session_id->hitung_invoice() ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    <?php } else { ?>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/img/slider1.jpeg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/slider2.jpeg') ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md">
                <div class="box box-widget mt-3">
                    <div class="col-12 col-sm-6 col-md-4 float-right pr-3">
                        <form action="<?= base_url('dashboard/process') ?>" method="POST">
                            <div class="input-group input-group-sm">
                                <select name="filterdata" class="form-control" required>
                                    <option value="">--Kategori Lomba--</option>
                                    <?php foreach ($lomba->result() as $key => $data) { ?>
                                        <option value="<?= $data->perlombaan_id ?>"><?= $data->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-append">
                                    <button type="submit" name="filter" class="btn btn-info btn-flat">Filter</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 pr-3 mx-auto">
                        <table width="100%">
                            <tr>
                                <td class="mt-3" colspan="3">
                                    <div class="text-center">
                                        <h3>Jadwal lomba</h3>
                                        <h3><?= $perlombaan->nama_kategori ?></h3>
                                        <h3><?= indo_date($perlombaan->tanggal_tanding) ?></h3>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-body table-responsive pl-3 pr-3">
                        <div class="mx-auto">
                            <table class="table table-bordered text-center table-striped" id="table1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>No Peserta</th>
                                        <th>Nama Peserta</th>
                                        <th>Komunitas</th>
                                        <th>Jam</th>
                                        <th>Gelombang</th>
                                        <th>Lajur</th>
                                        <th>Nilai</th>
                                        <?php if ($this->session->userdata('level') == 1) { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $biaya = 0;
                                    foreach ($invoice->result() as $key => $data) { ?>
                                        <tr>
                                            <td style="width: 5%;"><?= $no++ ?>.</td>
                                            <td><?= $data->invoice ?></td>
                                            <!-- <td><?= $data->nama_kategori ?></td> -->
                                            <td><?= $data->nama_lengkap ?></td>
                                            <td><?= $data->komunitas ?></td>
                                            <td><?= indo_jam($data->jam_perlombaan) ?></td>
                                            <td><?= $data->gelombang ?></td>
                                            <td><?= $data->lajur ?></td>
                                            <td><?= $data->nilai ?></td>
                                            <?php if ($this->session->userdata('level') == 1) { ?>
                                                <td><a href="<?= base_url('penilaian/input/' . $data->invoice_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-100 py-2">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-3 col-lg-5 text-center mb-4">
                        <h2>Kategori Lomba</h2>
                    </div>
                </div>
                <form action="<?= base_url('order/process') ?>" method="POST">
                    <div class="row h-100 justify-content-center">
                        <?php foreach ($lomba->result() as $key => $data) : ?>
                            <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                                <div class="card h-80">
                                    <div class="card-body d-flex flex-column justify-content-around mx-auto">
                                        <div class="text-center pt-2"><img class="img-fluid" src="assets/img/uploads/lomba/<?= $data->gambar ?>" alt="" />
                                            <h5 class="my-4"><?= $data->nama_kategori ?></h5>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class="mb-3">
                                                <i class="fas fa-check success nav-icon"></i> Umum
                                            </li>
                                            <li class="mb-3">
                                                <i class="fas fa-check success nav-icon"></i> <?= $data->jarak_sasaran ?> Meter
                                            </li>
                                            <li class="mb-3">
                                                <i class="fas fa-check success nav-icon"></i>
                                                <?= $data->keterangan ?>
                                        </ul>
                                        <div class="text-center my-2">
                                            <h4 class="mb-3"><?= indo_currency($data->biaya) ?><span class="text-900">/Orang</span>
                                            </h4>
                                            <a class="btn btn-outline-danger rounded-pill" name="daftar" href="<?= base_url('order/process/' . $data->perlombaan_id) ?>">
                                                DAFTAR
                                            </a>
                                            <a class="btn btn-default rounded-pill ml-2" id="set_detail" data-toggle="modal" data-target="#modal-detail" data-nama_kategori="<?= $data->nama_kategori ?>" data-jarak="<?= $data->jarak_sasaran ?>" data-nama_sasaran="<?= $data->sasaran ?>" data-point="<?= $data->point ?>" data-keterangan="<?= $data->keterangan ?>" data-durasi="<?= $data->durasi ?>" data-jumlah_line="<?= $data->jumlah_line ?>" data-tanggal_tanding="<?= indo_date($data->tanggal_tanding) ?>" data-jam_tanding="<?= indo_jam($data->jam_tanding) ?>" data-biaya="<?= indo_currency($data->biaya) ?>">
                                                <i class="fa fa-eye"></i> Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        </section>
    <?php } ?>
</div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Detail Pertandingan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered text-center table-striped">
                    <tbody>
                        <tr>
                            <th>Nama Kategori</th>
                            <td><span id="nama_kategori2"></span></td>
                        </tr>
                        <tr>
                            <th>Jarak</th>
                            <td><span id="jarak"></span></td>
                        </tr>
                        <tr>
                            <th>Sasaran</th>
                            <td><span id="nama_sasaran"></td>
                        </tr>
                        <tr>
                            <th>Point</th>
                            <td><span id="point"></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td><span id="durasi"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Line</th>
                            <td><span id="jumlah_line"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Tanding</th>
                            <td><span id="tanggal_tanding"></td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td><span id="jam_tanding"></td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td><span id="biaya"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>