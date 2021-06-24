<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="box-body table-responsive p-3">
                    <div class="mx-auto">
                        <table class="table table-bordered text-center table-striped" id="table1">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>No Peserta</th>
                                    <th>Total</th>
                                    <th>Tanggal Order</th>
                                    <th>Status</th>
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
                                        <td><?= $data->invoice ?></td>
                                        <td><?= indo_currency($data->total) ?></td>
                                        <td><?= indo_date($data->created) ?></td>
                                        <td>
                                            <strong>
                                                <?php
                                                if ($data->status_pesanan == 0) { ?> Belum di bayar <?php } elseif ($data->status_pesanan == 1) { ?> Sedang diverifikasi <?php } else { ?> Lunas <?php } ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm mb-1" href="<?= base_url('invoice/detail/' . $data->invoice_id) ?>">
                                            Lihat Detail <i class="fas fa-chevron-circle-right"></i> 
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
</section>