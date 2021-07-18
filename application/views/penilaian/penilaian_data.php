<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="col-12 col-sm-6 col-md-4 float-right pr-3">
                    <form action="<?= base_url('penilaian/process') ?>" method="POST">
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
                <div class="col-12 col-sm-6 col-md-6 pr-3 mx-auto">
                    <div class="text-center">
                        <H3 class="">Daftar Peserta</H3>
                    </div>
                </div>
                <div class="box-body table-responsive pl-3 pr-3">
                    <div class="mx-auto">
                        <table class="table table-bordered text-center table-striped" id="table1">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>No Invoice</th>
                                    <th>Nama Peserta</th>
                                    <th>Komunitas</th>
                                    <th>Gelombang</th>
                                    <th>Lajur</th>
                                    <th>Nilai</th>
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
                                        <td><?= $data->gelombang ?></td>
                                        <td><?= $data->lajur ?></td>
                                        <td><?= $data->nilai ?></td>
                                        <td><a href="<?= base_url('penilaian/input/' . $data->invoice_id) ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Nilai
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