<!-- Main content -->
<section class="content bg-light">
    <?php if ($inv->status_pesanan == 0) { ?>
        <div class="row">
            <div class="col-sm m-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <div class="info-box p-4 col-md-6 mx-auto">
                            <table width="100%">
                                <?= form_open_multipart('pesanan/process') ?>
                                <tr>
                                    <!-- <td></td> -->
                                    <td class="pb-3" colspan="2">
                                        <div class="card-header text-center bg-success">
                                            PEMBAYARAN
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="invoice">No Invoice</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="invoice" value="<?= $inv->invoice ?>" class="form-control" name="invoice" readonly>
                                            <input type="hidden" value="<?= $inv->invoice_id ?>" class="form-control" name="invoice_id">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="total">Total Transaksi</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="total" value="<?= indo_currency($inv->total) ?>" class="form-control" name="total" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="waktu">Waktu Transaksi</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="waktu" value="<?= indo_date($inv->created) ?> <?= jam($inv->created) ?>" class="form-control" name="waktu" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="user">Customer</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="grand_total_v" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="gambar">File input</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="gambar" id="gambar" required>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="catatan">Catatan</label>
                                    </td>
                                    <td>
                                        <div class="form-group mx-auto">
                                            <div>
                                                <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <div class="mx-auto text-center">
                                            <button id="pembayaran" type="submit" name="pembayaran" class="btn btn-flat btn-success">
                                                <i class="fas fa-paper-plane"></i> Kirim Gambar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?= form_close() ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-detail">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Detail Pembayaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table class="table table-bordered text-center table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Waktu Pembayaran</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Catatan</th>
                                        <!-- <th>Petugas</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container p-4">
            <H1 class="text-center">Data Sedang divertifikasi</H1>
        </div>
    <?php } ?>
</section>