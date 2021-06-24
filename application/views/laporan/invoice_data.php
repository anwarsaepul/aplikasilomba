<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="col-12 col-sm-6 col-md-4 float-right pr-3">
                    <form action="<?= base_url('laporan/process') ?>" method="POST">
                        <div class="input-group input-group-sm">
                            <select name="filterdata" class="form-control">
                                <option value="">Semua Data</option>
                                <option value="0">Belum Dibayar</option>
                                <option value="1">Sedang diverifikasi</option>
                                <option value="2">Lunas</option>
                            </select>
                            <span class="input-group-append">
                                <button type="submit" name="filter" class="btn btn-info btn-flat">Filter</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive pl-3 pr-3">
                    <div class="mx-auto">
                        <table class="table table-bordered text-center table-striped" id="example">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>No Peserta</th>
                                    <th>Nama Peserta</th>
                                    <th>Komunitas</th>
                                    <th>Telepon</th>
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
                                        <td><?= $data->nama_lengkap ?></td>
                                        <td><?= $data->komunitas ?></td>
                                        <td><?= $data->phone ?></td>
                                        <td>
                                            <strong>
                                                <?php
                                                if ($data->status_pesanan == 0) { ?> Belum dibayar <?php } elseif ($data->status_pesanan == 1) { ?> Sedang diverifikasi <?php } else { ?> Lunas <?php } ?>
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