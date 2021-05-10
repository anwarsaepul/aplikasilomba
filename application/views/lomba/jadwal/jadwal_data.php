<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm p-3">
                <div class="float-left">
                    <h3><i class="nav-icon fa fa-object-group"></i> Jadwal</h3>
                </div>
                <div class="float-right">
                    <a href="<?= base_url('jadwal/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Data jadwal
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive p-3">
            <table class="table table-bordered table-responsive text-center table-striped" id="table1">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
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
                            <td><?= indo_date($data->tanggal_tanding) ?></td>
                            <td><?= indo_jam($data->jam_tanding) ?></td>
                            <td><?= indo_currency($data->biaya) ?></td>
                            <td>
                                <a href="<?= base_url('jadwal/edit/' . $data->jadwal_id) ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-edit"></i>Update</a>
                                <a href="<?= base_url('jadwal/del/' . $data->jadwal_id) ?>" class="btn btn-danger btn-xs mb-2" id="tmblhps"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>