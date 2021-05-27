<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="box-body table-responsive p-3">
                    <div class="mx-auto">
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
                                foreach ($keranjang->result() as $key => $data) { ?>
                                    <tr>
                                        <td style="width: 5%;"><?= $no++ ?>.</td>
                                        <td><?= $data->nama_kategori ?></td>
                                        <td><?= indo_date($data->tanggal_tanding) ?></td>
                                        <td><?= indo_currency($data->biaya) ?></td>
                                        <td>
                                            <a class="btn btn-default btn-xs mb-1" id="set_detail" data-toggle="modal" data-target="#modal-detail" data-nama_kategori="<?= $data->nama_kategori ?>" data-jarak="<?= $data->jarak_sasaran ?>" data-nama_sasaran="<?= $data->sasaran ?>" data-point="<?= $data->point ?>" data-keterangan="<?= $data->keterangan ?>" data-durasi="<?= $data->durasi ?>" data-jumlah_line="<?= $data->jumlah_line ?>" data-tanggal_tanding="<?= indo_date($data->tanggal_tanding) ?>" data-jam_tanding="<?= indo_jam($data->jam_tanding) ?>" data-biaya="<?= indo_currency($data->biaya) ?>">
                                                <i class="fa fa-eye"></i> Detail
                                            </a>
                                            <a href="<?= base_url('keranjang/del/' . $data->keranjang_id . '/' . $data->lomba_id) ?>" class="btn btn-danger btn-xs mb-1" id="tmblhps"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    $biaya += $data->biaya;
                                }
                                ?>

                                <tr style="font-weight: bold;">
                                    <td class="text-left" colspan="3">Jumlah</td>
                                    <td><?= indo_currency($biaya); ?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="box-body mx-auto info-box p-4">
                <div class="col-md mt-2">
                    <form action="<?= base_url('keranjang/process') ?>" method="POST">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: top; width: 35%;">
                                    <label for="totalpesanan">Total Pesanaan</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="totalpesanan" value="<?= indo_currency($biaya); ?>" class="form-control" readonly>
                                        <input type="hidden" id="totalpesanan" name="totalpesanan" value="<?= $biaya; ?>">
                                        <input type="hidden" name="invoice" value="<?= $invoice ?>">
                                        <input type="hidden" name="perlombaan_id2" id="perlombaan_id2">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <div class="mx-auto col-md-8">
                                        <input type="hidden" name="invoice2" value="">
                                        <button id="process-payment" type="submit" name="process-payment" class="btn btn-block btn-success">
                                            <i class="fas fa-cart-arrow-down"></i> Beli
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Pilih Perlombaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-responsive text-center table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Jarak</th>
                            <th>Sasaran</th>
                            <th>Point</th>
                            <th>Keterangan</th>
                            <th>Durasi</th>
                            <th>Jumlah Line</th>
                            <th>Tanggal Tanding</th>
                            <th>Jam</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width: 5%;"><?= $no++ ?>.</td>
                                <td><?= $data->nama_kategori ?></td>
                                <td><?= $data->jarak_sasaran ?> M</td>
                                <td><?= $data->nama_sasaran ?></td>
                                <td><?= $data->point ?></td>
                                <td><?= $data->keterangan ?></td>
                                <td><?= $data->durasi ?> Menit</td>
                                <td><?= $data->jumlah_line ?></td>
                                <td><?= indo_date($data->tanggal_tanding) ?></td>
                                <td><?= indo_jam($data->jam_tanding) ?></td>
                                <td><?= indo_currency($data->biaya) ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-dismiss="modal" aria-label="Close" onclick="tambahdata()" id="select" data-id="<?= $data->lomba_id ?>" data-nama_kategori="<?= $data->nama_kategori ?>" data-biaya="<?= $data->biaya ?>">
                                        <i class="fa fa-check"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                            <td><span id="biaya2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>