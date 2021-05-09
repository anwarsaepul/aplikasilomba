<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm pt-3">
                <ol class="float-sm-right">
                    <a href="<?= base_url('penilaian/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Penilaian
                    </a>
                </ol>
                <h3><i class="nav-icon fa fa-object-group"></i> Penilaian</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered text-center table-striped" id="table1">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
                        <th>Jarak</th>
                        <th>Sasaran</th>
                        <th>Point</th>
                        <th>Keterangan</th>
                        <th>Durasi</th>
                        <th>jumlah Line</th>
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
                            <td class="text-center" width="150px">
                                <a href="<?= base_url('penilaian/edit/' . $data->penilaian_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Update</a>
                                <a href="<?= base_url('penilaian/del/' . $data->penilaian_id) ?>" class="btn btn-danger btn-xs" id="tmblhps"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->