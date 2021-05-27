<!-- Main content -->
<section class="content bg-light">
    <div class="row">
        <div class="col-sm m-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="info-box p-4 col-md-6 mx-auto">
                        <table width="100%">
                            <form action="<?= base_url('report/penjualan/process') ?>" method="POST">
                                <tr>
                                    <!-- <td></td> -->
                                    <td class="pb-3" colspan="2">
                                        <div class="card-header text-center bg-success">
                                            INVOICE
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="invoice">No Invoice</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="grand_total_v" value="" class="form-control" name="invoice" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="user">Customer</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="grand_total_v" value="" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 30%;">
                                        <label for="cash">Cash</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="cash" id="cash" min="0" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="kembalian">Sisa Akhir</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" id="kembalian_v" readonly class="form-control">
                                            <input type="hidden" name="kembalian" id="kembalian" readonly class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="note">Note</label>
                                    </td>
                                    <td>
                                        <div class="form-group mx-auto">
                                            <div>
                                                <textarea name="catatan" id="note" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <div class="mx-auto text-center">
                                            <a href="" id="set_detail" data-toggle="modal" data-target="#modal-detail" class="btn mr-2 btn-default btn-flat">
                                                <i class="fa fa-eye"></i> History
                                            </a>
                                            <button id="pembayaran-kredit" type="submit" name="pembayaran-kredit" class="btn btn-flat btn-success">
                                                <i class="fas fa-cart-arrow-down"></i> Bayar
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
</section>