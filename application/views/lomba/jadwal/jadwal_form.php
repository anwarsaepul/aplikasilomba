<!-- Main content -->
<section class="content bg-light">
    <div class="box">
        <div class="box-header">
            <div class="col-sm mb-5 pt-3">
                <div class="float-left">
                    <h3><i class="nav-icon fa fa-object-group"></i> Jadwal</h3>
                </div>
                <div class="float-right">
                    <a href="<?= base_url('jadwal') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="box pb-2">
                <div class="col-md-6 mx-auto col-md-offset-6">
                    <form action="<?= base_url('jadwal/process') ?>" method="POST">
                        <table width="100%">
                            <tr>
                                <div class="form-group">
                                    <h3 class="box-title text-center"><?= ucfirst($page) ?> Data jadwal</h3>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <label id="perlombaan">Perlombaan *</label>
                                    <div class="form-group input-group">
                                        <input type="hidden" name="id" id="jadwal_id" value="<?= $row->jadwal_id ?>">
                                        <input type="hidden" name="perlombaan_id" id="perlombaan_id">
                                        <input type="text" name="nama_kategori" id="nama_kategori" value="<?= $row->nama_kategori ?>" class="form-control" required autofocus>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <label for="date">Tanggal Perlombaan *</label>
                                    <div class="form-group">
                                        <input type="date" name="date" id="date" value="<?= $row->tanggal_tanding ?>" class="form-control">
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <label for="date">Jam Tanding *</label>
                                    <div class="form-group">
                                        <input type="time" name="jam" value="<?= $row->jam_tanding ?>" class="form-control">
                                    </div>
                                </div>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <div class="form-group">
                                    <label for="biaya">Biaya *</label>
                                    <input type="number" value="<?= $row->biaya ?>" class="form-control" id="line" name="biaya" required placeholder="Input biaya">
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group text-center">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                        <i class="fa fa-paper-plane"></i>Save
                                    </button>
                                    <button type="reset" class="btn btn-flat btn-warning"><i class="fas fa-sync-alt"></i> Reset</button>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Select Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($lomba as $key => $data) { ?>
                            <tr>
                                <td style="width: 5%;"><?= $no++ ?>.</td>
                                <td><?= $data->nama_kategori ?></td>
                                <td><?= $data->jarak_sasaran ?> M</td>
                                <td><?= $data->nama_sasaran ?></td>
                                <td><?= $data->point ?></td>
                                <td><?= $data->keterangan ?></td>
                                <td><?= $data->durasi ?> Menit</td>
                                <td><?= $data->jumlah_line ?></td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-dismiss="modal" aria-label="Close" id="select" data-id="<?= $data->perlombaan_id ?>" data-nama_kategori="<?= $data->nama_kategori ?>">
                                        <i class="fa fa-check"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>