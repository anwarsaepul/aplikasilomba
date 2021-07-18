<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="col-sm-6 mx-auto col-md-4 mt-2">
        <div class="card-header text-center bg-success">
            <strong><?= $inv->nama_kategori ?></strong>
        </div>
        <div class="info-box mb-3 pl-3">
            <table width="100%">
                <tr>
                    <td style="vertical-align: top; width: 40%;">
                        <span>No Peserta</span>
                    </td>
                    <td>
                        <div>
                            <span>: <?= $inv->invoice ?> </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 40%;">
                        <span>Nama Peserta</span>
                    </td>
                    <td>
                        <div>
                            <span>: <?= $inv->nama_lengkap ?> </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 40%;">
                        <span>Komunitas/Club</span>
                    </td>
                    <td>
                        <div>
                            <span>: <?= $inv->komunitas ?> </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 40%;">
                        <span>Gelombang</span>
                    </td>
                    <td>
                        <div>
                            <span>: <?= $inv->gelombang ?> </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 40%;">
                        <span>Lajur</span>
                    </td>
                    <td>
                        <div>
                            <span>: <?= $inv->lajur ?> </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 40%;">
                        <span>Nilai</span>
                    </td>
                    <td>
                        <div>
                            <input type="number" value="<?= $inv->nilai ?>" class="form-control" name="nilai" required autofocus>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mx-auto col-6">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="gelombang">Gelombang</label>
                    <input type="number" placeholder="Masukan no gelombang" class="form-control" name="gelombang" required autofocus>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="lajur">Lajur</label>
                    <input type="number" placeholder="Masukan no lajur" class="form-control" name="lajur" required>
                </div>
            </div>
        </div>
    </div>



    <div class="mx-auto col-8">
        <div class="card">
            <div class="card-header text-center bg-success">
                <strong>Nilai</strong>
            </div>
            <div class="col-6 pl-3">
                <div class="form-group">
                    <label for="sasaran">Sasaran</label>
                    <input type="text" placeholder="Masukan nama sasaran" class="form-control" name="sasaran" required autofocus>
                </div>
            </div>
            <div class="row pl-3 pr-3">
                <div class="col-2">
                    <div class="form-group">
                        <label for="jarak">jarak 1</label>
                        <input type="text" placeholder="Nilai" class="form-control" name="jarak" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="jarak">jarak 2</label>
                        <input type="text" placeholder="Nilai" class="form-control" name="jarak" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="jarak">jarak 3</label>
                        <input type="text" placeholder="Nilai" class="form-control" name="jarak" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="jarak">jarak 4</label>
                        <input type="text" placeholder="Nilai" class="form-control" name="jarak" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="jarak">jarak 5</label>
                        <input type="text" placeholder="Nilai" class="form-control" name="jarak" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="jarak">jarak 6</label>
                        <input type="text" placeholder="Nilai" class="form-control" name="jarak" required>
                    </div>
                </div>
            </div>
            <div class="p-2 text-center">
                <a href="" class="btn btn-primary btn-sm">
                    <i class="fas fa-paper-plane"></i> Kirim
                </a>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Detail Pertandingan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered text-center table-striped">
                    <tbody>
                        <tr>
                            <th>Nama Kategori</th>
                            <td><span id="nama_kategori2"></span></td>
                        </tr>
                        <tr>
                            <th>Jarak</th>
                            <td><span id="jarak"></span></td>
                        </tr>
                        <tr>
                            <th>Sasaran</th>
                            <td><span id="nama_sasaran"></td>
                        </tr>
                        <tr>
                            <th>Point</th>
                            <td><span id="point"></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td><span id="durasi"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Line</th>
                            <td><span id="jumlah_line"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Tanding</th>
                            <td><span id="tanggal_tanding"></td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td><span id="jam_tanding"></td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td><span id="biaya"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>