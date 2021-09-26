<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8"></div>
                <div class="col-sm-4">
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
            </div>
        </div>
    </div>


    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
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
</section>