<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md-8 mx-auto">
            <div class="box box-widget">
                <div class="box-body mx-auto info-box p-4">
                    <div class="col-md mt-2 mb-1">
                        <form action="<?= base_url('sale/process') ?>" method="POST">
                            <table width="100%">
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="kode_product">Kode Produk</label>
                                    </td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="keranjang_id" id="keranjang_id">
                                            <input type="hidden" name="item_id" id="item_id">
                                            <input type="hidden" name="harga_jual" id="harga_jual">
                                            <input type="hidden" name="stock" id="stock">
                                            <input type="hidden" name="invoice" id="invoice" value="">
                                            <input type="text" name="kode_product" id="kode_product" class="form-control" required autofocus>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="qty">QTY</label>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="form-group">
                                                <input type="number" name="qty" id="qtysale" value="1" min="1" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 30%;">
                                        <label for="discount">Discount</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="discount" id="discount" value="0" min="0" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="sub_total">Sub Total</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" id="sub_total" name="sub_total" value="0" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="potongan_diskon">Potongan Diskon</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" id="potongan_diskon" name="potongan_diskon" value="0" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="total_akhir">Total Akhir</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" id="total_akhir" name="total_akhir" value="0" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="">
                                            <button type="submit" id="addcart" name="add_cart" class="btn btn-block btn-primary">
                                                <i class="fas fa-cart-plus"></i>
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
        <div class="col-md-4 mx-auto">
            <div class="box box-widget">
                <div class="col-md mx-auto">
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="col-md">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success elevation-1">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Invoice</span>
                                            <span class="info-box-number"></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-md">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1">
                                            <i class="fas fa-dollar-sign"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Belanja</span>
                                            <span class="info-box-number">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-md">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger elevation-1">
                                            <i class="fas fa-user-tie"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Petugas</span>
                                            <span class="info-box-number">sad</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-sm table-bordered border text-center table-striped" id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Kode Product</th>
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Sub Total</th>
                                <th>Discount Item</th>
                                <th>Potongan Discount</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="info-box p-4 col-md-6 mx-auto">
                        <table width="100%">
                            <form action="<?= base_url('sale/process') ?>" method="POST">
                                <tr>
                                    <td style="vertical-align: top; width: 30%;">
                                        <label for="date">Date</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="sales">Sales</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="sales" class="form-control" required id="sales">
                                                <option value="">--Pilih Sales--</option>
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="user">Customer</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="customer" class="form-control" id="customer">
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 30%;">
                                        <label for="grand_total_v">Grand Total</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <!-- <input name="stock" id="stock"> -->
                                            <input type="hidden" id="grand_total" name="grand_total" value="" class="form-control">
                                            <input id="grand_total_v" value="" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="pembayaran">Pembayaran</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select id="pil" name="pembayaran" class="form-control" id="pembayaran">
                                                <option value="kredit">Kredit</option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 30%;">
                                        <label for="date">Jatuh Tempo</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="date" name="date_jatuh_tempo" id="date_jatuh_tempo" value="<?= date('Y-m-d', strtotime('+14 days', strtotime(date('Y-m-d')))) ?>" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 30%;">
                                        <label for="cash">Cash</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="cash" id="cash" min="0" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="kembalian">Kembalian</label>
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
                                    <td>
                                    </td>
                                    <td>
                                        <div class="mx-auto col-md-8">
                                            <input type="hidden" name="invoice2" value="">
                                            <button id="process-payment" type="submit" name="process-payment" class="btn btn-block btn-success">
                                                <i class="fas fa-cart-arrow-down"></i> Process Payment
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
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Select Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered text-center table-striped" id="table1">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Kode Product</th>
                            <th>Nama Item</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>