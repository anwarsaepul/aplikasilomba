<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row pl-3 pr-3">
        <div class="col-12 col-sm-6 mx-auto col-md-6 mt-2">
            <div class="card-header text-center bg-success">
                INVOICE
            </div>
            <div class="info-box mb-3 pl-3">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top; width: 40%;">
                            <span>No Invoice</span>
                        </td>
                        <td>
                            <div>
                                <span>: <?= $inv->invoice ?> </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Total Transaksi</span>
                        </td>
                        <td>
                            <div>
                                <span>: <?= indo_currency($inv->total) ?> </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Waktu Transaksi</span>
                        </td>
                        <td>
                            <div>
                                <span>: <?= indo_date($inv->created) ?> <?= jam($inv->created) ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Status</span>
                        </td>
                        <td>
                            <span>: <?php
                                    if ($inv->status_pesanan == 0) { ?> Belum di bayar <?php } elseif ($inv->status_pesanan == 1) { ?> Sedang di vertifikasi <?php } else { ?> Lunas <?php } ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="box box-widget p-2">
                <div class="box-body">
                    <div class="mx-auto">
                        <div class="box-body text-center table-responsive">
                            <table class="table table-bordered text-center table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Tanding</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $biaya = 0;
                                    foreach ($invoice->result() as $key => $data) { ?>
                                        <tr>
                                            <td style="width: 5%;"><?= $no++ ?>.</td>
                                            <td><?= $data->nama_kategori ?></td>
                                            <td><?= indo_date($data->tanggal_tanding) ?></td>
                                            <td><?= indo_currency($data->biaya) ?></td>
                                            <td>
                                                <a class="btn btn-default btn-xs mb-1" id="set_detail" data-toggle="modal" data-target="#modal-detail" data-nama_kategori="<?= $data->nama_kategori ?>" data-jarak="<?= $data->jarak_sasaran ?>" data-nama_sasaran="<?= $data->sasaran ?>" data-point="<?= $data->point ?>" data-keterangan="<?= $data->keterangan ?>" data-durasi="<?= $data->durasi ?>" data-jumlah_line="<?= $data->jumlah_line ?>" data-tanggal_tanding="<?= indo_date($data->tanggal_tanding) ?>" data-jam_tanding="<?= indo_jam($data->jam_tanding) ?>" data-biaya="<?= indo_currency($data->biaya) ?>">
                                                    <i class="fa fa-eye"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $biaya += $data->biaya;
                                    }
                                    ?>
                                    <?php if ($inv->status_pesanan == 0) { ?>

                                        <tr style="font-weight: bold;">
                                            <td class="text-left" colspan="3">Jumlah</td>
                                            <td><?= indo_currency($biaya); ?></td>
                                            <td>
                                                <a href="<?= base_url('pesanan/bayar/' . $inv->invoice_id) ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-money-check-alt"></i> Bayar
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($inv->status_pesanan == 1) { ?>
        <div class="col-12 col-sm-10 mx-auto col-md-10 mt-2">
            <div class="card-header text-center bg-success">
                PEMBAYARAN
            </div>
            <div class="info-box mb-3 pl-3">
                <ul class="list-group text-center list-group-flush">
                    <li class="list-group-item">Waktu Upload</li>
                    <li class="list-group-item"><?= indo_date($gambar->created) ?> <?= jam($gambar->created) ?></li>
                    <li class="list-group-item">Bukti Pembayaran</li>
                    <li class="list-group-item">
                        <img src="<?= base_url('assets/img/uploads/pembayaran/' . $gambar->photo) ?>" class="rounded mx-auto img-thumbnail" alt="...">
                </ul>
            </div>
        </div>
    <?php } ?>
</section>

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