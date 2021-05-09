<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <div class="float-left">
                    <h3><i class="nav-icon fa fa-object-group"></i> Perlombaan</h3>
                </div>
                <div class="float-right">
                    <a href="<?= base_url('perlombaan/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Data perlombaan
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive pl-2 pr-2">
            <table class="table table-bordered table-responsive text-center table-striped" id="table1">
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
                            <td><?= indo_currency($data->biaya) ?></td>
                            <td>
                                <a href="<?= base_url('perlombaan/edit/' . $data->perlombaan_id) ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-edit"></i>Update</a>
                                <a href="<?= base_url('perlombaan/del/' . $data->perlombaan_id) ?>" class="btn btn-danger btn-xs mb-2" id="tmblhps"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>